<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class InscripcionController extends Controller
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
        $inscripcions = new Inscripcion();
        $inscripcions = $inscripcions->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('inscripcion.index', ['inscripcions' => $inscripcions]);
        else
            return view('inscripcion.ajax', ['inscripcions' => $inscripcions]);
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

            return view('inscripcion.form');
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
            $inscripcion = new Inscripcion();
            $inscripcion->descripcion = $request->descripcion;

            $inscripcion->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('inscripcion')
            ]);
        }
    }


    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('inscripcion.form', ['inscripcion' => Inscripcion::find($id)]);
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
            $inscripcion = Inscripcion::find($id);
            $inscripcion->descripcion = $request->descripcion;

            $inscripcion->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('inscripcion')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Inscripcion::destroy($id);
        return redirect('/inscripcion');
    }
}
