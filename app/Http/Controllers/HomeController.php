<?php

namespace App\Http\Controllers;

class HomeController
{
    public function __invoke() {
        return response()->json([
           "message"    => "Welcome to this site; ZH :)"
        ]);
    }
}