<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $location = $request->input('location');

        $questions = Question::with(['user', 'responses', 'favoritedBy'])
                // seearch by keyword in title or content
            ->when($keyword, function ($query, $keyword) {
                return $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('content', 'like', "%{$keyword}%");
                });
            })
            // fiilter by location
            ->when($location, function ($query, $location) {
                return $query->where('location', 'like', "%{$location}%");
            })
            ->latest()
            ->get();

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

public function edit(Question $question)
    {
        
        if (Auth::id() !== $question->user_id) {
            return redirect()->route('questions.index')->with('error', 'You cannot edit this question !!!');
        }

        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        
        if (Auth::id() !== $question->user_id) {
            return abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'location' => 'required|string',
        ]);

        $question->update($validated);

        return redirect()->route('questions.show', $question)->with('success', 'Question updated successfully!!!');
    }

    public function destroy(Question $question)
    {
        
        if (Auth::id() === $question->user_id || Auth::user()->role === UserRole::ADMIN) {
            $question->delete();
            return redirect()->route('questions.index')->with('success', 'Question deleted successfully!!!');
        }

        return redirect()->route('questions.index')->with('error', 'you cannot delete this question!!!');
    }

    
}
