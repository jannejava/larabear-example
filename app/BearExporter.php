<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class BearExporter
{
    public function execute($note)
    {
        $markdown = view('jekyll-post', [
                'title' => $note->title,
                'text' => $note->textWithoutHeadline(),
                'date' => $note->created_at,
                'tags' => implode(',', $note->tags->pluck('title')->toArray()),
            ])->render();

        $filename = $note->created_at->format('Y-m-d') . '-' . str_slug($note->title, '-') . '.md';

        Storage::disk('jekyll')->put($filename, $markdown);

        return $filename;
    }
}
