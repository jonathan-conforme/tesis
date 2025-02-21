@extends('layouts.app')

@section('content')
    <h1>Crear Tema</h1>
    <form action="{{ route('temas.store') }}" method="POST">
        @csrf
        <label for="tema_principal">Tema Principal:</label>
        <input type="text" name="tema_principal" id="tema_principal">
        
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
        
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" name="fecha_fin" id="fecha_fin">
        
        <label for="canton">Cantón:</label>
        <input type="text" name="canton" id="canton">
        
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad">
        
        <label for="subtema">Subtema:</label>
        <input type="text" name="subtema" id="subtema">
        
        <button type="submit">Guardar</button>
    </form>
@endsection
