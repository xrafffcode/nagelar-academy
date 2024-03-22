<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TransactionTraining;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;
use Illuminate\Support\Facades\Http;


class CheckoutController extends Controller
{

    private $fee = 50;

    public function index(Training $training)
    {
        return view('pages.user.training.checkout', [
            'training' => $training
        ]);
    }


    public function checkout(Request $request)
    {

        $transaction = $this->createTransaction($request);

        $this->configureMidtrans();

        $payload = $this->createPayload($transaction);

        $snapToken = $this->generateSnapToken($payload);

        $this->updateTransactionWithSnapToken($transaction, $snapToken);

        $message =  'Invoice sudah dibuat, silahkan lakukan pembayaran';

        SweetAlert::toast($message, 'success');

        return redirect()->route('checkout.payment', $transaction->transaction_code);
    }

    private function createTransaction(Request $request)
    {

        $training = Training::findOrFail($request->training_id);


        $transaction_code = $this->generateTransactionCode();

        $transaction =  TransactionTraining::create([
            'user_id' => Auth::user()->id,
            'training_id' => $request->training_id,
            'transaction_code' => $transaction_code,
            'name' => Auth::user()->full_name,
            'email' => Auth::user()->email,
            'transaction_total' => $training->price  + $this->fee,
            'transaction_status' => 'PENDING',
        ]);


        return $transaction;
    }

    private function generateTransactionCode()
    {
        $randomNumber1 = mt_rand(10000, 99999);
        $randomNumber2 = mt_rand(100, 999);
        return 'TRX' . $randomNumber1 . $randomNumber2;
    }

    private  function configureMidtrans()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    private function createPayload($transaction)
    {
        return [
            'transaction_details' => [
                'order_id' => "nagelar-" . $transaction->transaction_code,
                'gross_amount' => $transaction->transaction_total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->full_name,
                'email' =>  Auth::user()->email,
            ],
        ];
    }

    private function generateSnapToken($payload)
    {
        return \Midtrans\Snap::getSnapToken($payload);
    }

    private function updateTransactionWithSnapToken($transaction, $snapToken)
    {
        $transaction->snap_token = $snapToken;
        $transaction->save();
    }


    public function payment($transaction_code)
    {
        $transaction = TransactionTraining::with(['training', 'user'])->where('transaction_code', $transaction_code)->firstOrFail();

        return view('pages.user.training.payment', [
            'transaction' => $transaction
        ]);
    }

    public function success(Request $request)
    {
        $transaction = TransactionTraining::where('transaction_code', $request->order_id)->firstOrFail();

        $client = new \GuzzleHttp\Client();

        $url = 'https://api.midtrans.com/v2/' . 'nagelar-' . $request->order_id . '/status';

        $response = $client->request('GET', $url, [
            'headers' => [
                'accept' => 'application/json',
            ],
            'auth' => [config('midtrans.server_key'), '']
        ]);


        $response = json_decode($response->getBody());

        if ($response->transaction_status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
            $transaction->save();

            UserTraining::create([
                'user_id' => Auth::user()->id,
                'training_id' => $transaction->training_id,
                'status' => 'on_progres'
            ]);
        } else {
            $transaction->transaction_status = 'FAILED';
            $transaction->save();
        }

        return view('pages.user.training.success', [
            'transaction' => $transaction
        ]);
    }
}
