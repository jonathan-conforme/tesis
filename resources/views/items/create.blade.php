<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
      ✍️ {{ __('Registrar fecha de interes') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
        <div class="container mt-5">
          <div class="container">
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Fechas </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('items.store') }}" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i> Descripción</label>
                        <input type="text" name="descripcion" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                      </div>
                      <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-calendar-days"></i> Fecha</label>
                        <input type="date" name="fecha" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                      </div>



                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-dark">
                      {{ __('Guardar') }}
                    </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>


          </div>
          @include('items.index')
        </div>
      </div>
    </div>
  </div>


</x-app-layout>