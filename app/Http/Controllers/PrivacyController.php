<?php

namespace App\Http\Controllers;

use App\Models\TimelineItem;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function cookies() {
        return view('pages.cookies');
    }

    public function privacy() {
        return view('pages.privacy');
    }
}
