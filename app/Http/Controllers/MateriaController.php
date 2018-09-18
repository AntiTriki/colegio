<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MateriaController extends Controller
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
        $materias = new Materia();
        $materias = $materias->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('materia.index', ['materias' => $materias]);
        else
            return view('materia.ajax', ['materias' => $materias]);
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

            return view('materia.form');
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
            $materia = new Materia();
            $materia->descripcion = $request->descripcion;

            $materia->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('materia')
            ]);
        }
    }


    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('materia.form', ['materia' => Materia::find($id)]);
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
            $materia = Materia::find($id);
            $materia->descripcion = $request->descripcion;

            $materia->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('materia')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Materia::destroy($id);
        return redirect('/materia');
    }
}
