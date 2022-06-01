<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\Cultivo;
use App\Models\Hacienda;
use App\Models\Produccion;

class Producciones extends Component
{
    public $vista = 'formProduccion';
    public $selecGrupo = null, $selecCultivo = null;
    public $grupos = null, $cultivos = null;
    public $fechasiembra, $fechacosecha, $cultivo, $hectariaS, $hacienda_id, $id_produccion, $producciones;
    public $mensaje;

    public function render()
    {
        return view('livewire.produccion', [
            'gruposs' => Grupo::all(),
            'haciendass' => Hacienda::select('id','name')->where('user_id',  Auth::user()->id)->get()
        ]);
    }
    
    public function updatedselecGrupo($id_grupo){
        $this->cultivos = Cultivo::where('grupo_id', $id_grupo)->get();
    }

    public function crear(){

        $this->validate([
            'fechasiembra' => 'required',
            'fechacosecha' => 'required',
            'hectariaS' => 'required',
            'selecCultivo' => 'required',
            'hacienda_id' => 'required',
        ]);

        $p = new Produccion();
        $p->fechaS = $this->fechasiembra;
        $p->fechaC = $this->fechacosecha;
        $p->cantidadS = $this->hectariaS;

        // esta linea es para guardar el nombre del cultivo en la base de datos
        $this->cultivo = Cultivo::find($this->selecCultivo);

        $p->cultivo = $this->cultivo->name;
        $p->hacienda_id = $this->hacienda_id;
        $p->save();
        
        $this->limpiarCampos();
        $this->mensaje = 'Produccion registrada';
        $this->emit('saved');
    }

    public function limpiarCampos(){
        $this->fechasiembra = '';
        $this->fechacosecha = '';
        $this->hectariaS = '';
        $this->selecGrupo = '';
        $this->selecCultivo = '';
        $this->hacienda_id = '';
    }

}
