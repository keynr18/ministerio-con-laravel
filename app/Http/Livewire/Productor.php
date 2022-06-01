<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Haciendas;
use App\Models\User;
use App\Models\Hacienda;
use App\Models\Produccion;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Grupo;
use App\Models\Cultivo;
use PDF;

class Productor extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // propiedades para usar los select para registrar hacienda
    public $selecEstado = null, $selecMunicipio = null, $selecParroquia = null;
    public $municipios = null, $parroquias = null;
    public $estado = '', $municipio = '', $parroquia = '';
    // ========================

    // propiedades para modificar hacienda
    public $nameHaciendaEdit, $telefonoEdit, $hectariaEdit, $direccionEdit, $id_hacienda_edit;
    // ========================

    // propiedades para usar los select de grupo agricola y cultivo y editar produccion
    public $selecGrupo = null, $selecCultivo = null;
    public $grupos = null, $cultivos = null, $cultivo = null;
    public $fechasiembraEdit, $fechacosechaEdit, $hectariaS_edit, $hacienda_id;
    public $id_produccionEdit;
    // ========================

    public $vista = 'vacio'; 
    public $vista2 = 'productoresTable';
    public $vista3 = 'vacio';
    public $vista4 = 'vacio'; 
    public $name, $telefono, $email, $id_pros;
    public $abrir = false;
    public $eliminar, $filtrar;
    public $haciendas = null, $IdPro = null, $producciones = null, $id_produccion = null;
    public $nombreH;
    public $id_pro, $id_hacienda;
    public $mensaje, $datos;
    public $p;

    public function render()
    {
        $productores =  User::select('id','name','cedula','telefono','email','created_at')
            ->where('cedula', 'like', '%'.$this->filtrar.'%')->latest()->paginate(6);

        return view('livewire.productor', [
            'productores' => $productores,
            'estados' => Estado::all(),
            'gruposs' => Grupo::all(),
            'haciendass' => Hacienda::select('id','name')->where('user_id', $this->IdPro)->get()
        ]);
    }

     // metodo para mostrar la tabla de las haciendas de un unico productor 
     public function listHaciendas($id_productor){

        $this->vista2 = 'vacio';
        $this->IdPro = $id_productor;
        $this->name = User::find($this->IdPro); // es para saber que productor elegimos
        $this->haciendas = User::find($this->IdPro)->haciendas;  
        $this->vista3 = 'haciendasTable';
    }

     // metodo para mostrar la tabla de producciones de una 
    //unica hacienda cuya hacienda le pertenesca a un unico productor

    public function ListProducciones($id){

        $this->vista3 = 'vacio';
        $this->id_produccion = $id;
        $this->nombreH = Hacienda::find($id);
        $this->producciones = Produccion::where('hacienda_id', $this->id_produccion)->get();
        $this->vista4 = 'produccionesTable';
    }

    // metodos para los select dinamicos de los municipio y parroquias 
    public function updatedselecEstado($estado_id){
        $this->municipios = Municipio::where('estado_id', $estado_id)->get();

         // esta linea es para guardar el nombre del estado en la base de datos
         $this->estado = Estado::find($estado_id);
    }

    public function updatedselecMunicipio($municipio_id){
        $this->parroquias = Parroquia::where('municipio_id', $municipio_id)->get();

         // esta linea es para guardar el nombre del municipio en la base de datos
         $this->municipio = Municipio::find($municipio_id);
    }

    public function updatedselecParroquia($parroquia_id){
         // esta linea es para guardar el nombre de la parroquia en la base de datos
         $this->parroquia = Parroquia::find($parroquia_id);
    }
    // fin de los select

    // metodo para que el select cultivo tenga los datos segun el grupo agricola
    public function updatedselecGrupo($id_grupo){
        $this->cultivos = Cultivo::where('grupo_id', $id_grupo)->get();
    }

    public function tablaPro(){
        $this->vista3 = 'vacio';
        $this->vista2 = 'productoresTable';
    }

    public function pdf(){
        $productores =  User::select('name','cedula','telefono','email')->get();

        $pdf = PDF::loadView('pdf', compact('productores'));
        //$pdf->loadHTML('<h1>test</h1>');
        return $pdf->stream();
    }
    
    public function tablaHacienda(){
        $this->listHaciendas($this->IdPro);
        $this->vista4 = 'vacio';
    }

    // metodo para editar productor
    public function editar($id){

        $productor = User::find($id);
        $this->id_pro = $productor->id;
        $this->name = $productor->name;
        $this->telefono = $productor->telefono;
        $this->email = $productor->email;
        $this->vista = 'editProductor';
        $this->vista2 = 'vacio';
    }

    public function cancelarEditar(){
        $this->vista = 'vacio';
        $this->vista2 = 'productoresTable';
    }

    // metodo para editar hacienda
    public function editHacienda($hacienda_id){

        $hacienda = Hacienda::find($hacienda_id);

        $this->id_hacienda_edit = $hacienda->id;
        $this->nameHaciendaEdit = $hacienda->name;
        $this->telefonoEdit = $hacienda->telefono;
        $this->hectariaEdit = $hacienda->hectaria;
        $this->direccionEdit = $hacienda->direccion;
        $this->vista3 = 'editHacienda';
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
            'estado' => $this->estado->name,
            'municipio' => $this->municipio->name,
            'parroquia' => $this->parroquia->name,
        ]);
        
        $this->mensaje = 'Hacienda actualizada';
        $this->emit('saved');
    }

    public function cancelarEditHacienda(){
        $this->selecParroquia = '';
        $this->selecMunicipio = '';
        $this->selecEstado = '';
        $this->estado = '';
        $this->municipio = '';
        $this->parroquia = '';
        $this->listHaciendas($this->IdPro);
    }

    public function editarProduccion($id_produccion){

        $this->vista4 = 'vacio';
        $produccion = Produccion::find($id_produccion);

        $this->id_produccionEdit = $produccion->id;
        $this->fechasiembraEdit =  $produccion->fechaS;
        $this->fechacosechaEdit =  $produccion->fechaC;
        $this->hectariaS_edit =  $produccion->cantidadS;
        $this->vista3 = 'editProduccion';
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

        // esta linea es para guardar el nombre del cultivo en la base de datos
        $this->cultivo = Cultivo::find($this->selecCultivo);

        $p->update([
            'fechaS' => $this->fechasiembraEdit,
            'fechaC' => $this->fechacosechaEdit,
            'cantidadS' => $this->hectariaS_edit,
            'cultivo' => $this->cultivo->name,
            'hacienda_id' => $this->hacienda_id
        ]);
        
       // $this->ListProducciones($this->id_produccion);
        $this->mensaje = 'Actualizado';
        $this->emit('saved');
    }

    public function cancelarEditProduccion(){
        $this->selecCultivo = '';
        $this->selecGrupo = '';
        $this->hacienda_id = '';
        $this->ListProducciones($this->id_produccion);
    }

    // metodo para actualizar productor
    public function update(){

        $this->validate([
            'name' => 'required',
            'telefono' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $p = User::find($this->id_pro);

        $p->update([
            'name' => $this->name,
            'telefono' => $this->telefono,
            'email' => $this->email
        ]);
        
        $this->mensaje = 'Actualizado';
        $this->emit('saved');
    }

    // modal de confirmacion para eliminar productor
      public function modalProductor($id){
        $this->abrir = true;
        $this->mensaje = 'Estas seguro de eliminar este productor';
        $this->datos = [
            'name' => 'productor',
            'id' => $id,
        ];
    }

     // modal de confirmacion para eliminar Hacienda
    public function modalHacienda($id){
        $this->abrir = true;
        $this->mensaje = 'Estas seguro de eliminar esta hacienda';
        $this->datos = [
            'name' => 'hacienda',
            'id' => $id,
        ];
    }

    public function modalProduccion($id){
        $this->abrir = true;
        $this->mensaje = 'Estas seguro de eliminar esta produccion';
        $this->datos = [
            'name' => 'produccion',
            'id' => $id,
        ];
    }

    // metodo para eliminar productor, hacienda, producciones 
     public function eliminar(){

        if ($this->datos['name'] == 'productor') {
            User::find($this->datos['id'])->delete();
            $this->abrir = false;
            $this->mensaje = 'Productor eliminado';
            $this->emit('saved'); 
        }

        if ($this->datos['name'] == 'hacienda') {
            Hacienda::find($this->datos['id'])->delete();
            $this->abrir = false;
            $this->mensaje = 'Hacienda eliminada';
            $this->emit('saved'); 
            $this->listHaciendas($this->IdPro);
        }

        if ($this->datos['name'] == 'produccion') {
            Produccion::find($this->datos['id'])->delete();
            $this->abrir = false;
            $this->mensaje = 'produccion eliminada';
            $this->emit('saved'); 
            $this->ListProducciones($this->id_produccion);      
        }
    }
}
