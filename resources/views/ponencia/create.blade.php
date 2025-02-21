<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('ENVIAR PONENCIA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-9 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <!-- Button trigger modal -->
                <div class="d-flex justify-content-start">
    <button type="button" class="btn btn-primary bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg ms-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Subir Ponencias
    </button>
</div>
<br>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">PONENCIA</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para enviar ponencia -->
                                <form action="{{ route('ponencias.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">

                                        <!-- Campo Título -->
                                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-pen"></i> <span class="ml-2"> Título de Ponencia</span></label>
                                        <input type="text" name="titulo" id="titulo" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                    </div>
                                    <div class="mb-3">
                                        <!-- Campo Autor -->
                                        <label for="autor" class="block text-sm font-medium text-gray-700 mb-2"> <i class="fa-solid fa-user-tie"></i><span class="ml-2"> Autores
                                        </label>
                                        <input type="text" name="autor" id="autor" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                    </div>

                                    <div class="mb-3">
                                        <!-- Campo para el correo electrónico -->
                                        <label for="correo" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-envelope"></i> <span class="ml-2"> Correo Electrónico</span>
                                        </label>
                                        <input type="email" name="correo" id="correo"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                    </div>
                                    <div class="mb-3">
                                        <!-- Campo para el número de teléfono -->
                                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-phone"></i> <span class="ml-2"> Número de Teléfono</span>
                                        </label>
                                        <input type="tel" name="telefono" id="telefono"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>

                                    </div>

                                    <div class="mb-3">
                                        <!-- Campo para la universidad -->
                                        <label for="universidad" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-university"></i> <span class="ml-2"> Universidad/Curso/Paralelo</span>
                                        </label>
                                        <input type="text" name="universidad" id="universidad"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tematica" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-regular fa-pen-to-square"></i><span class="ml-2"></span> Temática:</label>
                                        <select name="tematica" id="tematica" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            <option value="" disabled selected>Selecciona una temática</option>
                                            <option value="Tecnologias de la informacion y comunicacion">Tecnologías de la información y comunicación</option>
                                            <option value="Ciudades inteligentes e IoT">Ciudades inteligentes e IoT</option>
                                            <option value="Electronica">Electrónica</option>
                                            <option value="Inteligencia artificial">Inteligencia artificial</option>
                                            <option value="Robótica">Robótica</option>
                                            <option value="Ciencias de datos">Ciencias y Minería de Datos</option>
                                            <option value="Innovacion educativa">Innovación educativa</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">

                                        <!-- Campo para seleccionar el modo de participación -->
                                        <label for="modo_participacion" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-check"></i> <span class="ml-2"> Modo de Participación</span>
                                        </label>
                                        <select name="modo_participacion" id="modo_participacion"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            <option value="" disabled selected>Seleccione un modo</option>
                                            <option value="Estudiantes Externos">Estudiantes Externos</option>
                                            <option value="Estudiantes Unesum">Estudiantes Unesum</option>
                                            <option value="Estudiantes Maestría TIC">Estudiantes Maestría TIC</option>
                                            <option value="Investigador Externos">Investigadores Externos</option>
                                            <option value="Investigador Unesum">Investigadores Unesum</option>
                                            <option value="Asistentes">Asistentes</option>
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="archivo" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-file-pdf"></i><span class="l-2"></span> Subir Archivo
                                        </label>
                                        <input type="file" name="archivo" id="archivo" accept=".pdf,.doc,.docx" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                    </div>
                                    <div class="mb-3">
                                        <!-- Campo para subir la imagen del pago -->
                                        <label for="imagen_pago" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-image"></i> <span class="ml-2"> Subir Imagen de Pago</span>
                                        </label>
                                        <input type="file" name="imagen_pago" id="imagen_pago" accept="image/*"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                    </div>
                                    <div class="mb-3">
                                        <!-- Campo para la descripción -->

                                        <label class="form-label"><i class="fa-solid fa-comment"></i><span class="ml-2"></span>
                                            Descripción</label>
                                        <textarea name="descripcion" class="form-control" rows="4" required></textarea>

                                    </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <!-- Botón de envío -->

                                <x-primary-button class="ms-3 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" style="margin-right: 0.3rem;">
                                        <path d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                    </svg>
                                    {{ __('Enviar Ponencia') }}
                                </x-primary-button>

                            </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col items-center mt-8">
                   

                    <div class="overflow-x-auto w-full max-w-6xl">
                        <div class="container">
                            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                                <thead>
                                    <tr>
                                        <th class="text-center py-4 px-6"><i class="fa-solid fa-user"></i>Nombre</th>
                                        <th class="text-center py-4 px-6"><i class="fa-solid fa-pen"></i><span class="ml-2"> Título</th>
                                        <th class="text-center py-4 px-6"><i class="fa-solid fa-folder"></i><span class="ml-2"> Temática</th>
                                        <th class="text-center py-4 px-6"><i class="fa-solid fa-user-tie"></i><span class="ml-2"> Modo Participación</th>
                                        <th class="text-center py-4 px-6"><i class="fa-solid fa-arrow-right-arrow-left"></i> Estado</th>
                                        <th class="text-center py-4 px-6"> Observaciones <i class="fa-regular fa-comment"></i></th>
                                        <th class="text-center py-4 px-6"><i class="fa-solid fa-file-pdf"></i> Documento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ponencias as $ponencia)
                                    <tr>
                                        <td class="text-center py-4 px-6">{{ $ponencia->user->name ?? 'No disponible' }}</td>
                                        <td class="text-center py-4 px-6">{{ $ponencia->titulo }}</td>
                                        <td class="text-center py-4 px-6">{{ $ponencia->tematica }}</td>
                                        <td class="text-center py-4 px-6">{{ $ponencia->modo_participacion }}</td>
                                        <td class="py-4 px-6">
                                            @if ($ponencia->estado === 'pendiente')
                                            <span class="badge bg-warning text-dark"><i class="fa-regular fa-clock"></i> Pendiente</span>
                                            @elseif ($ponencia->estado === 'aceptado')
                                            <span class="badge bg-success"><i class="fa-solid fa-check"></i> Aceptado</span>
                                            @elseif ($ponencia->estado === 'rechazado')
                                            <span class="badge bg-danger"><i class="fa-solid fa-xmark"></i> Rechazado</span>
                                            @else
                                            <span class="badge bg-secondary">Sin estado</span>
                                            @endif
                                        </td>

                                        <td class="py-4 px-6 text-gray-600 dark:text-gray-300 text-center">{{ $ponencia->observaciones }}</td>
                                        <td class="py-4 px-6 text-gray-600 dark:text-gray-300 text-center">

                                            @if ($ponencia->estado === 'rechazado')
                                            @if ($ponencia->puedeReemplazar()) {{-- Método del modelo --}}
                                            <span class="text-yellow-500">Fecha de entrega: {{ $ponencia->fecha_entrega ?? 'No disponible' }}</span>
                                            <form action="{{ route('ponencias.updateArchivo', $ponencia->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <input type="file" name="archivo" class="form-control mb-2" accept=".pdf,.doc,.docx" required>
                                                <button type="submit" class="btn btn-primary btn-sm">Reemplazar</button>
                                            </form>
                                            @else
                                            <span class="text-red-500 font-semibold">No se aceptan trabajo despues de la fecha establecida</span>
                                            @endif

                                            @else
                                            <a href="{{ asset('storage/' . $ponencia->archivo) }}" target="_blank" class="text-blue-500 hover:underline">
                                                Ver <i class="fa-solid fa-file-pdf"></i>
                                            </a>
                                            @endif
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-400">No hay ponencias enviadas.</td>
                                    </tr>
                                    @endforelse
                

                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>

          
    
        </div>
    </div>
    </div>

    @if ($errors->any())
    <script>
        let errores = "";
        @foreach($errors -> all() as $error)
        errores += "{{ $error }}\n";
        @endforeach

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errores,
        });
    </script>
    @endif


</x-app-layout>