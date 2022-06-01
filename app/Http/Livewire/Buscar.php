<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Hacienda;
use App\Models\Produccion;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Grupo;
use App\Models\Cultivo;

class Buscar extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

     // propiedades para usar los select para buscar hacienda
     public $selecEstado = null, $selecMunicipio = null, $selecParroquia = null;
     public $municipios = null, $parroquias = null;
     public $estado1 = '', $municipio = '', $parroquia = '', $e, $m, $p;

     public $nombreH, $producciones, $mensaje;
     // ========================

    public $vista = 'haciendaBuscarTable';

    public function render()
    {
        $haciendas = Hacienda::select('id','name','telefono', 'hectaria', 'estado', 'municipio', 'parroquia', 'direccion')
        ->where('estado','like', '%'.$this->e.'%')
        ->where('municipio', 'like', '%'.$this->m.'%')
        ->where('parroquia', 'like', '%'.$this->p.'%')->latest()->paginate(6);

        return view('livewire.buscar',[
            'haciendas' => $haciendas,
            'estados' => Estado::all(),
        ]);
    }

     // metodos para los select dinamicos de los municipio y parroquias 
     public function updatedselecEstado($estado_id){
        $this->municipios = Municipio::where('estado_id', $estado_id)->get();
         $this->estado1 = Estado::find($estado_id);
         $this->e = $this->estado1->name;
    }

    public function updatedselecMunicipio($municipio_id){
        $this->parroquias = Parroquia::where('municipio_id', $municipio_id)->get();
         $this->municipio = Municipio::find($municipio_id);
         $this->m = $this->municipio->name;
    }

    public function updatedselecParroquia($parroquia_id){
        $this->parroquia = Parroquia::find($parroquia_id);
        $this->p = $this->parroquia->name;
    }
    // fin de los select

    public function ListProducciones($id){

        $id_produccion = $id;
        $this->nombreH = Hacienda::find($id);
        $this->producciones = Produccion::where('hacienda_id', $id_produccion)->get();
        $this->vista = 'produccionesBuscarTable';
    }

    public function tablaHacienda(){

        $this->vista = 'haciendaBuscarTable';
    }

}
