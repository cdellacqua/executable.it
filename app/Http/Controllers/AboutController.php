<?php

namespace App\Http\Controllers;

use App\Models\TimelineItem;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $timeline = TimelineItem::query()
            ->where('locale', app()->getLocale())
            ->orderBy('date', 'desc')
            ->get();
        return view('pages.about-me', ['timeline' => $timeline]);
    }
}
