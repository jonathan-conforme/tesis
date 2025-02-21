<br>
<div class="flex flex-col items-center mt-8">
    <div class="overflow-x-auto w-full max-w-6xl">
        <div class="container">
            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-50">
                    <tr class="table-success">
                    <th class="text-center py-4 px-6">ID</th>
                        <th class="text-center py-4 px-6">Descripción</th>
                        <th class="text-center py-4 px-6">Fecha</th>
                        <th class="text-left py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="border-t">
                    <td class="text-center py-4 px-6">{{ $item->id }}</td>
                        <td class="text-center py-4 px-6">{{ $item->descripcion }}</td>
                        <td class="text-center py-4 px-6">{{ $item->fecha }}</td>
                        <td class="text-center py-4 px-6">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}"> <i class="fa-solid fa-pen-to-square"> </i></button>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline ;">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete({{ $item->id }})"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                        </div>
                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">Editar Fecha de interes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario de edición -->
                                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label form-label block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i> Descripción</label>
                                            <input type="text" name="descripcion" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $item->descripcion }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label form-label block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-calendar-days"></i> Fecha</label>
                                            <input type="date" name="fecha" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $item->fecha }}" required>
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




                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>