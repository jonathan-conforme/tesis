<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            ✍️ {{ __('Actualizar Información de la página principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="container mt-5">
                    <h1 class="text-3xl font-semibold text-teal-600 mb-6">Configuración de la Página Principal</h1>

                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                            
                                <!-- Título de la Página -->
                              <div class="mb-3">
                                    <label for="page_title" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-pen"></i> <span class="m-2"></span> Título de la Página</label>
                                    <input type="text" id="page_title" name="page_title" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ old('page_title', $setting->page_title ?? '') }}">
                                    @error('page_title')
                                        <small class="text-danger text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Subtítulo de la Página -->
                                <div class="mb-3">
                                    <label for="page_subtitle" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-pen"></i> <span class="m-2"></span> Subtítulo de la Página</label>
                                    <input type="text" id="page_subtitle" name="page_subtitle" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ old('page_subtitle', $setting->page_subtitle ?? '') }}">
                                    @error('page_subtitle')
                                        <small class="text-danger text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                            <!-- Nombre -->
                            <div class="mb-3">
                                    <label for="canton_name" class="block text-sm font-medium text-gray-700 mb-2"<i class="fa-solid fa-city"></i> <span class="ml-2"></span> Nombre del Cantón</label>
                                    <input type="text" id="canton_name" name="canton_name" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ old('canton_name', $setting->canton_name ?? '') }}">
                                    @error('canton_name')
                                        <small class="text-danger text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Fecha -->
                                <div class="mb-3">
                                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-regular fa-calendar-days"></i><span class="ml-2"></span> Fecha</label>
                                    <input type="date" id="date" name="date" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ old('date', $setting->date ?? '') }}">
                                    @error('date')
                                        <small class="text-danger text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            
                                <!-- Video de YouTube 1 -->
                                <div class="mb-3">
                                    <label for="youtube_video_1" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-link"></i><span class="mr-2"></span> Link del Video de YouTube 1</label>
                                    <input type="url" id="youtube_video_1" name="youtube_video_1" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ old('youtube_video_1', $setting->youtube_video_1 ?? '') }}">
                                    @error('youtube_video_1')
                                        <small class="text-danger text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Video de YouTube 2 -->
                                <div class="mb-3">
                                    <label for="youtube_video_2" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-link"></i><span class="mr-2"></span> Link del Video de YouTube 2</label>
                                    <input type="url" id="youtube_video_2" name="youtube_video_2" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ old('youtube_video_2', $setting->youtube_video_2 ?? '') }}">
                                    @error('youtube_video_2')
                                        <small class="text-danger text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            
                       

                        <!-- Botón de Guardar -->
                        <div class="mt-6">
                            <x-primary-button class="bg-teal-500 hover:bg-teal-600 text-white py-2 px-4 rounded-lg">
                                {{ __('Actualizar') }}
                            </x-primary-button>
                        </div>
                    </form>
 <!-- Mostrar mensaje de éxito si existe -->
 @if (session('success'))
    <script>
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
