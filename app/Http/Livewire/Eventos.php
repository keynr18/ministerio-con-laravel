<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evento;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Eventos extends Component
{
    use WithFileUploads;
    public $eventos, $evento_id, $evento;
    public $path;
    public $nombre, $slug, $slug2, $direccion, $apertura, $clausura, $hora, $file, $informacion;
    public $vista = 'form';
    public $mensaje, $abrir = false;

    public function render()
    {
        if (Auth::user()->rol == 1) {
            $this->eventos = Evento::orderByDesc('id')->get();
        }
        if (Auth::user()->rol == 2) {
            $this->eventos = Evento::orderByDesc('id')->where('user_id',Auth::user()->id)->get();
        }
        return view('livewire.admin');
    }

    public function crear(){

        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'apertura' => 'required',
            'clausura' => 'required',
            'hora' => 'required',
            'file' => 'required',
            'informacion' => 'required',
        ]);

        $name = $this->nombre; 
        $this->slug2 = Str::slug($name, '-');
        $this->path = $this->file->store('public');

        Evento::create([
            'nombre' => $name,
            'slug' => $this->slug2,
            'direccion' => $this->direccion,
            'apertura' => $this->apertura,
            'clausura' => $this->clausura,
            'hora' => $this->hora,
            'file' => $this->path,
            'informacion' => $this->informacion,
            'user_id' => Auth::user()->id
        ]);
        $this->mensaje = 'Evento registrado';
        $this->emit('saved');
        $this->limpiarCampos();
    }

    public function limpiarCampos(){
        $this->nombre = "";
        $this->direccion = "";
        $this->apertura = "";
        $this->clausura = "";
        $this->hora = "";
        $this->file = "";
        $this->informacion = "";
    }

    public function editar($id){
        $evento = Evento::find($id);

        $this->evento_id = $evento->id;
        $this->nombre = $evento->nombre;
        $this->direccion = $evento->direccion;
        $this->apertura = $evento->apertura;
        $this->clausura = $evento->clausura;
        $this->hora = $evento->hora;
        $this->file = $evento->file;
        $this->informacion = $evento->informacion;
        $this->vista = 'edit';
    }

    public function update(){

        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'apertura' => 'required',
            'clausura' => 'required',
            'hora' => 'required',
            'file' => 'required',
            'informacion' => 'required',
        ]);

        $evento = Evento::find($this->evento_id);

        $name = $this->nombre; 
        $this->slug2 = Str::slug($name, '-');
        $this->path = $this->file->store('public');

        $evento->update([
            'nombre' => $name,
            'slug' => $this->slug2,
            'direccion' => $this->direccion,
            'apertura' => $this->apertura,
            'clausura' => $this->clausura,
            'hora' => $this->hora,
            'file' => $this->path,
            'informacion' => $this->informacion
        ]);
        $this->limpiarCampos();
        $this->vista = 'form';

    }

    public function cancelar(){
        $this->limpiarCampos();
        $this->vista = 'form';
    }

    public function eliminar1($id){
        $this->mensaje = 'Estas seguro de eliminar este evento';
        $this->abrir = true;
        $this->evento_id = $id;
    }

    public function eliminar(){
        Evento::find($this->evento_id)->delete();
        $this->abrir = false;
        $this->mensaje = 'Evento eliminado';
        $this->emit('saved');
    }
}
