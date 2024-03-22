<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TestimonialTraining;
use App\Models\Training;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with(['category', 'mentor'])->get();
        $categories = Category::with('training')->get();


        return view('pages.user.training.index', [
            'trainings' => $trainings,
            'categories' => $categories
        ]);
    }

    public function show(Training $training)
    {

        $reviews = TestimonialTraining::where('training_id', $training->id)->get();


        if (Auth::check()) {
            $tid = $training->id;
            $ht = UserTraining::where([['training_id', '=', $tid], ['user_id', '=', Auth::user()->id]])->first();

            return view('pages.user.training.show', [
                'training' =>  $training,
                'ht' => $ht,
                'reviews' => $reviews
            ]);
        } else {
            return view('pages.user.training.show', [
                'training' =>  $training,
                'reviews' => $reviews
            ]);
        }
    }
}
