<div>
    <x-jet-danger-button wire:click="$set('open', true)">Adicionar</x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">Adicionar Tipo Afiliación</x-slot>

        <x-slot name="content">
            <div class="grid">

                <div class="w-full py-2" >
                    <x-jet-label value="Tipo Contrato"></x-jet-label>
                    <select wire:model='tipocontrato' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">--Seleccionar--</option>
                        @foreach ($tpcontrato as $cto)
                            <option value="{{$cto->id}}">{{$cto->tpcdescripcion}}</option>

                        @endforeach
                    </select>
                    <x-jet-input-error for="tipocontrato"/>
                </div>



                <div class="w-full  py-2"  >
                    <x-jet-label value="Tipo Plan"></x-jet-label>
                    <select wire:model='tipoplan' class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">--Seleccionar--</option>
                        @foreach ($tpplan as $item)
                            <option value="{{$item->id}}">{{$item->tpldescripcion}}</option>

                        @endforeach
                    </select>

                    <x-jet-input-error for="tipoplan"/>
                </div>




                <div class="w-full py-2" >
                    <x-jet-label value="Nombre"></x-jet-label>
                    <x-jet-input type="text" placeholder="Nombre" wire:model.defer='tppdescripcion' class="w-full"></x-jet-input>
                    <x-jet-input-error for="tppdescripcion"/>
                </div>
                <div class="w-full py-2 " >
                    <x-jet-label value="Valor"></x-jet-label>
                    <x-jet-input type="number" placeholder="Valor" wire:model.defer='tppvalor' class="w-full"></x-jet-input>
                    <x-jet-input-error for="tppvalor"/>
                </div>

                <div class="w-full py-2 " >
                    <x-jet-label value="No. Beneficiarios"></x-jet-label>
                    <x-jet-input type="number" placeholder="No. Beneficiarios" wire:model.defer='tppnumafiliados' class="w-full"></x-jet-input>
                    <x-jet-input-error for="tppnumafiliados"/>
                </div>

                <div class="w-full py-2 " >
                    <x-jet-label value="No. Carnés"></x-jet-label>
                    <x-jet-input type="number" placeholder="No. Carnés" wire:model.defer='tppnumcarnes' class="w-full"></x-jet-input>
                    <x-jet-input-error for="tppnumcarnes"/>
                </div>

                <div class="w-full py-2 flex" >
                    <x-jet-checkbox  wire:model.defer='tpppagacomision'/>
                    <x-jet-label value="Paga comision por adelantado" class="ml-2"/>
                    <x-jet-input-error for="tpppagacomision"/>
                </div>


            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelar">Cancelar</x-jet-secondary-button>
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
