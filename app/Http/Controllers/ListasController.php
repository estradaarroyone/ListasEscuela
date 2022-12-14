<?php

namespace App\Http\Controllers;

use App\ListaEscuela;
use Illuminate\Http\Request;
use PDF;

class ListasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaEscuela=ListaEscuela::all();
        return view ('index',compact('listaEscuela'));
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
        if ($request->hasFile('Avatar')){
            $file= $request->file('Avatar');
            $Nombre=time().$file-> getClientOriginalName();
            $file->move(public_path().'/images/',$Nombre);

         //Datos del formulario
         $listaEscuela = new ListaEscuela();
         $listaEscuela->Nombre=$request->input('Nombre');
         $listaEscuela->Curp=$request->input('CURP');
         $listaEscuela->No_Control=$request->input('No_Control');
         $listaEscuela->Materia=$request->input('Materia');
         $listaEscuela->Promedio=$request->input('Promedio');
         $listaEscuela->Observaciones=$request->input('Observaciones');
         //Imagen
         $listaEscuela->Avatar=$Nombre;
         $listaEscuela->save();
         return redirect('Lista')->with('message', 'Operación Exitosa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListaEscuela  $listaEscuela
     * @return \Illuminate\Http\Response
     */
    public function show(ListaEscuela $listaEscuela)
    {
        return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListaEscuela  $listaEscuela
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaEscuela $listaEscuela, $id)
    {
        $listaEscuela = ListaEscuela::find($id);
        return view('edit',compact('listaEscuela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListaEscuela  $listaEscuela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaEscuela $listaEscuela)
    {
        $listaEscuela->fill($request->except('Avatar'));
        if ($request->hasFile('Avatar')){
            $file= $request->file('Avatar');
            $Nombre=time().$file-> getClientOriginalName();


        //Imagen
        $listaEscuela->Avatar=$Nombre;
        $file->move(public_path(  ).'/images',$Nombre);
        }
        $listaEscuela->save();
        return redirect('Lista')->with('message', 'Operación Exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListaEscuela  $listaEscuela
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ListaEscuela::FindOrFail($id);
        $listaEscuela = ListaEscuela::find($id);

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

        if ($listaEscuela->delete($id)){
            //return 'El'.$id. "Si se pudo borrar";
            return redirect('Lista')->with('message', 'Operación Exitosa');
        }
            else {return 'El beneficiario'.$Nombre. "No se pudo borrar";}
    }
    public function pdf()
    {
        $listaEscuela=ListaEscuela::all();
        //$pdf = PDF::loadView('pdf.listado', ['Data' => $Data])->setOptions(['defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pdf',compact('listaEscuela'));
        return $pdf->download('ListadoListas.pdf');
    }
}
