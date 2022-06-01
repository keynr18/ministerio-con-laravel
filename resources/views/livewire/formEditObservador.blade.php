
<h3 class="display-6 text-center">Editar observador</h3>
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

               <label class="col-lg-12 text-center"><p class="btn-success text-white pt-1 mt-2">Selecciona rol</p>
                <select class="col-lg-12" wire:model="rol" id="">
                    <option value=""></option>
                    <option value="1">Administrador</option>
                    <option value="2">observador</option>
                </select>
              </label>
              <!-- <form>-->
             <!-- </div>-->
</div>

<div class="text-center">
 <button  wire:click="update()" class="btn btn-success text-white mt-2" >
   Actualizar
 </button>
 <button  wire:click="cancelarEdit()" class="btn btn-danger text-white mt-2" >
    Cancelar
  </button>
</div>