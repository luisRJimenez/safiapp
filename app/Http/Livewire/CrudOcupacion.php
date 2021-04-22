<?php

namespace App\Http\Livewire;

use App\Models\ocupacion;
use Livewire\Component;

class CrudOcupacion extends Component
{
    public $ocudescripcion, $ocuestado, $selected_id;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = ocupacion::all();
        return view('livewire.crud-ocupacion');
    }


    private function resetInput()
    {
        $this->ocudescripcion = null;

    }

    protected $rules = [
        'ocudescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();
        ocupacion::create([
            'ocudescripcion' => $this->ocudescripcion,
            'ocuestado'=> 1,
            'ocugrabo' => 'luisrodrigo',
            'ocumodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = ocupacion::findOrFail($id);
         $this->selected_id = $id;
         $this->ocudescripcion = $record->ocudescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = ocupacion::find($this->selected_id);
            $record->update([
                'ocudescripcion' => $this->ocudescripcion,
                'ocuestado'=> 1,
                'ocugrabo' => 'luisrodrigo',
                'ocumodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = ocupacion::findOrFail($id);

            $cambioestado = $record->ocuestado;


            $record->update([
                'ocuestado' => !$cambioestado,
                'ocugrabo' => 'luisrodrigo',
                'ocumodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = ocupacion::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
