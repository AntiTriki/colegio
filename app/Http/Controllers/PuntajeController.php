<?php

namespace App\Http\Controllers;

use App\Puntaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PuntajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        $request->session()->put('search', $request->has('search') ? $request->get('search') : ($request->session()->has('search') ? $request->session()->get('search') : ''));
        $request->session()->put('field', $request->has('field') ? $request->get('field') : ($request->session()->has('field') ? $request->session()->get('field') : 'created_at'));

        $request->session()->put('sort', $request->has('sort') ? $request->get('sort') : ($request->session()->has('sort') ? $request->session()->get('sort') : 'desc'));
        $puntajes = new Puntaje();
        $puntajes = $puntajes->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('puntaje.index', ['puntajes' => $puntajes]);
        else
            return view('puntaje.ajax', ['puntajes' => $puntajes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //
        if ($request->isMethod('get'))

            return view('puntaje.form');
        else {
            $rules = [
                'nota' => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $puntaje = new Puntaje();
            $puntaje->descripcion = $request->descripcion;

            $puntaje->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('puntaje')
            ]);
        }
    }


    public function edit(Puntaje $puntaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puntaje  $puntaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('puntaje.form', ['puntaje' => Puntaje::find($id)]);
        else {
            $rules = [
                'descripcion' => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $puntaje = Puntaje::find($id);
            $puntaje->descripcion = $request->descripcion;

            $puntaje->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('puntaje')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Puntaje::destroy($id);
        return redirect('/puntaje');
    }
}
