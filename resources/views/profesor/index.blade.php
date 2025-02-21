<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        @auth
  
  @if (Auth::user()->profesor)
    <div>Hola {{ Auth::user()->name }}, Bienvenido! Tu temática asignada de revisión es: {{ Auth::user()->profesor->tematica }}</div>
  @else
    <div>No tienes una temática asignada.</div>
  @endif
@endauth

        </h2>
    </x-slot>

<br>
    <div class="flex flex-col items-center mt-8">
        <div class="overflow-x-auto w-full max-w-6xl">
            <div class="container">

    <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
    
                    <thead class="bg-gray-50">
                        <tr class="table-info">
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-user"></i> Nombres</th>
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-phone"></i> Telefono</th>
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-university"></i> Universida</th>
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-user-tie"></i> Participante</th>
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-file-pdf"></i> Documento</th>                        
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-receipt"></i> Comprobante</th>
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-arrow-right-arrow-left"></i> estado</th>
                            <th class="text-center py-4 px-6">Observaciones <i class="fa-regular fa-comment"></i></th>
                            <th class="text-center py-4 px-6"><i class="fa-solid fa-share"></i> Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($ponencias as $ponencia)
                      
                    <tr class="border-t">
                    
                            <td class="text-center py-4 px-6">{{ $ponencia->user->name ?? 'No disponible' }}</td>

                            <td class="text-center py-4 px-6">{{ $ponencia->telefono }}</td>
                            <td class="text-center py-4 px-6">{{ $ponencia->universidad }}</td>
                            <td class="text-center py-4 px-6">{{ $ponencia->modo_participacion }}</td>
                            <td class="text-center py-4 px-6">
                                <a href="{{ asset('storage/' . $ponencia->archivo) }}" target="_blank" class="text-blue-500 hover:underline"><i class="fa-solid fa-file-pdf"></i></a>
                            </td>
                            <td class="text-center py-4 px-6">
                                <a href="{{ asset('storage/' . $ponencia->imagen_pago) }}" target="_blank" class="text-blue-500 hover:underline"><i class="fa-solid fa-camera"></i> Pago</a>
                            </td>
                            <td class="text-center py-4 px-6">
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

                            <td class="text-center py-4 px-6">{{ $ponencia->observaciones }}</td>
                            <td class="py-4 px-6">
                                <div class="d-flex justify-content-start gap-2">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $ponencia->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop-{{ $ponencia->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $ponencia->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel-{{ $ponencia->id }}">{{ $ponencia->user->name ?? 'No disponible' }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulario de Edición -->
                                                    <form action="{{ route('ponencia.update', $ponencia->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label class="form-label">Estado</label>
                                                            <select name="estado" class="form-control" required>
                                                                <option value="pendiente" {{ $ponencia->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                                <option value="aceptado" {{ $ponencia->estado === 'aceptado' ? 'selected' : '' }}>Aceptado</option>
                                                                <option value="rechazado" {{ $ponencia->estado === 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label"><i class="fa-solid fa-comment"></i><span class="ml-2"></span>
                                                                Observaciones</label>
                                                            <textarea name="observaciones" id="observaciones-{{ $ponencia->id }}" class="form-control" rows="4">{{ $ponencia->observaciones ?? 'Escribe tus observaciones aquí...' }}</textarea>
                                                        </div>
                                                        {{-- Campo oculto para la página actual --}}
                                                        <input type="hidden" name="page" value="{{ request('page',1) }}">

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
                                                            <x-primary-button class="ms-3 flex items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" style="margin-right: 0.3rem;">
                                                                    <path d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                                                </svg>
                                                                {{ __('Registrar') }}
                                                            </x-primary-button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="confirmDelete({{ $ponencia->id }})" class="btn btn-danger ms-3">
                                    <i class="fa-solid fa-trash"></i>
                                    <button>
                                    <form id="delete-form-{{ $ponencia->id }}" action="{{ route('ponencia.destroy', $ponencia->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                               
                            </td>
                            
                            
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-400">No hay ponencias asignadas a tu temática.</td>
                        </tr>
                        @endforelse

                    </tbody>
                   
                </table>

                 <!-- Navegación de paginación -->
                 <div class="mt-4 text-align-center">
                    {{ $ponencias->links() }}
                </div>

            </div>
    </div>  
</div>



</x-app-layout>