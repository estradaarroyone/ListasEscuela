<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListaEscuela;


class ApiSearchController extends Controller
{
    public function search(Request $request){
        $error = ['error' => 'Sin resultados, ingrese otros campos para la busqueda.'];
        if($request->has('text')){
            $Lista = ListaEscuela::search($request->get('text'))->get();
            return $Lista->count() ? $Lista : $error;
    }
    return $error;
}
public function index()
{
    return view("search");
}
}