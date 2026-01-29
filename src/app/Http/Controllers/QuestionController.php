<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with(['user', 'responses'])->latest()->get();
        return view('questions.index', compact('questions'));
    }

    public function create(){
        return view('questions.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'location' => 'required|string',
        ]);

        
        Auth::user()->questions()->create($validated);
        return redirect()->route('questions.index')->with('success', 'Question createed successfully!');

    }

    public function show(Question $question)
{
    $question->load(['user', 'responses.user']);

    return view('questions.show', compact('question'));
}
}
