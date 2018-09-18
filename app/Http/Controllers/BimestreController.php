<?php

namespace App\Http\Controllers;

use App\Bimestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BimestreController extends Controller
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
        $bimestres = new Bimestre();
        $bimestres = $bimestres->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('bimestre.index', ['bimestres' => $bimestres]);
        else
            return view('bimestre.ajax', ['bimestres' => $bimestres]);
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

            return view('bimestre.form');
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
            $bimestre = new Bimestre();
            $bimestre->descripcion = $request->descripcion;

            $bimestre->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('bimestre')
            ]);
        }
    }


    public function edit(Bimestre $bimestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bimestre  $bimestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('bimestre.form', ['bimestre' => Bimestre::find($id)]);
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
            $bimestre = Bimestre::find($id);
            $bimestre->descripcion = $request->descripcion;

            $bimestre->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('bimestre')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Bimestre::destroy($id);
        return redirect('/bimestre');
    }
}
