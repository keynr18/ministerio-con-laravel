<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class Observador extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use PasswordValidationRules;
    
    public $vista = 'formObservador';
    public $name, $email, $password, $password_confirmation, $id_obser, $rol;
    public $abrir = false;
    public $observador = '2';
    public $mensaje, $mensaje2;

    public function render()
    {
        $obser = User::select('id','name','email')->where('rol','2')->orderByDesc('id')->paginate(6);
        $datos = array('observadores' => $obser);
        return view('livewire.observador', $datos);
    }

    public function limpiarCampos(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function create(){

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        $userObservador = new User();
        $userObservador->name =  $this->name;
        $userObservador->email =  $this->email;
        $userObservador->rol =  $this->observador;
        $userObservador->password =  Hash::make($this->password);
        $userObservador->save();

        $this->mensaje = 'Observador registrado';
        $this->emit('saved');
        $this->limpiarCampos();
    }

    public function editar($id){

        $observador =  User::find($id);
        $this->id_obser = $observador->id;
        $this->name = $observador->name;
        $this->email = $observador->email;
        $this->vista = 'formEditObservador';
    }

    public function cancelarEdit(){
        $this->vista = 'formObservador';
        $this->limpiarCampos();
    }

    public function update(){

        $this->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $o = User::find($this->id_obser);

        $o->update([
            'name' => $this->name,
            'email' => $this->email,
            'rol' => $this->rol
        ]);
        $this->mensaje = 'Observador actualizado';
        $this->emit('saved');
        $this->limpiarCampos();
    }

    public function abrirModal($id){

        //$this->mensaje2 = 'Estas seguro de eliminar este observador';
        //$this->abrir = true;
        User::find($id)->delete();
        $this->mensaje = 'Observador Eliminado';
        $this->emit('saved');
        //$this->id_obser = $id;
    }

    public function eliminar(){

        User::find($this->id_obser)->delete();
        $this->abrir = false;
        $this->mensaje = 'Observador Eliminado';
        $this->emit('saved');
    }
}
