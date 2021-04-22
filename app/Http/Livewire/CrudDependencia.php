<?php

namespace App\Http\Livewire;

use App\Models\dependencia;
use Livewire\Component;

class CrudDependencia extends Component
{
    public $depdescripcion, $depestado, $selected_id;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = dependencia::all();
        return view('livewire.crud-dependencia');
    }


    private function resetInput()
    {
        $this->depdescripcion = null;

    }

    protected $rules = [
        'depdescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();

        dependencia::create([
            'depdescripcion' => $this->depdescripcion,
            'depestado'=> 1,
            'depgrabo' => 'luisrodrigo',
            'depmodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = dependencia::findOrFail($id);
         $this->selected_id = $id;
         $this->depdescripcion = $record->depdescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = dependencia::find($this->selected_id);
            $record->update([
                'depdescripcion' => $this->depdescripcion,
                'depestado'=> 1,
                'depgrabo' => 'luisrodrigo',
                'depmodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = dependencia::findOrFail($id);

            $cambioestado = $record->depestado;


            $record->update([
                'depestado' => !$cambioestado,
                'depgrabo' => 'luisrodrigo',
                'depmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = dependencia::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
