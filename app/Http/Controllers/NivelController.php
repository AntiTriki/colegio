<?php

namespace App\Http\Controllers;

use App\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class NivelController extends Controller
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
        $nivels = new Nivel();
        $nivels = $nivels->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('nivel.index', ['nivels' => $nivels]);
        else
            return view('nivel.ajax', ['nivels' => $nivels]);
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

            return view('nivel.form');
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
            $nivel = new Nivel();
            $nivel->descripcion = $request->descripcion;

            $nivel->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('nivel')
            ]);
        }
    }


    public function edit(Nivel $nivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('nivel.form', ['nivel' => Nivel::find($id)]);
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
            $nivel = Nivel::find($id);
            $nivel->descripcion = $request->descripcion;

            $nivel->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('nivel')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Nivel::destroy($id);
        return redirect('/nivel');
    }
}
