@extends('layouts.pdfinicio')
@section('content')
<table class="table table-hover table-striped">
    <thead>
    <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curp</th>
                    <th scope="col">No.Control</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Promedio</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($listaEscuela as $ListaEscuela)
                <tr>
                    <td>{{$ListaEscuela->Nombre}}</td>
                    <td>{{$ListaEscuela->CURP}}</td>
                    <td>{{$ListaEscuela->No_Control}}</td>
                    <td>{{$ListaEscuela->Materia}}</td>
                    <td>{{$ListaEscuela->Promedio}}</td>
                    <td>{{$ListaEscuela->Observaciones}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection