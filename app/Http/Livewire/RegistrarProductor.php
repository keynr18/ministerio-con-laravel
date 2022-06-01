<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class RegistrarProductor extends Component
{
    use WithPagination;
    use PasswordValidationRules;
    public $vista = 'formObservador';
    public $name, $cedula, $email, $telefono, $password, $password_confirmation;
    public $p = '0';
    public $mensaje = 'Registro Exitoso';

    public function render()
    {
        return view('livewire.registrar-productor');
    }

    public function create(){

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:10'],
            'telefono' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        $userP = new User();
        $userP->name =  $this->name;
        $userP->cedula =  $this->cedula;
        $userP->telefono =  $this->telefono;
        $userP->email =  $this->email;
        $userP->rol =  $this->p;
        $userP->password =  Hash::make($this->password);
        $userP->save();

        $this->mensaje = 'Observador registrado';
        $this->emit('saved');
        return redirect()->route('login');
    }


}
