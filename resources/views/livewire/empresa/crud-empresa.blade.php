<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empresas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <input type="hidden" wire:model="selectedId">

        <div class="flex justify-between content-center items-center">

            <div >
                @livewire('empresa.adicionar-empresa')
            </div>

            <div class="py-2">
                <x-jet-input type="text" wire:model="buscar" placeholder="Buscar ..."  class="text-sm"></x-jet-input>
            </div>
        </div>

    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200" >
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col-4" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                    </th>
                                    <th scope="col-4" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Razon Social
                                    </th>
                                    <th scope="col-4" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dirección
                                    </th>
                                    <th scope="col-4" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Teléfonos
                                    </th>
                                    <th scope="col-4" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Departamento
                                    </th>
                                    <th scope="col-4" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Municipio
                                    </th>
                                    <th scope="col-2" class="relative px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span >Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-xs">
                            @foreach ($data as $item)
                                <input type="hidden" value={{$item->id}}/>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$loop->index+1}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$item->empnombre}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$item->empdireccion}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$item->emptelefono}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        {{$item->municipio->departamento->dtodescripcion}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        {{$item->municipio->mundescripcion}}
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap  text-sm font-medium ">

                                        <div class="flex content-center items-center">

                                            @livewire('empresa.editar-empresa', ['empresas' => $item], key($item->id))

                                            <button wire:click="estado({{ $item->id }})" class="px-2   text-green-500  hover:text-black">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg></button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                    <div>{{ $data->links() }}</div>
                </div>
            </div>
      </div>

    </div>


</div>
