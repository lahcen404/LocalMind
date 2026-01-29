<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
      public function index()
    {
        
        $questions = Auth::user()
            ->favoriteQuestions()
            ->with(['user', 'responses', 'favoritedBy'])
            ->latest()
            ->get();

        return view('questions.favorites', compact('questions'));
    }
    public function toggle(Question $question)
    {
        $user = Auth::user();

        
        $user->favoriteQuestions()->toggle($question->id);

        return back();
    }
}
