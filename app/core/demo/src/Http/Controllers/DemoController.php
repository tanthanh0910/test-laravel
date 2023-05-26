<?php

namespace App\Core\Demo\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class DemoController extends Controller
{

    public function getIndex()
    {
        return view('botble-demo::index');
    }
}

