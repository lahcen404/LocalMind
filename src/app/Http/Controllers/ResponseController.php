<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $validated = $request->validate([
            'content' => 'required|min:5',
        ]);

        $question->responses()->create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'You added response successfully!!!');
    }

    // edit
    public function edit(Response $response){
        if(Auth::id() !== $response->user_id){
            return back()->with('error','You cannot edit this question !!!');
        }
        return view('responses.edit',compact('response'));
    }

    // update 

    public function update(Request $request, Response $response){
        if (Auth::id() !== $response->user_id) {
            return abort(403, 'You cannot update this response!!');
        }

        $validated = $request->validate([
            'content' => 'required|min:5',
        ]);

        $response->update($validated);
        return redirect()->route('questions.show', $response->question_id)
            ->with('success', 'Response updateed successfully');
    }

    public function destroy(Response $response)
    {
        if (Auth::id() !== $response->user_id) {
            return back()->with('error', 'you cannot delete this response!!');
        }

        $response->delete();

        return back()->with('success', 'Response removed !!');
    }
}