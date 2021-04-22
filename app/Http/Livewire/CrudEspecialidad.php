<?php

namespace App\Http\Livewire;

use App\Models\areaServicio;
use App\Models\especialidad;
use Livewire\WithPagination;
use Livewire\Component;

class CrudEspecialidad extends Component
{
    use WithPagination;

    public $tsdescripcion, $tsestado, $selected_id, $selectedarservicio;

    public $updateMode = false;

    public $buscar='';

    public especialidad $especialidad;




    public function render()
    {
        $areaser = $this->areaservicios ? $this->areaservicios->id : 0;


        $datas = especialidad::where('tsdescripcion', 'like', '%'.$this->buscar.'%')
                                ->orWhere('area_servicios_id', '=', $areaser)
                                ->paginate(10);

        return view('livewire.crud-especialidad',[
            'areas' => areaServicio::all(),
            'data' => $datas
        ]);
    }

    private function resetInput()
    {
        $this->tsdescripcion = null;
        $this->selectedarservicio = null;

    }

    protected $rules = [
        'tsdescripcion' => 'required',
        'selectedarservicio' => 'required'
    ];

    public function salvar(){
        $this->validate();
        especialidad::create([
            'tsdescripcion' => $this->tsdescripcion,
            'tsestado'=> 1,
            'tsgrabo' => 'luisrodrigo',
            'tsmodif' => 'luisrodrigo',
            'area_servicios_id' => $this->selectedarservicio
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = especialidad::findOrFail($id);
         $this->selected_id = $id;
         $this->tsdescripcion = $record->tsdescripcion;
         $this->selectedarservicio = $record->area_servicios_id;
         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = especialidad::find($this->selected_id);
            $record->update([
                'tsdescripcion' => $this->tsdescripcion,
                'tsestado'=> 1,
                'tsgrabo' => 'luisrodrigo',
                'tsmodif' => 'luisrodrigo',
                'area_servicios_id' => $this->selectedarservicio
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = especialidad::findOrFail($id);

            $cambioestado = $record->tsestado;


            $record->update([
                'tsestado' => !$cambioestado,
                'tsgrabo' => 'luisrodrigo',
                'tsmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = especialidad::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }


    public function getAreaserviciosProperty(){

        $areaserv =  areaServicio::select('id')->where('arsdescripcion', 'like', '%'.$this->buscar.'%')->first();

        if (isset($areaserv)) {return $areaserv;}

    }

    public function updatedBuscar(){
        $this->reset(['selectedarservicio', 'tsdescripcion']);
        $this->resetPage();
    }

}
