<x-slot name="header">
    
</x-slot>
  
  <section class="container-fluid mt-4">
      <div class="row ">

        <!-- tabla productor-->
        <div class="col-lg-12 ">
            @include("livewire.$vista2")
        </div>

         <!-- vista para editar productor-->
         <section class="col-lg-12 ">
          @include("livewire.$vista")
       </section>
      

         <!-- tabla haciendas -->
        <div class="col-lg-12 ">
          @include("livewire.$vista3")
        </div>

          <!-- tabla prodcciones -->
          <div class="col-lg-12 ">
            @include("livewire.$vista4")
          </div>
      </div>

      
     <!-- modal para confirmarla accion de eliminar-->
  <x-jet-dialog-modal wire:model="abrir">
      <x-slot name="title">
          
    </x-slot>
  
      <x-slot name="content">
          {{ $mensaje }}
      </x-slot>
  
      <x-slot name="footer">
        <button wire:click="eliminar()" class="btn btn-danger text-white btn-sm">Aceptar</button>
      </x-slot>
  </x-jet-dialog-modal>
  <!-------------------------->

  </section>  