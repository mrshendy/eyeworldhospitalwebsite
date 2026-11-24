<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\CustomerVideoInfo;
use App\Models\EyeHealthVideo;
use App\Models\Topic;
use App\Models\Video;

class VideoController extends Controller
{
    //

    public function healthVideo($topic_id)
    {
        $topics = Topic::where('type', 'health-video')->whereHas('videos')->orderby('id', 'desc')->get();
        $videos = Video::where('type', 'health-video')->where('topic_id', $topic_id)->orderby('id', 'desc')->get();
        $info = EyeHealthVideo::first();

        return view('Site.service.health-videos.index', compact('videos', 'info', 'topics', 'topic_id'));
    }

    public function experimentsVideo($topic_id)
    {

        $topics = Topic::where('type', 'experiments')->whereHas('videos')->orderby('id', 'desc')->get();
        $videos = Video::where('type', 'experiments')->where('topic_id', $topic_id)->orderby('id', 'desc')->get();
        $info = CustomerVideoInfo::first();

        return view('Site.service.experiment-videos.index', compact('videos', 'info', 'topics', 'topic_id'));
    }
}
