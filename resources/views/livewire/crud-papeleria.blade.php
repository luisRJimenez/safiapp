<div >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Papeleria') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <input type="hidden" wire:model="selectedId">

        <div class="flex justify-start">

            <div class="w-1/5 py-2">

                <x-jet-input type="number" placeholder="Buscar por número..." wire:model='papnumero' wire:click='borrarbusquedas()' wire:keydown.tab="borrarbusquedas()" class="text-sm"></x-jet-input>

            </div>

            <div class="w-1/5 py-2 px-1">
                <select wire:model='selectedasesor' wire:click="$set('papnumero', null)" class="w-full text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Asesor</option>
                    @foreach ($users as $user)
                        <option wire:key='{{$loop->index}}' value="{{$user->id}}">{{$user->name}}</option>

                    @endforeach
                </select>

            </div>

            <div class="w-1/5 py-2 px-1">

                <select wire:model='selectedtipopapeleria' class="w-full text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Tipo papeleria</option>
                    @foreach ($tipos as $tipo)
                        <option wire:key='{{$loop->index}}' value="{{$tipo->id}}">{{$tipo->tpadescripcion}}</option>

                    @endforeach
                </select>


            </div>

            <div class="w-1/5 py-2 px-1">

                <select wire:model='selectedpapestado' class="w-full text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Estado</option>

                        <option value="anulado">Anulado</option>
                        <option value="asignado">Asignado</option>
                        <option value="reportado">Reportado</option>


                </select>


            </div>


            <div class="w-1/5 py-2 px-1 ">

                <x-jet-input type="date"  wire:model="fechaIni" class="w-40 text-sm" ></x-jet-input>

            </div>
            <div class="w-1/5 py-2  ">

                <x-jet-input type="date" wire:model="fechaFin" class="w-40 text-sm" ></x-jet-input>

            </div>

            <div class=" py-3 px-1">

                    <button  wire:click='borrarbusquedas()'><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7"></path></svg></button>


            </div>

            <div class="py-3 px2 ">
                @livewire('asignar-papeleria')

            </div>
        </div>

    </div>


    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class=" min-w-max w-full table-auto  divide-y divide-gray-200" >
                <thead class=" bg-gray-50">

                  <tr >
                      <div>

                          @if ($datos->hasPages() || $datos->count() > 0)

                          <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <x-jet-checkbox wire:model="selectedAll"  />
                            </th>

                          @endif
                      </div>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      ID
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Numero
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Asesor
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha de entrega
                    </th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>


                    <th  class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="w-8">

                            @if ($selectedId == true || $selectedAll == true)


                                @livewire('actualizar-papeleria')
                            @endif
                        </div>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">



                    @forelse ($datos as $item)
                    <tr>
                        <td class="px-6 py-1 whitespace-nowrap">

                            <x-jet-checkbox  wire:model="selectedId" value="{{$item->id}}"/>


                        </td>

                        <td class="px-6 py-1 whitespace-nowrap">

                            <div class="text-sm text-gray-900">{{$item ->id}}</div>

                        </td>
                        <td class="px-6 py-1 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $item->tipoPapeleria->tpadescripcion}}</div>
                        </td>
                        <td class="px-6 py-1 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->papnumero}}</div>
                        </td>
                        <td class="px-6 py-1 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->user->name}}</div>
                        </td>
                        <td class="px-6 py-1 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->date_for_humans}}</div>
                        </td>
                        <td class="px-6 py-1 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->papestado}}</div>
                        </td>


                        <!--Botones Editar - Eliminar -->
                        <td class="px-6 py-1 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{ $item->id }})" class=" sr-only px-2 py-1  text-blue-500  hover:text-black"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg></button>

                            <div>

                                @if($item->depestado)
                                    <button wire:click="estado({{ $item->id }})" class=" sr-only px-2 py-1  text-green-500  hover:text-black">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg></button>

                                @else
                                    <button wire:click="estado({{ $item->id }})" class=" sr-only px-2 py-1  text-red-500  hover:text-black">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg></button>
                                @endif
                            </div>
                        </td>
                    </tr>

                      @empty
                        <tr class="text-center">
                            <td colspan="8" class="py-3 italic text-gray-500 ">
                                <div class="flex justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg></span>
                                    <span> No hay registros </span>
                                </div>
                            </td>

                        </tr>

                      @endforelse

                  <!-- More items... -->

                </tbody>

              </table>
              <div>{{ $datos -> links()}}</div>
            </div>
          </div>
        </div>
    </div>

</div>

