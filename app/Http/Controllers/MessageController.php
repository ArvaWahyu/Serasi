<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Get all top-level messages with their replies
        $messages = Message::with('replies')->whereNull('parent_id')->get();

        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:messages,id',
        ]);

        $message = Message::create([
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Message posted successfully.');
    }
}
