<?php

namespace App\Http\Controllers;

use App\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TurnoController extends Controller
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
        $turnos = new Turno();
        $turnos = $turnos->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('turno.index', ['turnos' => $turnos]);
        else
            return view('turno.ajax', ['turnos' => $turnos]);
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

            return view('turno.form');
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
            $turno = new Turno();
            $turno->descripcion = $request->descripcion;

            $turno->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('turno')
            ]);
        }
    }


    public function edit(Turno $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('turno.form', ['turno' => Turno::find($id)]);
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
            $turno = Turno::find($id);
            $turno->descripcion = $request->descripcion;

            $turno->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('turno')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Turno::destroy($id);
        return redirect('/turno');
    }
}
