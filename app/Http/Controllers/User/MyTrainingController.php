<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TestimonialTraining;
use App\Models\Training;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;


class MyTrainingController extends Controller
{
    public function show(Training $training)
    {

        $tid = $training->id;

        $ht = UserTraining::where([['training_id', '=', $tid], ['user_id', '=', Auth::user()->id]])->first();
        $review = TestimonialTraining::where([['user_id',  '=', Auth::user()->id], ['training_id', '=', $tid]])->first();



        if ($ht != null) {
            return view('pages.user.training.play', [
                'training' => $training,
                'review' => $review
            ]);
        } else {
            return redirect()->route('profil.myclass');
        }
    }

    public function sendReview(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'review' => 'required'
        ]);

        $tid = $request->training_id;
        $ht = UserTraining::where([['training_id', '=', $tid], ['user_id', '=', Auth::user()->id]])->first();

        if ($ht != null) {
            $review = TestimonialTraining::where([['user_id',  '=', Auth::user()->id], ['training_id', '=', $tid]])->first();

            if ($review == null) {
                TestimonialTraining::create([
                    'user_id' => Auth::user()->id,
                    'training_id' => $tid,
                    'rating' => $request->rating,
                    'review' => $request->review
                ]);
            } else {
                $review->update([
                    'rating' => $request->rating,
                    'review' => $request->review
                ]);
            }

            SweetAlert::success('Berhasil', 'Review berhasil dikirim');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
