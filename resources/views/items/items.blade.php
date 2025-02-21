<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      @auth
      <div>¡Hola {{ Auth::user()->name }}, Bienvenido al proceso de entrega de Ponencias!</div>
      @endauth
    </h2>

  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <!-- Contenedor del texto -->
          <div>
            <h1 class="mb-2 text-xl font-medium leading-tight"><i class="fa-solid fa-layer-group"></i> Cronongramas</h1>
          </div>

          <div class="flex flex-wrap gap-6 justify-center p-6">
    @foreach ($items as $item)
    <!-- Tarjeta -->
    
    

<div class="card text-center mb-3" style="width: 18rem;">
  <div class="card-body">
  <div class="flex justify-center mb-3">
  <i class="fa-solid fa-calendar"></i>
            </div>
    <!-- Título -->
    <h5 class="text-lg font-semibold text-gray-800 truncate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $item->descripcion }}
            </h5>
     
        </div>
        <!-- Pie de tarjeta -->
        <div class="py-2 bg-gray-100 text-center text-sm text-gray-600">
            {{ $item->fecha }}
        </div>
  </div>
  @endforeach
</div>
        </div>









        </div>
      </div>
    </div>
  </div>

</x-app-layout>