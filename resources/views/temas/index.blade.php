@extends('layouts.app')

@section('content')
    <h1>Lista de Temas</h1>
    <a href="{{ route('temas.create') }}">Crear Nuevo Tema</a>
    <ul>
        @foreach ($temas as $tema)
            <li>
                <strong>{{ $tema->tema_principal }}</strong> ({{ $tema->fecha_inicio }} - {{ $tema->fecha_fin }})
                <a href="{{ route('temas.edit', $tema) }}">Editar</a>
                <form action="{{ route('temas.destroy', $tema) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
