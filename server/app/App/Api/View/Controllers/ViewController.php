<?php

namespace App\Api\View\Controllers;

use Domain\Topic\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

final class ViewController
{
    public function recordTopicView(Request $request, $topic)
    {
        $topic = Topic::findOrFail($topic);

        views($topic)->record();

        return response()->json([
            'message' => 'View sucessfully recorded!',
        ]);
    }
}
