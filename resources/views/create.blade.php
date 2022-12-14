@extends('layouts.app')
@section('title', 'Register User Create')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<form class="form-group" method="POST" action="/Lista" enctype="multipart/form-data">
    @csrf
        <div clas='form-group'>
            <label for=''>Nombre:</label>
            <input type='text'name="Nombre" class='form-control' maxlength="100"> <br>
            
            <label for=''>CURP:</label>
            <input type='text'name="CURP" class='form-control' maxlength="18"> <br>
            
            <label for=''>No.Control:</label>
            <input type='text'name="No_Control" class='form-control' maxlength="16"> <br>
            
            <label for=''>Materia:</label>
            <input type='text'name="Materia" class='form-control' maxlength="12"> <br>
            
            <label for=''>Promedio:</label>
            <input type='text'name="Promedio" class='form-control' maxlength="2"> <br>
            
            <label for=''>Observaciones:</label>
            <input type='text'name="Observaciones" class='form-control' maxlength="200"> <br>

            <label for="">Avatar:</label>
            <input type="file" name="Avatar">

        </div>
        <button type='submit'class='btn btn-danger'>
        Guardar</button>
</form>
@endsection
