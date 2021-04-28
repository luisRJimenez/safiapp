<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Especialidad') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 grid grid-rows-1 grid-flow-col gap-4">
            <div class="flex space-x-2">
                <div>
                    <input type="hidden" wire:model="selected_id">
                    <select wire:model.defer='selectedarservicio' class=" text-gray-500 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccionar Area</option>
                        @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->arsdescripcion}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="selectedarservicio" wire:dirty.attr.remove="disabled" wire:target="selectedarservicio"/>
                </div>

                <div>
                    <x-jet-input type="text" placeholder="Tipo de Especialidad" wire:model.defer="tsdescripcion" required></x-jet-input>
                    <x-jet-input-error for="tsdescripcion" wire:dirty.attr.remove="disabled" wire:target="tsdescripcion"/>
                </div>

                <div class="py-1">
                    @if($updateMode)
                        <x-jet-button  wire:click='update()'>Actualizar</x-jet-button>
                    @else
                        <x-jet-button disabled wire:dirty.attr.remove="disabled" wire:target="tsdescripcion" wire:click='salvar()'>Grabar</x-jet-button>
                    @endif
                </div>
            </div>

        <div class="justify-self-end place-self-start">
            <div class=" relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none">
                  <span class="text-gray-500 sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </div>
                <input type="text"  wire:model="buscar" class="pl-7 pr-12 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" placeholder="Buscar....">
            </div>
        </div>
    </div>



    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Especialidades
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Area Servicio
                    </th>

                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                      <span class="sr-only">Eliminar</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-xs">


                @forelse ($data as $item)
                  <tr>
                    <td class="px-6 py-1 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$item ->id}}</div>
                    </td>
                    <td class="px-6 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$item ->tsdescripcion}}</div>
                    </td>
                    <td class="px-6 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$item ->areaServicio->arsdescripcion }}</div>
                    </td>


                    <td class="px-6 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="edit({{ $item->id }})" class="px-2 py-1  text-blue-500  hover:text-black"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg></button>


                            @if($item->tsestado)
                            <button wire:click="estado({{ $item->id }})" class="px-2 py-1  text-green-500  hover:text-black">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg></button>

                            @else
                            <button wire:click="estado({{ $item->id }})" class="px-2 py-1  text-red-500  hover:text-black">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg></button>
                            @endif
                    </td>
                  </tr>
                  @empty
                    <tr class="text-center">
                        <td colspan="4" class="py-3 italic">No hay información</td>
                    </tr>
                  @endforelse
                  <!-- More items... -->

                </tbody>

              </table>
              <div>
                  {{ $data->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
