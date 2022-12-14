<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListaEscuela;

class ListaEscuelas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListaEscuela $listaEscuela)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Datos del formulario
            $Lista = new ListaEscuela();
            $Lista->Nombre=$request->input('Nombre');
            $Lista->Curp=$request->input('Curp');
            $Lista->No_Control=$request->input('No_Control');
            $Lista->Materia=$request->input('Materia');
            $Lista->Promedio=$request->input('Promedio');
            $Lista->Observaciones=$request->input('Observaciones');
            //Imagen
            $Lista->Avatar=$Nombre;
            $Lista->save();
            return redirect('Users')->with('message', 'Operación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('show'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaEscuela $Lista)
    {
        return view('edit',compact('Lista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaEscuela $Lista)
    {
        $Lista->fill($request->except('Avatar'));
        if ($request->hasFile('Avatar')){
            $file= $request->file('Avatar');
            $Nombre=time().$file-> getClientOriginalName();


        //Imagen
        $Lista->Avatar=$Nombre;
        $file->move(public_path(  ).'/images',$Nombre);
        }
        $Lista->save();
        return redirect('Users')->with('message', 'Operación Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ListaEscuela::FindOrFail($id);
        $Lista = ListaEscuela::find($id);

        try{
            $data->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }
        if($bug==0){
            echo "success";
        } else {
            echo 'error';
        }

        if ($Lista->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('Users')->with('message', 'Operación Exitosa');
        }
            else {return 'El beneficiario'.$Nombre. "No se pudo borrar";}
    }
    public function mostrar(ListaEscuela $Lista)
    {
        //Añadido el 05-10-22 
        $Lista=ListaEscuela::all();
        return view("mostraruser",compact('Lista'));//
    }
}
