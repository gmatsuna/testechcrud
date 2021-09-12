<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function teste1()
    {
        return view('teste1');
    }

    public function t1Result(Request $request){
        $str=$request->input('message');
        $length = Str::length($str);
        if ($length == 0) {
            return view('teste1');
        }
        else {
            $newstr = wordwrap($str, 20, "<br/>\n", false);
            return view('teste1')->with(compact(
                'length',
                'newstr'
            ));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function teste2()
    {
        return view('teste2');
    }

    public function t2Result(Request $request){
        $amount=$request->input('amount');
        return view('teste2')->with(compact('amount'));
    }
}
