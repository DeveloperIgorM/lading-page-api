<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Faq;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    
    // Renderiza a landing pública.
    
    public function index()
    {
        $banners = Banner::where('status', 1)->orderBy('sort_order')->get();
        $faqs = Faq::where('status', 1)->orderBy('id')->get();

        // outros dados (services, about) se existir...
        return view('landing.home', compact('banners','faqs'));
    }
}
