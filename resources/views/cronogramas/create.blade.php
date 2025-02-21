<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Gestionar Cronograma') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="container">
                    <!-- Botón para abrir el modal -->
                    <div class="flex justify-end">
                        <x-primary-button class="bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg"
                            data-bs-toggle="modal" data-bs-target="#modalRegistrar">
                            {{ __(' Agregar') }}
                        </x-primary-button>
                    </div>
                    @include('cronogramas.edit')

                    <!-- Modal -->
                    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Cronograma</h5>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cronogramas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre:</label>
                                            <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellido" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-user-tie"></i> Apellido:</label>
                                            <input type="text" name="apellido" id="apellido" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tema_exposicion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Tema de Exposición:</label>
                                            <input type="text" name="tema_exposicion" id="tema_exposicion" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lugar" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-location-dot"></i><span class="ml-2"></span> Lugar:</label>
                                            <input type="text" name="lugar" id="lugar" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Descripción:</label>
                                            <textarea name="descripcion" id="descripcion" rows="3" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required></textarea>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <label for="dia"><i class="fa-solid fa-calendar-days"></i><span class="ml-2"></span> Día de la Semana:</label>
                                            <select id="dia" name="dia" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                                <option value="" disabled selected>{{ __('Selecciona un día') }}</option>
                                                <option value="Lunes">{{ __('Lunes') }}</option>
                                                <option value="Martes">{{ __('Martes') }}</option>
                                                <option value="Miércoles">{{ __('Miércoles') }}</option>
                                                <option value="Jueves">{{ __('Jueves') }}</option>
                                                <option value="Viernes">{{ __('Viernes') }}</option>
                                            </select>
                                            <label for="dia_numero"><i class="fa-solid fa-calendar-day"></i><span class="ml-2"></span> Día (número):</label>
                                            <input type="number" name="dia_numero" id="dia_numero" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            <!-- Selección de Mes -->
                                            <label for="mes"><i class="fa-solid fa-calendar-week"></i><span class="ml-"></span> Mes:</label>
                                            <select id="mes" name="mes" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                                <option value="" disabled selected>{{ __('Selecciona un mes') }}</option>
                                                <option value="Enero">{{ __('Enero') }}</option>
                                                <option value="Febrero">{{ __('Febrero') }}</option>
                                                <option value="Marzo">{{ __('Marzo') }}</option>
                                                <option value="Abril">{{ __('Abril') }}</option>
                                                <option value="Mayo">{{ __('Mayo') }}</option>
                                                <option value="Junio">{{ __('Junio') }}</option>
                                                <option value="Julio">{{ __('Julio') }}</option>
                                                <option value="Agosto">{{ __('Agosto') }}</option>
                                                <option value="Septiembre">{{ __('Septiembre') }}</option>
                                                <option value="Octubre">{{ __('Octubre') }}</option>
                                                <option value="Noviembre">{{ __('Noviembre') }}</option>
                                                <option value="Diciembre">{{ __('Diciembre') }}</option>
                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="hora_inicio" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-start"></i><span class="ml-2"></span> Hora de Inicio:</label>
                                            <input type="time" name="hora_inicio" id="hora_inicio" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        <div>
                                            <label for="hora_fin" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-end"></i><span class="ml-2"></span> Hora de Fin:</label>
                                            <input type="time" name="hora_fin" id="hora_fin" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-image"></i><span class="ml-"></span> Foto:</label>
                                            <input type="file" name="foto" id="foto" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                        </div>
                                        <div class="mt-6 flex justify-center">
                                            <x-primary-button class="bg-teal-500 hover:bg-teal-600 text-white py-2 px-6 rounded-lg">
                                                {{ __('Guardar Cronograma') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


</x-app-layout>