@include('layouts.app')
@section('title','Mostrar User')
@section('content')

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

    @csrf
    <a href="ListaDownload" class="btn btn-danger">
        Descargar lista de usuarios </a>
    <a href="Lista/create" class="btn btn-danger"> Añadir Alumno</a>
    <div class="row">
        @foreach ($listaEscuela as $ListaEscuela)
        <div class="col-sm">
        <table class="table">
            <thead>
                 <tr>
                    <th scope="col">ID</th>
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
                <tr>
                    <th scope="row">{{$ListaEscuela->id}}</th>
                    <td><img style="height: 100px; width: 100px;
            background-color: #EFEFEF; margin: 20px;
            " class="card-img-top rounded-circle mx-auto d-block" 
            src="images/{{$ListaEscuela->Avatar}}" alt="Imagen del Card..."></td>
                    <td>{{$ListaEscuela->Nombre}}</td>
                    <td>{{$ListaEscuela->CURP}}</td>
                    <td>{{$ListaEscuela->No_Control}}</td>
                    <td>{{$ListaEscuela->Materia}}</td>
                    <td>{{$ListaEscuela->Promedio}}</td>
                    <td>{{$ListaEscuela->Observaciones}}</td>
                    <td><a href="/Lista/{{$ListaEscuela->id}}/edit" class="btn btn-danger">
                Editar </a>
                <a href="/Lista/delete/{{$ListaEscuela->id}}" class="btn btn-danger">
                Eliminar </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>