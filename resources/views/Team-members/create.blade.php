<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            ✍️ {{ __('Agregar Exponentes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="container mt-5">
                <div class="container">
                    <div class="flex justify-end">
                        <x-primary-button class="bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg"
                            data-bs-toggle="modal" data-bs-target="#modalteam">
                            {{ __(' Agregar') }}
                        </x-primary-button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalteam" tabindex="-1" aria-labelledby="modalteamLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="modalteamLabel">Registrar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('team-members.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2""><i class=" fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre y Apellido</label>
                                                <input id="name" type="text" name="name" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="role" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-graduate"></i><span class="ml-2"></span> Título</label>
                                                <input id="role" type="text" name="role" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            </div>


                                            <div class="mb-3">
                                                <label for="team" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Tematica</label>
                                                <input id="team" type="text" name="team" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            </div>


                                            <div class="mb-3">
                                                <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-twitter"></i><span class="ml-2"></span> Twitter</label>
                                                <input id="twitter" type="url" name="twitter" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>

                                            <div class="mb-3">
                                                <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-linkedin"></i><span class="ml-2"></span> LinkedIn</label>
                                                <input id="linkedin" type="url" name="linkedin" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>



                                            <div class="mb-3">
                                                <UserCircleIcon class="size-12 text-gray-300" aria-hidden="true" />
                                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-regular fa-image"></i><span class="ml-2"></span> Imagen</label>
                                                <input id="image" type="file" name="image" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bio" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Información Adicional</label>
                                                <textarea id="bio" name="bio" class="form-control" rows="4"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="details" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Detalles Personalizados</label>
                                                <textarea name="details" class="form-control" rows="4"></textarea>
                                            </div>




                                            <div class="mb-3">
                                                <x-primary-button class="ms-3 flex items-center bg-teal-500 hover:bg-teal-600 text-white py-2 px-4 rounded-lg shadow-md">
                                                    {{ __('Agregar') }}
                                                </x-primary-button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>
                    @include('team-members.edit')
                </div>
            </div>
            </div>
        </div>
    </div>

    @if ($errors->has('image'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la imagen',
                text: '{{ $errors->first('
                image ') }}',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#d33',
            });
        });
    </script>
    @endif
</x-app-layout>