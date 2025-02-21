<!-- Lista de Revisores -->
<div id="lista-revisores" class="mt-8">
                    <h3 class="text-lg font-bold mb-4">{{ __('Revisores Registrados') }}</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($profesores as $profesor)
                            <li class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between">
                                <div>
                                    <h4 class="text-gray-800 font-semibold mb-1"> {{ $profesor->user->name ?? 'N/A' }}</h4>
                                    <p class="text-gray-500 text-sm mb-1"><i class="fa-solid fa-file-pen"></i> {{ $profesor->tematica }}</p>
                                    <p class="text-gray-500 text-sm"><i class="fa-solid fa-at"></i> {{ $profesor->user->email }}</p>
                                </div>
                                <div class="flex mt-4 space-x-2">
                                    <!-- Botón para Editar -->
                                  
                                    <button type="button" class="btn btn-warning text-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $profesor->id }}">
    Editar
</button>
<x-danger-button onclick="confirmDelete({{ $profesor->id }})" class="ms-3">
                                        {{ __('Eliminar') }}
                                    </x-danger-button>
                                    <form id="delete-form-{{ $profesor->id }}" action="{{ route('revisor.destroy', $profesor->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                
<!-- Modal de edición -->
<div class="modal fade" id="editModal-{{ $profesor->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-{{ $profesor->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel-{{ $profesor->id }}">Editar Revisor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario de edición -->
        <form action="{{ route('revisor.update', $profesor->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre y Apelligo</label>
                <input type="text" name="nombre" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $profesor->user->name }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Correo</label>
                <input type="email" name="correo" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $profesor->user->email }}" required>
            </div>

<!-- Campo Temática -->
<div class="mb-4">
                                <label for="tematica" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fa-regular fa-pen-to-square"></i><span class="ml-2"></span> {{ __('Temática') }}
                                </label>
                                <select id="tematica" name="tematica"
                                        class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" 
                                        required>
                                    <option value="" disabled selected>{{ __('Selecciona una temática') }}</option>
                                    <option value="Tecnologias de la informacion y comunicacion" {{ $profesor->tematica == 'Tecnologias de la informacion y comunicacion' ? 'selected' : '' }}>{{ __('Tecnologías de la información y comunicación') }}</option>
                                    <option value="Ciudades inteligentes e IoT" {{ $profesor->tematica == 'Ciudades inteligentes e IoT' ? 'selected' : '' }}>{{ __('Ciudades inteligentes e IoT') }}</option>
                                    <option value="Electronica" {{ $profesor->tematica == 'Electronica' ? 'selected' : '' }}>{{ __('Electrónica') }}</option>
                                    <option value="Inteligencia artificial" {{ $profesor->tematica == 'Inteligencia artificial' ? 'selected' : '' }}>{{ __('Inteligencia artificial') }}</option>
                                    <option value="Robotica" {{ $profesor->tematica == 'Robotica' ? 'selected' : '' }}>{{ __('Robótica') }}</option>
                                    <option value="Ciencias de datos"  {{ $profesor->tematica == 'Ciencias de datos' ? 'selected' : '' }}>{{ __('Ciencias de datos') }}</option>
                                    <option value="Innovacion educativa"{{ $profesor->tematica == 'Innovacion educativa' ? 'selected' : '' }}> {{ __('Innovación educativa') }}</option>
                                </select>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-secondary">Guardar cambios</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>