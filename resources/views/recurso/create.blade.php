<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            ✍️ {{ __('Enviar Recurso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <!-- Button trigger modal -->
                <div class="flex ">
                    <x-primary-button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        {{ __(' Agregar') }}
                    </x-primary-button>
                </div>
                <br>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fechas </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('recurso.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Campo Título -->
                                    <div class="mb-3">
                                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-pen"></i> <span class="ml-2">{{ __('Título del recurso') }}
                                        </label>
                                        <input id="titulo" type="text" name="titulo"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"
                                            value="{{ old('titulo') }}" required />
                                    </div>

                                    <!-- Campo Archivo -->
                                    <div class="mb-3">
                                        <label for="archivo" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-box-archive"></i> <span class="ml-2"></span>{{ __('Subir archivo (PDF o DOCX)') }}
                                        </label>
                                        <input id="archivo" type="file" name="archivo"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"
                                            accept=".pdf,.doc,.docx,.pptx,.ppt" required />
                                    </div>


                                    <!-- Campo Descripción -->
                                    <div class="mb-3">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-file-pen"></i> <span class="ml-2"></span> {{ __('Descripción') }}
                                        </label>
                                        <textarea id="descripcion" name="descripcion" rows="4"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"
                                            required>{{ old('descripcion') }}</textarea>
                                    </div>

                                    <!-- Botón de Envío -->
                                    <div class="mb-3">
                                        <x-primary-button class="ms-3 flex items-center bg-teal-500 hover:bg-teal-600 text-white py-2 px-4 rounded-lg shadow-md">
                                            {{ __('Subir Recurso') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="my-6 border-gray-300">

                <!-- Lista de Recursos -->
                <div id="lista-recursos" class="mt-8">
                    <br>
                    <br>
                    <h3 class="text-lg font-bold mb-4">Recursos Subidos</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($recursos as $recurso)
                        <li class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between">
                            <div>
                                <h4 class="text-gray-800 font-semibold mb-1"> <i class="fa-solid fa-file-lines"></i> {{ $recurso->titulo }}</h4>
                                <p class="text-gray-500 text-sm mb-1">{{ $recurso->descripcion }}</p>
                            </div>
                            <div class="flex mt-4 space-x-2">
                                <!-- Botón para Ver Documento -->
                                <a href="{{ Storage::url($recurso->archivo) }}"

                                    target="_blank">
                                    <x-register-button class="ms-3">
                                        📄 Ver
                                    </x-register-button>
                                </a>

                                <!-- Botón de Eliminar -->
                                <form id="delete-form-{{ $recurso->id }}" action="{{ route('recurso.destroy', $recurso->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <x-danger-button class="ms-3" onclick="confirmDelete({{ $recurso->id }})">
                                    🗑️ Eliminar
                                </x-danger-button>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>