<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="container mt-5">
                    <h1 class="text-3xl font-semibold text-teal-600 mb-6 text-center">Agregar y Ver Imágenes</h1>

                    <!-- Formulario para agregar una nueva imagen -->
                    <div class="bg-white p-6 shadow-md rounded-lg">
                        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="image" class="form-label text-lg text-gray-700"><i class="fa-solid fa-image"></i></i><span class="ml-2"></span> Seleccionar Imagen:</label>
                                <input type="file" class="form-control bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-teal-500" name="image" id="image" required>
                            
                            </div>
                            <x-primary-button type="sutmi"  class="ms-3">
        {{ __('Agregar') }}
    </x-primary-button>
                         
                        </form>
                    </div>

                
                    <!-- Carrusel de imágenes -->
                    <div class="bg-white p-6 shadow-md rounded-lg mt-6">
                        <h2 class="text-2xl font-semibold text-teal-600 mb-4">Carrusel de Imágenes</h2>
                        <div id="hero-carousel" class="hero-carousel carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @forelse($images as $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100 rounded-lg" alt="Imagen">
                                    </div>
                                @empty
                                    <p class="text-gray-600 text-center">No hay imágenes disponibles.</p>
                                @endforelse
                            </div>

                            <!-- Controles del Carrusel -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                    </div>

                    <!-- Mostrar imágenes y botón de eliminar -->
                    <div class="bg-white p-6 shadow-md rounded-lg mt-6">
                        <h2 class="text-2xl font-semibold text-teal-600 mb-4">Imágenes Cargadas</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($images as $image)
                                <div class="card shadow-md rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top rounded-t-lg" alt="Imagen">
                                    <div class="card-body p-4">
                                        <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <x-danger-button type="sutmi" onclick="confirmDelete({{ $image->id }})" class="ms-3">
        {{ __('Eliminar') }}
    </x-danger-button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
   
    
    @if ($errors->has('image'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Error en la imagen',
                text: '{{ $errors->first('image') }}',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#d33',
            });
        });
    </script>
@endif

</x-app-layout>
