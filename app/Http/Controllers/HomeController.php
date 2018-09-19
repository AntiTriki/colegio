<?php

namespace App\Http\Controllers;

use App\Tipopersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=Auth::user()->id_tipopersona;
        $tipopersonas = Tipopersona::where('id', $id)->get();
        //
    return view('home',compact('tipopersonas'));
    }
}
