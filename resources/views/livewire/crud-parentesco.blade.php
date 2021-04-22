<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parentesco') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-start ">

        <div class=" py-2 pr-2">
            <input type="hidden" wire:model="selected_id">
            <x-jet-input type="text" placeholder="Parentesco" wire:model.defer="pardescripcion" required class="min-w-full md:min-w-0"></x-jet-input>
            <x-jet-input-error for="pardescripcion"/>
        </div>

        <div class="  py-2 mt-1">

            @if($updateMode)
                <x-jet-button  wire:click='update()'>Actualizar</x-jet-button>
            @else
                <x-jet-button disabled wire:dirty.attr.remove="disabled" wire:target="pardescripcion" wire:click='salvar()'>Grabar</x-jet-button>
            @endif
        </div>
    </div>






    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min divide-y divide-gray-200 "  >
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Parentesco
                    </th>


                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                      <span class="sr-only">Eliminar</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" >
                @forelse ($data as $item)
                  <tr>
                    <td class="px-6 whitespace-nowrap">

                        <div class="text-sm text-gray-900">{{$item ->id}}</div>

                    </td>
                    <td class="px-6 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$item ->pardescripcion}}</div>
                    </td>

                    <td class="px-6 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="edit({{ $item->id }})" class="px-2 py-1  text-blue-500  hover:text-black"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg></button>


                            @if($item->parestado)
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
                        <td colspan="4" class="py-2 italic">No hay información</td>
                    </tr>
                  @endforelse
                  <!-- More items... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>



</div>
