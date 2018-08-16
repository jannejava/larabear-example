<?php

namespace App\Http\Controllers;

use Eastwest\Larabear\Note;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('created_at')->get();

        return view('posts.index')->withNotes($notes);
    }

    public function show(Request $request, $id)
    {
        $note = Note::whereId($id)
                    ->with('tags')
                    ->first();

        return view('posts.show')
            ->withNote($note)
            ->withTags(implode(',', $note->tags->pluck('title')->toArray()));
    }
}
