<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        📚  {{ __('Recursos Disponibles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
      <!-- Lista de Recursos -->
      <div id="lista-recursos" class="mt-8">
                    <h3 class="text-lg font-bold mb-4">Recursos Subidos</h3>
                    <ul>
                        @foreach ($recursos as $recurso)
                            <li class="bg-white p-4 rounded-lg shadow-sm mb-4 flex justify-between items-center">
                            
                            <div>
                                    <h4 class="text-gray-800 font-semibold">📚{{ $recurso->titulo }}</h4>
                                    <p class="text-gray-500 text-sm">{{ $recurso->descripcion }}</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">

                                <div class="flex space-x-2">
                                
   <!-- Botón para Ver Documento -->
  
<td class="py-4 px-6 text-gray-600 dark:text-gray-300">
                                <a href="{{ asset('storage/' . $recurso->archivo) }}" target="_blank" class="text-blue-500 hover:underline"><i class="fa-solid fa-download"></i> <span class="ml-2">archivo</a>
                            </td>
                                    




                                    
                                </div>
                            </li>
                        @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
