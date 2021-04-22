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
                @livewire('asignar-papeleria')
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
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data as $item)
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
                                        {{$item->departamento_id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap ">
                                        {{$item->municipio_id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
