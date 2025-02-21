<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            ✍️ {{ __('Registrar Valor de Ponencia') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center mt-8">
        <div class="overflow-x-auto w-full max-w-6xl">
            <div class="container">
                <br>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{-- Formulario para crear productos --}}
                                <form action="{{ route('products.store') }}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-3">
                                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título:</label>
                                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            @error('title') <p style="color: red;">{{ $message }}</p> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-hand-holding-dollar"></i><span class="ml-2"></span><span class="ml-2"></span> Precio:</label>
                                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            @error('price') <p style="color: red;">{{ $message }}</p> @enderror
                                        </div>
                                    

                                        <div class="mb-3">
                                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-comment"></i><span class="ml-2"></span> Descripción:</label>
                                        <textarea name="description" id="description" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" rows="4">{{ old('description') }}</textarea>
                                        @error('description') <p style="color: red;">{{ $message }}</p> @enderror
                                    </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
                                <button type="submit" class="btn btn-dark">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lista de productos --}}

                <h2>Precio de ponencia</h2>
                <br>
                <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-50">
                        <tr class="table-light">
                            <th class="text-center py-4 px-6">ID</th>
                            <th class="text-center py-4 px-6">Título</th>
                            <th class="text-center py-4 px-6">Precio</th>
                            <th class="text-center py-4 px-6">Descripción</th>
                            <th class="text-center py-4 px-6">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr class="border-t">
                            <td class="text-center py-4 px-6">{{ $product->id }}</td>
                            <td class="text-center py-4 px-6">{{ $product->title }}</td>
                            <td class="text-center py-4 px-6">{{ $product->price }}</td>
                            <td class="text-center py-4 px-6">{{ $product->description }}</td>
                            <td class="text-center py-4 px-6">
                                <div class="d-flex justify-content-center">
                                    <!-- Botón para abrir el modal de edición -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $product->id }}"> <i class="fa-solid fa-pen-to-square"></i> </button>

                                    <!-- Formulario de eliminación con botón dentro -->
                                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger ms-3" onclick="confirmDelete({{ $product->id }})"> <i class="fa-solid fa-trash"></i> </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal de Edición -->
                        <div class="modal fade" id="editModal-{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel-{{ $product->id }}">Editar Precio</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario de Edición -->
                                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label class="form-label block text-sm font-medium text-gray-700 mb-2">Título</label>
                                                <input type="text" name="title" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $product->title }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-hand-holding-dollar"></i><span class="ml-2"></span><span class="ml-2"></span>
                                                    Precio</label>
                                                <input type="number" step="0.01" name="price" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="{{ $product->price }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-comment"></i><span class="ml-2"></span>
                                                    Descripción</label>
                                                <textarea name="description" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" rows="4" required>{{ $product->description }}</textarea>
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

                        @empty
                        <tr>
                            <td colspan="4">No hay productos disponibles.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>

</x-app-layout>