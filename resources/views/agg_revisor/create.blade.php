<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
        ✍️ {{ __('Agregar Revisor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
               <!-- Button trigger modal -->
<div class="flex justify-end">
<x-primary-button class="bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg"
    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                         {{ __(' Agregar') }} 
                        </x-primary-button>
        </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Revisor </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <form action="{{ route('revisor.store') }}" method="POST">
                        @csrf
                        
                            <!-- Campo Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fa-solid fa-user-tie"></i><span class="ml-2"></span> {{ __('Nombre') }}
                                </label>
                                <input id="nombre" type="text" name="nombre" 
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" 
                                       required />
                            </div>
                            <!-- Campo Apellido -->
                            <div class="class="mb-3"">
                                <label for="apellido" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fa-solid fa-user-tie"></i><span class="ml-2"></span>      {{ __('Apellido') }}
                                </label>
                                <input id="apellido" type="text" name="apellido" 
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" 
                                       required />
                            </div>
                        
                        <div class="mb-3">
                            <!-- Campo Correo -->
                            
                                <label for="correo" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fa-solid fa-at"></i> <span class="ml-2"></span> {{ __('Correo') }}
                                </label>
                                <input id="correo" type="email" name="correo" 
                                       class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" 
                                       required />
                                       </div>
                            <!-- Campo Temática -->
                            <div class="mb-3">
                                <label for="tematica" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fa-regular fa-pen-to-square"></i><span class="ml-2"></span> {{ __('Temática') }}
                                </label>
                                <select id="tematica" name="tematica" 
                                        class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" 
                                        required>
                                    <option value="" disabled selected>{{ __('Selecciona una temática') }}</option>
                                    <option value="Tecnologias de la informacion y comunicacion">{{ __('Tecnologías de la información y comunicación') }}</option>
                                    <option value="Ciudades inteligentes e IoT">{{ __('Ciudades inteligentes e IoT') }}</option>
                                    <option value="Electronica">{{ __('Electrónica') }}</option>
                                    <option value="Inteligencia artificial">{{ __('Inteligencia artificial') }}</option>
                                    <option value="Robotica">{{ __('Robótica') }}</option>
                                    <option value="Ciencias de datos">{{ __('Ciencias y Minerias de Datos') }}</option>
                                    <option value="Innovacion educativa">{{ __('Innovación educativa') }}</option>
                                </select>
                            </div>
                        
                        <!-- Botón de Envío -->
                        <div class="modal-footer">
                            <x-primary-button class="ms-3 flex items-center bg-teal-500 hover:bg-teal-600 text-white py-2 px-4 rounded-lg shadow-md">
                                {{ __('Guardar') }}
                            </x-primary-button>
                        </div>
                    </form>
      </div>    
    </div>
  </div>    

                </div>
<br>
@include('agg_revisor.edit')
                <hr class="my-6 border-gray-300">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                
            </div>
        </div>
    </div>

@if ($errors->any())
    <script>
        let errores = "";
        @foreach ($errors->all() as $error)
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
