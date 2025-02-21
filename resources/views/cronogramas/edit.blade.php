<div class="flex flex-col items-center mt-8">
    <div class="overflow-x-auto w-full max-w-6xl">
        <div class="container">
            <h3>Cronograma</h3>
            <br>
            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-50">
                    <tr class="table-primary">
                        <th class="text-center py-4 px-6">ID</th>
                        <th class="text-center py-4 px-6">Nombre</th>
                        <th class="text-center py-4 px-6">Tema</th>
                        <th class="text-center py-4 px-6">Lugar</th>
                        <th class="text-center py-4 px-6">Dia</th>
                        <th class="text-center py-4 px-6">Descripción</th>
                        <th class="text-center py-4 px-6">Imagen</th>
                        <th class="text-center py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cronogramas as $cronograma)
                    <tr class="border-t">
                        <td class="text-center py-4 px-6">{{ $cronograma->id }}</td>
                        <td class="text-center py-4 px-6">{{ $cronograma->nombre }} {{ $cronograma->apellido }}</td>
                        <td class="text-center py-4 px-6">{{ $cronograma->tema_exposicion }}</td>
                        <td class="text-center py-4 px-6">{{ $cronograma->lugar }}</td>
                        <td class="text-center py-4 px-6">{{ $cronograma->dia }} {{ $cronograma->dia_numero }} de {{ $cronograma->mes }} a las {{ \Carbon\Carbon::parse($cronograma->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($cronograma->hora_fin)->format('H:i') }}</td>
                        <td class="text-center py-4 px-6">{{$cronograma->descripcion}}</td>
                        <td class="text-center py-4 px-6"><!-- Imagen circular -->
                            @if($cronograma->foto)
                            <img src="{{ Storage::url($cronograma->foto) }}"
                                alt="Foto"
                                class="w-12 h-12 rounded-full object-cover shadow-md">
                            @endif
                        </td>
                        <td class="d-flex text-center py-4 px-6">

                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal-{{ $cronograma->id }}"> <i class="fa-solid fa-pen-to-square"></i> </button>

                            <!-- Botón de Eliminar -->

                            <form id="delete-form-{{ $cronograma->id }}" action="{{ route('cronogramas.destroy', $cronograma->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete({{ $cronograma->id }})"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal-{{ $cronograma->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-{{ $cronograma->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-{{ $cronograma->id }}">Editar Cronograma</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>

                                <div class="modal-body">
                                    <!-- Formulario de edición -->
                                    <form action="{{ route('cronogramas.update', $cronograma->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre:</label>
                                            <input type="text" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="{{ $cronograma->nombre }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellido" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Apellido:</label>
                                            <input type="text" name="apellido" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="{{ $cronograma->apellido }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tema_exposicion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Tema de Esposicion:</label>
                                            <input type="text" name="tema_exposicion" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="{{ $cronograma->tema_exposicion }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lugar" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-location-dot"></i><span class="ml-2"></span> Lugar:</label>
                                            <input type="text" name="lugar" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="{{ $cronograma->lugar }}">
                                        </div>
                                        <div class="flex flex-cols-3 gap-4 mb-3">
                                            <div>
                                                <label for="dia" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-calendar-days"></i><span class="ml-2"></span> Día:</label>
                                                <select name="dia" id="dia" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                                    <option value="" disabled>{{ __('Selecciona un día') }}</option>
                                                    <option value="Lunes" {{ $cronograma->dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                                                    <option value="Martes" {{ $cronograma->dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                                                    <option value="Miércoles" {{ $cronograma->dia == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                                                    <option value="Jueves" {{ $cronograma->dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                                                    <option value="Viernes" {{ $cronograma->dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="dia_numero" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-calendar-day"></i><span class="ml-2"></span> Día (número):</label>
                                                <input type="number" name="dia_numero" id="dia_numero" value="{{ $cronograma->dia_numero }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>
                                            <div>
                                                <label for="mes" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-calendar-week"></i><span class="ml-"></span> Mes:</label>
                                                <select name="mes" id="mes" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                                    <option value="" disabled>{{ __('Selecciona un mes') }}</option>
                                                    <option value="Enero" {{ $cronograma->mes == 'Enero' ? 'selected' : '' }}>Enero</option>
                                                    <option value="Febrero" {{ $cronograma->mes == 'Febrero' ? 'selected' : '' }}>Febrero</option>
                                                    <option value="Marzo" {{ $cronograma->mes == 'Marzo' ? 'selected' : '' }}>Marzo</option>
                                                    <option value="Abril" {{ $cronograma->mes == 'Abril' ? 'selected' : '' }}>Abril</option>
                                                    <option value="Mayo" {{ $cronograma->mes == 'Abril' ? 'selected' : '' }}>Abril</option>
                                                    <option value="Junio" {{ $cronograma->mes == 'Junio' ? 'selected' : '' }}>Junio</option>
                                                    <option value="Julio" {{ $cronograma->mes == 'Julio' ? 'selected' : '' }}>Julio</option>
                                                    <option value="Agosto" {{ $cronograma->mes == 'Agosto' ? 'selected' : '' }}>Agosto</option>
                                                    <option value="Septiembre" {{ $cronograma->mes == 'Septiembre' ? 'selected' : '' }}>Septiembre</option>
                                                    <option value="Octubre" {{ $cronograma->mes == 'Octubre' ? 'selected' : '' }}>Octubre</option>
                                                    <option value="Noviembre" {{ $cronograma->mes == 'Noviembre' ? 'selected' : '' }}>Noviembre</option>
                                                    <option value="Diciembre" {{ $cronograma->mes == 'Diciembre' ? 'selected' : '' }}>Diciembre</option>
                                                    <!-- Agregar más meses... -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Descripción:</label>
                                            <textarea name="descripcion" id="descripcion" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">{{ $cronograma->descripcion }}</textarea>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label for="hora_inicio" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-start"></i><span class="ml-2"></span> Hora de Inicio:</label>
                                                <input type="time" name="hora_inicio" id="hora_inicio" value="{{ $cronograma->hora_inicio }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>
                                            <div>
                                                <label for="hora_fin" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-end"></i><span class="ml-2"></span> Hora de Fin:</label>
                                                <input type="time" name="hora_fin" id="hora_fin" value="{{ $cronograma->hora_fin }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Imagen</label>

                                            @if ($cronograma->foto)
                                            <img src="{{ Storage::url($cronograma->foto) }}" alt="Imagen" class="w-12 h-12 rounded-full object-cover shadow-md">
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>