<?php

namespace App\Http\Controllers;

use App\Gestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class GestionController extends Controller
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
        $gestions = new Gestion();
        $gestions = $gestions->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('gestion.index', ['gestions' => $gestions]);
        else
            return view('gestion.ajax', ['gestions' => $gestions]);
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

            return view('gestion.form');
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
            $gestion = new Gestion();
            $gestion->descripcion = $request->descripcion;

            $gestion->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('gestion')
            ]);
        }
    }


    public function edit(Gestion $gestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gestion  $gestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('gestion.form', ['gestion' => Gestion::find($id)]);
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
            $gestion = Gestion::find($id);
            $gestion->descripcion = $request->descripcion;

            $gestion->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('gestion')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Gestion::destroy($id);
        return redirect('/gestion');
    }
}
