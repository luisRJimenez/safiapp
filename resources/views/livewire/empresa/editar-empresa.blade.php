<div>
    <button  wire:click="$set('open', true)" class="px-2 py-1  text-blue-500  hover:text-black">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg></button>



    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">Actualizar  {{$empresas->empnombre}}</x-slot>

        <x-slot name="content">
            <div class="grid">

                <div  class="w-full py-2" >
                    <x-jet-label value="Departamento"></x-jet-label>
                    <select wire:model='selecteddto' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">


                        @foreach ($departamento as $dto)
                            <option
                                {{-- @if ($dto->id == $empresas->departamento_id)
                                selected value="{{$empresas->departamento_id}}"
                                @endif --}}
                                value="{{$dto->id}}" {{$empresas->departamento_id == $dto->id ? 'selected' : ''}}>{{$dto->dtodescripcion }}
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for='empresas.selecteddto'/>
                </div>


                @if (!is_null($municipio))

                <div class="w-full  py-2"  >
                    <x-jet-label value="Municipio"></x-jet-label>
                    <select wire:model='selectedmunicipio' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                        @foreach ($municipio as $item)
                            <option value="{{$item->id}}">{{$item->mundescripcion}}</option>

                        @endforeach
                    </select>

                    <x-jet-input-error for="selectedmunicipio"/>
                </div>
                @endif




                <div class="w-full py-2" >
                    <x-jet-label value="Razón Social"></x-jet-label>
                    <x-jet-input type="text"  class="w-full" wire:model.defer='empresas.empnombre'></x-jet-input>
                    <x-jet-input-error for="empresas.empnombre"/>
                </div>

                <div class="w-full py-2 " >
                    <x-jet-label value="Dirección"></x-jet-label>
                    <x-jet-input type="text"  wire:model.defer='empresas.empdireccion' class="w-full"></x-jet-input>
                    <x-jet-input-error for="empresas.empdireccion"/>
                </div>

                <div class="w-full py-2 " >
                    <x-jet-label value="Teléfonos"></x-jet-label>
                    <x-jet-input type="text"  wire:model.defer='empresas.emptelefono' class="w-full"></x-jet-input>
                    <x-jet-input-error for="empresas.emptelefono"/>
                </div>


            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-button wire:click="salvar" wire:loading.remove wire:target="salvar">Actualizar</x-jet-button>

            <div wire:loading wire:target="salvar">

                <x-jet-button>
                    <svg class="animate-spin -ml-2 mr-2 h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    Processing
                </x-jet-button>
            </div>


        </x-slot>
    </x-jet-dialog-modal>

</div>
