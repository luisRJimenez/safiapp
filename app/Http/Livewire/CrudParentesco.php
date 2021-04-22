<?php

namespace App\Http\Livewire;

use App\Models\parentesco;
use Livewire\Component;

class CrudParentesco extends Component
{

    public $pardescripcion, $parestado, $selected_id;

    public $updateMode = false;

   public $data = [];

    public function render()
    {
        $this->data = parentesco::all();
        return view('livewire.crud-parentesco');
    }


    private function resetInput()
    {
        $this->pardescripcion = null;
    }

    protected $rules = [
        'pardescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();
        Parentesco::create([
            'pardescripcion' => $this->pardescripcion,
            'parestado'=> 1,
            'pargrabo' => 'luisrodrigo',
            'parmodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = parentesco::findOrFail($id);
         $this->selected_id = $id;
         $this->pardescripcion = $record->pardescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = parentesco::find($this->selected_id);
            $record->update([
                'pardescripcion' => $this->pardescripcion,
                'parestado'=> 1,
                'pargrabo' => 'luisrodrigo',
                'parmodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = parentesco::findOrFail($id);

            $cambioestado = $record->parestado;


            $record->update([
                'parestado' => !$cambioestado,
                'pargrabo' => 'luisrodrigo',
                'parmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = parentesco::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
