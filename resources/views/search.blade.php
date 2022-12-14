@extends("layouts.app")
@section('content')
<form action="/search1" method="get">
        <input type="text"  name="text" placeholder=""/>
        <button type="submit">Buscar</button>
</form>