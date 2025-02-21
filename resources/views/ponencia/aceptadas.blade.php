<x-app-layout>
    @section('content')
    <div class="container mt-4">
        <h1 class="text-center lg text-primary mb-4">Ponencias Aceptadas</h1>

        <!-- Formulario de búsqueda -->
        <div class="mb-4 d-flex justify-content-center">
            <form method="GET" action="{{ route('ponencias.aceptadas') }}" class="w-50">
                <div class="input-group input-group-lg">
                    <input type="text" name="search" class="form-control rounded-pill" placeholder="Buscar por Título, Autor o Temática" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary ms-2 rounded-pill px-4">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Verificar si hay ponencias -->
        @if ($ponencias->isEmpty())
        <div class="alert alert-info text-center">
            No hay ponencias aceptadas aún.
        </div>
        @else
        <div class="row">
            @foreach ($ponencias as $ponencia)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h5 class="card-title text-muted mb-2">Tema: {{ $ponencia->titulo }}</h5>
                        <h6 class="card-subtitle text-muted mb-2">Autor: {{ $ponencia->autor }}</h6>
                        <span class="badge bg-success">Tematica: {{ $ponencia->tematica }}</span>
                        <p class="card-text mt-2">Resumen: {{ Str::limit($ponencia->descripcion, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Vistas: {{ $ponencia->vistas }} | Citas: {{ $ponencia->citas }}</small></p>
                        <a href="{{ asset('storage/' . $ponencia->archivo) }}" target="_blank" class="btn btn-outline-info">
                            <i class="fa-solid fa-file-pdf"></i> Ver </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Agregar paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $ponencias->links() }}
        </div>
        @endif
    </div>
</x-app-layout>