<h3 class="display-6 text-center">Crear evento</h3>
 <!-- modal para registrarun evento-->
<div class="row mt-3">
              <!--  <form class="row mt-3">-->
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Titulo del evento</p>
                  <input type="text" wire:model="nombre" class="{{ $errors->has('nombre') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="nombre"></x-jet-input-error>
                </label> 
               
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Dirección del evento</p>
                  <input type="text" wire:model="direccion" class="{{ $errors->has('direccion') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="direccion"></x-jet-input-error>
                </label> 
               
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Fecha de apertura</p>
                  <input type="date" wire:model="apertura" class="{{ $errors->has('apertura') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="apertura"></x-jet-input-error>
                </label>
     
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Fecha de culminación</p>
                  <input type="date" wire:model="clausura" class="{{ $errors->has('clausura') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="clausura"></x-jet-input-error>
                </label>
     
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Hora del evento</p>
                  <input type="time" wire:model="hora" class="{{ $errors->has('hora') ? 'is-invalid' : '' }} form-control" >
                  <x-jet-input-error for="hora"></x-jet-input-error>
                </label>
     
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Imagen para el evento</p>
                  <input type="file"  wire:model="file" class="{{ $errors->has('file') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="file"></x-jet-input-error>
                </label> 
     
                <label class="col-lg-12 text-center"><p class="btn-success text-white pt-1 mt-2">Información extra del evento</p>
                  <textarea type="text"  wire:model="informacion" class="{{ $errors->has('informacion') ? 'is-invalid' : '' }} form-control"></textarea>
                  <x-jet-input-error for="informacion"></x-jet-input-error>
                </label>
               <!-- <form>-->
              <!-- </div>-->
</div>

<div class="text-center">
  <button  wire:click="crear" class="btn btn-success mt-2 text-white" >
    Guardar
  </button>
</div>