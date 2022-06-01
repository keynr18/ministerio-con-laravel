
<h3 class="display-6 text-center">Registrar observador</h3>
 <!-- modal para registrarun evento-->
<div class="row mt-3">
              <!--  <form class="row mt-3">-->
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Nombre</p>
                  <input type="text" wire:model="name"  class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="name"></x-jet-input-error>
                </label> 
               
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Email</p>
                  <input type="text" wire:model="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="email"></x-jet-input-error>
                </label> 
               
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Contraseña</p>
                  <input type="password" wire:model="password" name="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control">
                  <x-jet-input-error for="password"></x-jet-input-error>
                </label>
     
                <label class="col-lg-6 text-center"><p class="btn-success text-white pt-1 mt-2">Confirmar contraseña</p>
                  <input type="password" wire:model="password_confirmation" class="form-control">
                </label>
               <!-- <form>-->
              <!-- </div>-->
</div>

<div class="text-center">
  <button  wire:click="create()" class="btn btn-success text-white mt-2" >
    Guardar
  </button>
</div>