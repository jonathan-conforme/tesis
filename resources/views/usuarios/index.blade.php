<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>


    <div class="flex flex-col items-center mt-8">
        <div class="overflow-x-auto w-full max-w-6xl">
            <div class="container">

                <br>
                <h1 class="text-center py-4 px-6">Lista de Usuarios</h1>
                <form method="GET" action="{{ route('usuarios.index') }}" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por correo" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>

                <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-50">
                        <tr class="table-info">
                            <th class="text-center py-4 px-6">ID</th>
                            <th class="text-center py-4 px-6">Nombre</th>
                            <th class="text-center py-4 px-6">Email</th>
                            <th class="text-center py-4 px-6">Rol</th>
                            <th class="text-center py-4 px-6">Creado</th>
                            <th class="text-center py-4 px-6">Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="border-t">
                            <td class="text-center py-4 px-6">{{ $user->id }}</td>
                            <td class="text-center py-4 px-6">{{ $user->name }}</td>
                            <td class="text-center py-4 px-6">{{ $user->email }}</td>
                            <td class="text-center py-4 px-6">
                                @if ($user->role == 1)
                                Administrador
                                @elseif ($user->role == 2)
                                Profesor
                                @else
                                Estudiante
                                @endif
                            </td>
                            <td class="text-center py-4 px-6">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex py-4 px-6">
                                <!-- Botón para editar -->
                                <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}"> <i class="fa-solid fa-pen-to-square"></i> </button>

                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Campo oculto para preservar la página -->
                                            <input type="hidden" name="page" value="{{ request()->query('page') }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label"><i class="fa-solid fa-user-tie"></i> Nombre</label>
                                                        <input type="text" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="name" name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label"> <i class="fa-solid fa-at"></i> Correo</label>
                                                        <input type="email" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="email" name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="role" class="form-label"><i class="fa-solid fa-user-tie"></i> Rol</label>
                                                        <select id="role" name="role" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"">
                                                            <option value=" 1" {{ $user->role == 1 ? 'selected' : '' }}>Administrador</option>
                                                            <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Profesor</option>
                                                            <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Estudiante</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-dark">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Botón para eliminar -->
                                <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('usuarios.destroy', $user->id) }}" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Campo oculto para preservar la página -->
                                    <input type="hidden" name="page" value="{{ request()->query('page') }}">
                                    <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete({{ $user->id }})"> <i class="fa-solid fa-trash"></i> </button>
                                </form>

                                <!-- Botón para restablecer contraseña -->

                                <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#resetPasswordModal{{ $user->id }}"> <i class="fa-solid fa-lock"></i> </button>

                                <div class="modal fade" id="resetPasswordModal{{ $user->id }}" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ route('usuarios.reset_password', $user->id) }}">
                                            @csrf
                                            <!-- Campo oculto para preservar la página -->
                                            <input type="hidden" name="page" value="{{ request()->query('page') }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="resetPasswordModalLabel">Restablecer Contraseña</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas restablecer la contraseña del usuario <strong>{{ $user->name }}</strong>? <br>
                                                    La contraseña será restablecida a: <code>123456789</code>.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Restablecer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4 flex justify-center">
        <div class="pagination">
            {{ $users->links('pagination::tailwind', ['activeClass' => 'bg-blue-500 text-white']) }}
        </div>
    </div>

</x-app-layout>