<?php

namespace App\Http\Controllers;

use App\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProgramaController extends Controller
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
        $programas = new Programa();
        $programas = $programas->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('programa.index', ['programas' => $programas]);
        else
            return view('programa.ajax', ['programas' => $programas]);
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

            return view('programa.form');
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
            $programa = new Programa();
            $programa->descripcion = $request->descripcion;

            $programa->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('programa')
            ]);
        }
    }


    public function edit(Programa $programa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('programa.form', ['programa' => Programa::find($id)]);
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
            $programa = Programa::find($id);
            $programa->descripcion = $request->descripcion;

            $programa->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('programa')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Programa::destroy($id);
        return redirect('/programa');
    }
}
