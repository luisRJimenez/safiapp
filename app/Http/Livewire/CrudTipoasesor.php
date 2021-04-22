<?php

namespace App\Http\Livewire;

use App\Models\tipoAsesor;
use Livewire\Component;

class CrudTipoasesor extends Component
{
    public $tasdescripcion, $tasestado, $selected_id;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = tipoAsesor::all();
        return view('livewire.crud-tipoasesor');
    }


    private function resetInput()
    {
        $this->tasdescripcion = null;

    }

    protected $rules = [
        'tasdescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();
        tipoAsesor::create([
            'tasdescripcion' => $this->tasdescripcion,
            'tasestado'=> 1,
            'tasgrabo' => 'luisrodrigo',
            'tasmodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = tipoAsesor::findOrFail($id);
         $this->selected_id = $id;
         $this->tasdescripcion = $record->tasdescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = tipoAsesor::find($this->selected_id);
            $record->update([
                'tasdescripcion' => $this->tasdescripcion,
                'tasestado'=> 1,
                'tasgrabo' => 'luisrodrigo',
                'tasmodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = tipoAsesor::findOrFail($id);

            $cambioestado = $record->tasestado;


            $record->update([
                'tasestado' => !$cambioestado,
                'tasgrabo' => 'luisrodrigo',
                'tasmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = tipoAsesor::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
