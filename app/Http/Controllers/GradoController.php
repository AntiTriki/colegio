<?php

namespace App\Http\Controllers;

use App\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class GradoController extends Controller
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
        $grados = new Grado();
        $grados = $grados->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('grado.index', ['grados' => $grados]);
        else
            return view('grado.ajax', ['grados' => $grados]);
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

            return view('grado.form');
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
            $grado = new Grado();
            $grado->descripcion = $request->descripcion;

            $grado->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('grado')
            ]);
        }
    }


    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('grado.form', ['grado' => Grado::find($id)]);
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
            $grado = Grado::find($id);
            $grado->descripcion = $request->descripcion;

            $grado->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('grado')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Grado::destroy($id);
        return redirect('/grado');
    }
}
