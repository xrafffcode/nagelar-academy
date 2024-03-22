<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Articel;
use App\Models\TransactionProduct;
use App\Models\User;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;

class ProfileSettingController extends Controller
{
    public function index()
    {

        $countTraining = UserTraining::where('user_id', Auth::user()->id)->count();

        $userTraining = UserTraining::with(['training',  'user'])->whereHas('user', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();



        return view('auth.dashboard', [
            'ct' => $countTraining,
            'ut' => $userTraining,
        ]);
    }

    public function edit()
    {
        return view('auth.profile', [
            'user' => User::findOrFail(Auth::user()->id)
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $user = User::where('id', $request->id)->first();

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store(
                'assets/user/profile-picture',
                'public'
            );

            if ($user->profile_picture != 'assets/user/profile-picture/profile-default.png') {
                Storage::disk('public')->delete($user->profile_picture);
            }
        }



        try {
            $user->update($data);
        } catch (\Exception $e) {
            SweetAlert::toast('Gagal mengubah data', 'error');
        }

        SweetAlert::toast('Profile Berhasil Di Update', 'success')->timerProgressBar();
        return redirect()->back();
    }

    public function myClass()
    {
        $countTraining = UserTraining::where('user_id', Auth::user()->id)->count();

        $userTraining = UserTraining::with(['training',  'user'])->whereHas('user', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();

        return view('auth.my-class', [
            'ut' => $userTraining,
            'ct' => $countTraining
        ]);
    }
}
