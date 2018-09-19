<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Tipopersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PersonaController extends Controller
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
        $personas = new Persona();
        $personas = $personas->where('codigo', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(5);
        $tipopersonas = new Tipopersona();
    $tipopersonas= Tipopersona::where('activo',1)->get();

        if ($request->ajax())
            return view('persona.index', compact('personas'));
        else
            return view('persona.ajax', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //
        if ($request->isMethod('get')) {
            $tipopersonas = Tipopersona::where('activo', 1)->get();
            return view('auth.register', compact('tipopersonas'));
            //return view('persona.form', compact('tipopersonas'));
        }
        else {
            $rules = [
                'codigo' => 'required',

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);

            $persona = new Persona();
            $persona->usuario = $request->usuario;
            $persona->email = $request->email;
            $persona->password = Hash::make($request->password);
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->ci = $request->ci;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->fecha_nac = $request->fecha_nac;
            $persona->genero = $request->genero;
            $persona->id_tipopersona = $request->id_tipopersona;
            $persona->codigo = $request->codigo;

            $persona->save();
            return response()->json([
                'fail' => false,
                'redirect_url' => url('persona')
            ]);
        }
    }


    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $per = Persona::find($id);

        $tipopersonas = Tipopersona::where('activo', 1)->get();
        if ($request->isMethod('get'))
            return view('auth.update', ['persona' => Persona::find($id),'tipopersonas' => $tipopersonas]);
        else {
            $rules = [
                'codigo' => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $persona = Persona::find($id);
            $persona->email = $request->email;
            if (!empty($request->password)) {
                $persona->password = Hash::make($request->password);
            }else{

            }

            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->ci = $request->ci;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->fecha_nac = $request->fecha_nac;
            $persona->genero = $request->genero;
            $persona->id_tipopersona = $request->id_tipopersona;
            $persona->codigo = $request->codigo;
            $persona->usuario = $request->usuario;
            $persona->save();
            return redirect('/persona');

        }
    }



    public function delete($id)
    {
        //
        Persona::destroy($id);
        return redirect('/persona');
    }
}
