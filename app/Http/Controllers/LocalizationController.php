<?php

namespace App\Http\Controllers;

use App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class localizationController extends Controller
{
    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
