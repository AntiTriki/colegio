<?php

namespace App\Http\Controllers;

use App\Tiponota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TiponotaController extends Controller
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
        $tiponotas = new Tiponota();
        $tiponotas = $tiponotas->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('tiponota.index', ['tiponotas' => $tiponotas]);
        else
            return view('tiponota.ajax', ['tiponotas' => $tiponotas]);
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

            return view('tiponota.form');
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
            $tiponota = new Tiponota();
            $tiponota->descripcion = $request->descripcion;

            $tiponota->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('tiponota')
            ]);
        }
    }


    public function edit(Tiponota $tiponota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tiponota  $tiponota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('tiponota.form', ['tiponota' => Tiponota::find($id)]);
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
            $tiponota = Tiponota::find($id);
            $tiponota->descripcion = $request->descripcion;

            $tiponota->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('tiponota')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Tiponota::destroy($id);
        return redirect('/tiponota');
    }
}
