<?php

namespace App\Http\Controllers;

use App\Tipopersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AsistenciaController extends Controller
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
        $tipopersonas = new Tipopersona();
        $tipopersonas = $tipopersonas->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('tipopersona.index', ['tipopersonas' => $tipopersonas]);
        else
            return view('tipopersona.ajax', ['tipopersonas' => $tipopersonas]);
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

            return view('tipopersona.form');
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
            $tipopersona = new Tipopersona();
            $tipopersona->descripcion = $request->descripcion;

            $tipopersona->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('tipopersona')
            ]);
        }
    }


    public function edit(Tipopersona $tipopersona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipopersona  $tipopersona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('tipopersona.form', ['tipopersona' => Tipopersona::find($id)]);
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
            $tipopersona = Tipopersona::find($id);
            $tipopersona->descripcion = $request->descripcion;

            $tipopersona->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('tipopersona')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Tipopersona::destroy($id);
        return redirect('/tipopersona');
    }
}
