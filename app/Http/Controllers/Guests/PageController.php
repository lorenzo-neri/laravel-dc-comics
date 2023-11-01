<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $message = 'Tramite l\'header puoi spostarti in altre pagine!';
        return view('welcome', compact('message'));
    }
}
