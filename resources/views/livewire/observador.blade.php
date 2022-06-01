<x-slot name="header">
 
</x-slot>
  
  <section class="container-fluid mt-4">
      <div class="row ">

        <section class="col-lg-4 mb-4">
            @include("livewire.$vista")
        </section>

        <section class="col-sm-12 col-lg-8">
          <h3 class="display-6 text-center">Lista observador</h3>
          <div class="row">
            <div class="col-lg-12 d-flex flex-wrap table-responsive">
                @include('livewire.observadoresTabla')
            </div>
           
          </div>  
       </section>
       
      </div>
  </section>

       <!-- modal para confirmarla accion de eliminar-->
  <x-jet-dialog-modal wire:model="abrir">
    <x-slot name="title">
        
  </x-slot>

    <x-slot name="content">
      Estas seguro de eliminar este observador
    </x-slot>

    <x-slot name="footer">
      <button wire:click="eliminar()" class="btn btn-danger text-white btn-sm">Aceptar</button>
    </x-slot>
</x-jet-dialog-modal>
<!-------------------------->