<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $hero = \App\Models\PageContent::getContent('home', 'hero');
        $stats = \App\Models\PageContent::getContent('home', 'stats');
        $services = Service::active()->limit(3)->get();
        
        return view('frontend.home', compact('hero', 'stats', 'services'));
    }

    public function about()
    {
        $header = \App\Models\PageContent::getContent('about', 'header');
        $story = \App\Models\PageContent::getContent('about', 'story');
        $mission = \App\Models\PageContent::getContent('about', 'mission');
        $vision = \App\Models\PageContent::getContent('about', 'vision');
        $values = \App\Models\PageContent::getContent('about', 'values');
        
        return view('frontend.about', compact('header', 'story', 'mission', 'vision', 'values'));
    }

    public function services()
    {
        $services = Service::active()->get();
        return view('frontend.services', compact('services'));
    }
}
