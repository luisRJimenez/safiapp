<div>
    <x-jet-danger-button wire:click="$set('open', true)">Adicionar</x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">Adicionar Empresa</x-slot>

        <x-slot name="content">
            <div class="grid">

                <div class="w-full py-2" >
                    <x-jet-label value="Departamento"></x-jet-label>
                    <select wire:model='selecteddto' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">--Seleccionar--</option>
                        @foreach ($departamento as $dto)
                            <option value="{{$dto->id}}">{{$dto->dtodescripcion}}</option>

                        @endforeach
                    </select>
                    <x-jet-input-error for="selecteddto"/>
                </div>

                @if (!is_null($municipio))

                <div class="w-full  py-2"  >
                    <x-jet-label value="Municipio"></x-jet-label>
                    <select wire:model='selectedmunicipio' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">--Seleccionar--</option>
                        @foreach ($municipio as $item)
                            <option value="{{$item->id}}">{{$item->mundescripcion}}</option>

                        @endforeach
                    </select>

                    <x-jet-input-error for="selectedmunicipio"/>
                </div>
                @endif



                <div class="w-full py-2" >
                    <x-jet-label value="Razón Social"></x-jet-label>
                    <x-jet-input type="text" placeholder="Razon social" wire:model.defer='empnombre' class="w-full"></x-jet-input>
                    <x-jet-input-error for="empnombre"/>
                </div>
                <div class="w-full py-2 " >
                    <x-jet-label value="Dirección"></x-jet-label>
                    <x-jet-input type="text" placeholder="Dirección" wire:model.defer='empdireccion' class="w-full"></x-jet-input>
                    <x-jet-input-error for="empdireccion"/>
                </div>

                <div class="w-full py-2 " >
                    <x-jet-label value="Teléfonos"></x-jet-label>
                    <x-jet-input type="text" placeholder="Teléfonos" wire:model.defer='emptelefono' class="w-full"></x-jet-input>
                    <x-jet-input-error for="emptelefono"/>
                </div>


            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-button wire:click="salvar" wire:loading.remove wire:target="salvar">Grabar</x-jet-button>

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
