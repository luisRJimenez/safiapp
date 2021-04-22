<?php

namespace App\Http\Livewire;

use App\Models\grupoAsesor;
use Livewire\Component;

class CrudGrupoasesores extends Component
{
    public $gasdescripcion, $gasestado, $selected_id;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = grupoAsesor::all();
        return view('livewire.crud-grupoasesores');
    }


    private function resetInput()
    {
        $this->gasdescripcion = null;

    }

    protected $rules = [
        'gasdescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();
        grupoAsesor::create([
            'gasdescripcion' => $this->gasdescripcion,
            'gasestado'=> 1,
            'gasgrabo' => 'luisrodrigo',
            'gasmodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = grupoAsesor::findOrFail($id);
         $this->selected_id = $id;
         $this->gasdescripcion = $record->gasdescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = grupoAsesor::find($this->selected_id);
            $record->update([
                'gasdescripcion' => $this->gasdescripcion,
                'gasestado'=> 1,
                'gasgrabo' => 'luisrodrigo',
                'gasmodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = grupoAsesor::findOrFail($id);

            $cambioestado = $record->gasestado;


            $record->update([
                'gasestado' => !$cambioestado,
                'gasgrabo' => 'luisrodrigo',
                'gasmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = grupoAsesor::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
