<h3 class="display-6 text-center">Editar productor</h3>
 <!-- modal para registrarun evento-->
<div class="row mt-3">

<x-jet-action-message on="saved">
    {{ $mensaje }}
</x-jet-action-message>

              <!--  <form class="row mt-3">-->
                <label class="col-lg-4 text-center"><p class="btn-success text-white pt-1 mt-2">Nombre</p>
                  <input type="text" wire:model="name"  name="name" class="form-control" value="{{old('name')}}">
                  @error('name')
                  <small>*{{$message}}</small>
                  @enderror
                </label> 
               
                <label class="col-lg-4 text-center"><p class="btn-success text-white pt-1 mt-2">Telefono</p>
                  <input type="text" wire:model="telefono"   name="telefono" class="form-control" value="{{old('telefono')}}">
                  @error('telefono')
                  <small>*{{$message}}</small>
                  @enderror
                </label> 
               
                <label class="col-lg-4 text-center"><p class="btn-success text-white pt-1 mt-2">Email</p>
                  <input type="email"  name="email" wire:model="email" class="form-control" value="{{old('email')}}">
                  @error('email')
                  <small>*{{$message}}</small>
                  @enderror
                </label>
               <!-- <form>-->
              <!-- </div>-->
</div>

<div class="text-center">
  <button  wire:click="update()" class="btn btn-success text-white mt-2" >
    Actualizar
  </button>
  <button  wire:click="cancelarEditar()" class="btn btn-danger text-white mt-2" >
    Atras
  </button>
</div>