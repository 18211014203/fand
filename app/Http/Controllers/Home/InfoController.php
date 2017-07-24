<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends CommonController
{
    public function about()
    {
        $about = Config('web.about');
        return view('home.info.about',compact('about'));
    }

    public function contact()
    {
        $contact = Config('web.contact');
        return view('home.info.contact',compact('contact'));
    }
}
