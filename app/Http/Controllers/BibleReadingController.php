<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BibleReading;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BibleReadingController extends Controller
{
    public function show($date)
    {
        $reading = BibleReading::where('reading_date', $date)->first();
        $comments = $reading ? $reading->comments()->with('user')->orderBy('created_at')->get() : collect();
        return view('bible_reading.show', compact('reading', 'comments', 'date'));
    }

    public function storeComment(Request $request, $date)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);
        $reading = BibleReading::where('reading_date', $date)->firstOrFail();
        $comment = new Comment([
            'bible_reading_id' => $reading->id,
            'user_id' => Auth::id(),
            'comment' => $request->input('comment'),
            'comment_date' => now()->toDateString(),
        ]);
        $comment->save();
        return redirect()->route('bible_reading.show', ['date' => $date]);
    }
}
