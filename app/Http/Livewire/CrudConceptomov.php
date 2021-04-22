<?php

namespace App\Http\Livewire;

use App\Models\conceptomovimiento;
use Livewire\WithPagination;
use Livewire\Component;
use PhpParser\Node\Stmt\Case_;

class CrudConceptomov extends Component
{


    use WithPagination;

    public $cpmdescripcion, $cpmestado, $selected_id, $selectedtipomov;

    public $updateMode = false;

    public $buscar='';

    public $conceptomov;




    public function render()
    {



        $datas = conceptomovimiento::where('cpmdescripcion', 'like', '%'.$this->buscar.'%')
                                ->orWhere('cpmtipomovimiento', 'like', '%'.$this->tipomovimiento.'%')

                                ->paginate(10);

        return view('livewire.crud-conceptomov',[
            'tipomov' => [1, 2],
            'data' => $datas
        ]);

    }

    private function resetInput()
    {
        $this->cpmdescripcion = null;
        $this->selectedtipomov = null;

    }

    protected $rules = [
        'cpmdescripcion' => 'required',
        'selectedtipomov' => 'required'
    ];

    public function salvar(){
        $this->validate();
        conceptomovimiento::create([
            'cpmdescripcion' => $this->cpmdescripcion,
            'cpmestado'=> 1,
            'cpmgrabo' => 'luisrodrigo',
            'cpmmodif' => 'luisrodrigo',
            'cpmtipomovimiento' => $this->selectedtipomov
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = conceptomovimiento::findOrFail($id);
         $this->selected_id = $id;
         $this->cpmdescripcion = $record->cpmdescripcion;
         $this->selectedtipomov = $record->cpmtipomovimiento;
         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = conceptomovimiento::find($this->selected_id);
            $record->update([
                'cpmdescripcion' => $this->cpmdescripcion,
                'cpmestado'=> 1,
                'cpmgrabo' => 'luisrodrigo',
                'cpmmodif' => 'luisrodrigo',
                'cpmtipomovimiento' => $this->selectedtipomov
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = conceptomovimiento::findOrFail($id);

            $cambioestado = $record->cpmestado;


            $record->update([
                'cpmestado' => !$cambioestado,
                'cpmgrabo' => 'luisrodrigo',
                'cpmmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = conceptomovimiento::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }


    public function getTipomovimientoProperty(){


        return match($this->buscar) {
            'INGRESO', 'ingreso' =>  1,
            'EGRESO', 'egreso' => 2,

            default => 0,
        };

    }

    public function updatedBuscar(){
        $this->updateMode = false;
        $this->resetInput();
        //$this->reset(['selectedtipomov', 'cpmdescripcion']);

        $this->resetPage();

    }

}
