<div>


        <button wire:click="$set('open', true)" class="text-gray-800  hover:text-gray-500"><svg class="relative w-6 h-5" fill="currentColor" viewBox="0 0 16 18" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg></button>
        <x-jet-dialog-modal wire:model='open'>
            <x-slot name="title">Actualizar Papeleria</x-slot>

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
                        <x-jet-label value="Estado Papeleria"></x-jet-label>
                        <select wire:model='selectedpapestado' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">--Seleccionar--</option>
                            @foreach ($estados as $estado)
                                <option value="{{$estado}}">{{ $estado }}</option>

                            @endforeach
                        </select>

                        <x-jet-input-error for="selectedpapestado"/>
                    </div>
                </div>



            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
                <x-jet-button wire:click="reasignar" wire:loading.remove wire:target="reasignar">Reasignar</x-jet-button>
                <div wire:loading wire:target="reasignar">

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
