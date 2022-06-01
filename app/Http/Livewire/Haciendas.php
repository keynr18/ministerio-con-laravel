<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Hacienda;
use App\Models\Produccion;
use App\Models\User;

use App\Models\Grupo;
use App\Models\Cultivo;

class Haciendas extends Component
{
    public $vista = 'formHacienda';
    public $selecEstado = null, $selecMunicipio = null, $selecParroquia = null;
    public $municipios = null, $parroquias = null;
    public $name = '', $direccion = '', $hectaria = '', $telefono = '', $estado = '', $municipio = '', $parroquia = '';
    public $IdPro;

    // propiedades para editar hacienda desde la vista del productor
    public $id_hacienda_edit, $nameHaciendaEdit, $telefonoEdit, $hectariaEdit, $direccionEdit; 
    //

    public $id_produccion, $producciones;
    public $id_produccionEdit, $fechasiembraEdit, $fechacosechaEdit, $hectariaS_edit;
    public $selecGrupo, $selecCultivo, $hacienda_id, $produccion, $cultivos;
    public $mensaje;

    public function render()
    {  
        return view('livewire.haciendas', [
            'estados' => Estado::all(),
            'gruposs' => Grupo::all(),
            'haciendass' => Hacienda::all()
        ]);
    }

    public function updatedselecEstado($estado_id){
        $this->municipios = Municipio::where('estado_id', $estado_id)->get();

        // esta linea es para guardar el nombre del estado en la base de datos
        $this->estado = Estado::find($estado_id);

        $this->parroquias = null;
    }

    public function updatedselecMunicipio($municipio_id){
        $this->parroquias = Parroquia::where('municipio_id', $municipio_id)->get();

         // esta linea es para guardar el nombre del municipio en la base de datos
         $this->municipio = Municipio::find($municipio_id);
    }


    public function updatedselecGrupo($id_grupo){
        $this->cultivos = Cultivo::where('grupo_id', $id_grupo)->get();
    }

    public function crear(){

        $this->validate([
            'name' => 'required',
            'telefono' => 'required',
            'hectaria' => 'required',
            'direccion' => 'required',
            'selecEstado' => 'required',
            'selecMunicipio' => 'required',
            'selecParroquia' => 'required',
        ]);

        $h = new Hacienda();
        $h->name = $this->name;
        $h->direccion = $this->direccion;
        $h->telefono = $this->telefono;
        $h->hectaria = $this->hectaria;    
        $h->estado = $this->estado->name;
        $h->municipio = $this->municipio->name;

        // esta linea es para guardar el nombre de la parroquia en la base de datos
        $this->parroquia = Parroquia::find($this->selecParroquia);

        $h->parroquia = $this->parroquia->name;
        $h->user_id =  Auth::user()->id;
        $h->save();
        
        $this->limpiarCampos();
        $this->mensaje = 'Hacienda registrada';
        $this->emit('saved');
    }

    public function limpiarCampos(){
        $this->name = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->hectaria = '';
        $this->selecEstado = '';
        $this->selecMunicipio = '';
        $this->selecParroquia = '';
    }

   // metodo para mostrar la tabla de las haciendas de un unico productor 
   public function listHaciendas($id_productor){

        $this->IdPro = $id_productor;
        $this->haciendas = User::find($this->IdPro)->haciendas;
        $this->vista = 'haciendasTable';
    }

    public function registroHacienda(){
        $this->vista = 'formHacienda';   
    }

    // metodo para editar hacienda
    public function editHacienda($hacienda_id){

        $hacienda = Hacienda::find($hacienda_id);
        
        $this->id_hacienda_edit = $hacienda->id;
        $this->nameHaciendaEdit = $hacienda->name;
        $this->telefonoEdit = $hacienda->telefono;
        $this->hectariaEdit = $hacienda->hectaria;
        $this->direccionEdit = $hacienda->direccion;
        $this->vista = 'editHacienda';
    } 

    // metodo para actualizar haciendas a los productores
    public function updateHacienda(){

        $this->validate([
            'nameHaciendaEdit' => 'required',
            'telefonoEdit' => 'required',
            'hectariaEdit' => 'required',
            'direccionEdit' => 'required',
            'selecEstado' => 'required',
            'selecMunicipio' => 'required',
            'selecParroquia' => 'required',
        ]);

        $h = Hacienda::find($this->id_hacienda_edit);

        $h->update([
            'name' => $this->nameHaciendaEdit,
            'direccion' => $this->direccionEdit,
            'telefono' => $this->telefonoEdit,
            'hectaria' => $this->hectariaEdit,
            'parroquia_id' => $this->selecParroquia
        ]);
        
        $this->listHaciendas($this->IdPro);
        $this->emit('saved');
    }

    public function cancelarEditHacienda(){
        $this->listHaciendas($this->IdPro);
    }

    public function ListProducciones($id_produccion){

        $this->id_produccion = $id_produccion;
        $this->producciones = Produccion::where('hacienda_id', $this->id_produccion)->get();
        $this->vista = 'produccionesTable';
    }

    public function tablaHacienda(){
        $this->listHaciendas($this->IdPro);
    }

    public function editarProduccion($id_produccion){

        $this->produccion = Produccion::find($id_produccion);

        $this->id_produccionEdit = $this->produccion->id;
        $this->fechasiembraEdit =  $this->produccion->fechaS;
        $this->fechacosechaEdit =  $this->produccion->fechaC;
        $this->hectariaS_edit =  $this->produccion->cantidadS;
        $this->vista = 'editProduccion';
    }
    
    public function updateProduccion(){
        $this->validate([
            'fechasiembraEdit' => 'required',
            'fechacosechaEdit' => 'required',
            'hectariaS_edit' => 'required',
            'selecGrupo' => 'required',
            'selecCultivo' => 'required',
            'hacienda_id' => 'required',
        ]);

        $p = produccion::find($this->id_produccionEdit);

        $p->update([
            'fechaS' => $this->fechasiembraEdit,
            'fechaC' => $this->fechacosechaEdit,
            'cantidadS' => $this->hectariaS_edit,
            'cultivo_id' => $this->selecCultivo,
            'hacienda_id' => $this->hacienda_id
        ]);
        
        $this->ListProducciones($this->id_produccion);
        $this->emit('saved');
    }

    public function cancelarEditProduccion(){
        $this->ListProducciones($this->id_produccion);
    }

}
