<?php

namespace App\Http\Controllers;

use App\Parentezco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ParentezcoController extends Controller
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
        $parentezcos = new Parentezco();
        $parentezcos = $parentezcos->where('descripcion', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);

        if ($request->ajax())
            return view('parentezco.index', ['parentezcos' => $parentezcos]);
        else
            return view('parentezco.ajax', ['parentezcos' => $parentezcos]);
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

            return view('parentezco.form');
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
            $parentezco = new Parentezco();
            $parentezco->descripcion = $request->descripcion;

            $parentezco->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('parentezco')
            ]);
        }
    }


    public function edit(Parentezco $parentezco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentezco  $parentezco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->isMethod('get'))
            return view('parentezco.form', ['parentezco' => Parentezco::find($id)]);
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
            $parentezco = Parentezco::find($id);
            $parentezco->descripcion = $request->descripcion;

            $parentezco->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('parentezco')
            ]);
        }
    }



    public function delete($id)
    {
        //
        Parentezco::destroy($id);
        return redirect('/parentezco');
    }
}
