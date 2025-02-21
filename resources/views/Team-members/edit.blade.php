<br>
<div class="flex flex-col items-center mt-8">
    <div class="overflow-x-auto w-full max-w-6xl">
        <div class="container">
            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-50">
                    <tr class="table-success">
                    <th class="text-center py-4 px-6">ID</th>
                        <th class="text-center py-4 px-6">Nombre</th>
                        <th class="text-center py-4 px-6">Título</th>
                        <th class="text-center py-4 px-6">Temática</th>
                        <th class="text-center py-4 px-6">Twitter</th>
                        <th class="text-center py-4 px-6">LinkedIn</th>
                        <th class="text-center py-4 px-6">Imagen</th>
                        <th class="text-center py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teamMembers as $member)
                    <tr class="border-t">
                    <td class="text-center py-4 px-6">{{ $member->name }}</td>
                        <td class="text-center py-4 px-6">{{ $member->name }}</td>
                        <td class="text-center py-4 px-6">{{ $member->role }}</td>
                        <td class="text-center py-4 px-6">{{ $member->team }}</td>

                        <td class="text-center py-4 px-6">
                            @if ($member->twitter)
                            <a href="{{ $member->twitter }}" target="_blank">Twitter</a>
                            @endif
                        </td>
                        <td class="text-center py-4 px-6">
                            @if ($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank">LinkedIn</a>
                            @endif
                        </td>

                        <td class="text-center py-4 px-6">

                            @if($member->image)
                            <img src="{{ Storage::url($member->image) }}"
                                alt="foto"
                                class="w-12 h-12 rounded-full object-cover shadow-md">
                            @endif

                        <td class="d-flex text-center py-4 px-6">

                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal-{{ $member->id }}"> <i class="fa-solid fa-pen-to-square"></i> </button>
                            <!-- Botón Eliminar -->

                            <form id="delete-form-{{ $member->id }}" action="{{ route('team-members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete({{ $member->id }})"> <i class="fa-solid fa-trash"></i> </button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal-{{ $member->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-{{ $member->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-{{ $member->id }}">Editar Cronograma</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('team-members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                        <!-- Campo Nombre -->

                                        <div class="mb-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre y apellido</label>
                                            <input type="text" name="name" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $member->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="role" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-graduate"></i><span class="ml-2"></span> Título </label>
                                            <input type="text" name="role" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $member->role }}">
                                        </div>


                                        <div class="mb-3">
                                            <label for="team" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Temática</label>
                                            <input type="text" name="team" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"" value=" {{ $member->team }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-twitter"></i><span class="ml-2"></span> Twitter</label>
                                            <input type="url" name="twitter" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $member->twitter }}">
                                        </div>


                                        <div class="mb-3">
                                            <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-linkedin"></i><span class="ml-2"></span> LinkedIn</label>
                                            <input type="url" name="linkedin" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $member->linkedin }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bio" class="form-label"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Información Adicional</label>
                                            <textarea name="bio" id="bio" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" rows="4">{{ $member->bio }}</textarea>


                                        </div>

                                        <div class="mb-3">
                                            <label for="details" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Detalles Personalizados</label>
                                            <textarea name="details" id="details" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" rows="4">{{ $member->details }}"</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label px-4 py-2 text-sm text-gray-800">Imagen</label>

                                            @if ($member->image)
                                            <img src="{{ Storage::url($member->image) }}" alt="Imagen" class="w-12 h-12 rounded-full object-cover shadow-md">
                                            @endif
                                        </div>



                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
        </div>


        @empty
        <tr>
            <td colspan="7">No hay miembros del equipo registrados.</td>
        </tr>
        @endforelse
        </tbody>

        </table>
    </div>
</div>
</div>
</div>