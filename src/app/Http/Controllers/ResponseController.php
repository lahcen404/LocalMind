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

    public function destroy(Response $response)
    {
        if (Auth::id() !== $response->user_id) {
            return back()->with('error', 'you cannot delete this response!!');
        }

        $response->delete();

        return back()->with('success', 'Response removed !!');
    }
}