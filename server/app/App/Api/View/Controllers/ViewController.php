<?php

namespace App\Api\View\Controllers;

use Domain\Topic\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Support\CustomVisitor;

final class ViewController
{
    public function recordTopicView(Request $request, $topic)
    {
        $topic = Topic::findOrFail($topic);

        $visitor = new CustomVisitor();
        $visitor->setId($request->input('visitor'));
        $visitor->setIp($request->input('ip_address'));
        $visitor->setHasDoNotTrackHeader($request->boolean('has_do_not_track_header'));
        $visitor->setIsCrawler($request->boolean('is_crawler'));

        views($topic)
            ->useVisitor($visitor)
            ->record();

        return response()->json([
            'message' => 'View sucessfully recorded!',
        ]);
    }
}
