<div>
    <x-jet-danger-button wire:click="$set('open', true)">Asignar</x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">Asignar Papeleria</x-slot>

        <x-slot name="content">
            <div class="flex">

                <div class="w-1/2 py-2" >
                    <x-jet-label value="Asesores"></x-jet-label>
                    <select wire:model='selectedasesor' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">--Seleccionar--</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>

                        @endforeach
                    </select>
                    <x-jet-input-error for="selectedasesor"/>
                </div>

                <div class="w-1/2  py-2 px-2"  >
                    <x-jet-label value="Tipo Papeleria"></x-jet-label>
                    <select wire:model='selectedtipopapeleria' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">--Seleccionar--</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->tpadescripcion}}</option>

                        @endforeach
                    </select>

                    <x-jet-input-error for="selectedtipopapeleria"/>
                </div>
            </div>

            <div class="flex ">
                <div class="w-1/2 py-2" >
                    <x-jet-label value="Numero inicial"></x-jet-label>
                    <x-jet-input type="number" placeholder="Numero inicial" wire:model.defer='papnumeroini' class="w-full"></x-jet-input>
                    <x-jet-input-error for="papnumeroini"/>
                </div>
                <div class="w-1/2 py-2 px-2" >
                    <x-jet-label value="Numero final"></x-jet-label>
                    <x-jet-input type="number" placeholder="Numero final" wire:model.defer='papnumerofin' class="w-full"></x-jet-input>
                    <x-jet-input-error for="papnumerofin"/>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-jet-button wire:click="salvar" wire:loading.remove wire:target="salvar">Asignar</x-jet-button>

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
