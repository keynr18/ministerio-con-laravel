<x-slot name="header">

</x-slot>
  
  <section class="container-fluid mt-4">
      <div class="row ">

        <section class="col-lg-4">
              @include("livewire.$vista")
        </section>

        <section class="col-lg-8 ">
          <h3 class="display-6 text-center">Evento publicados</h3>
          <div class="row">

            <x-jet-action-message on="saved">
              {{ $mensaje }}
            </x-jet-action-message> 

            <div class="col-lg-12 d-flex flex-wrap">
              @foreach ($eventos as $evento)
                @include('livewire.card')
              @endforeach
            </div>
           
          </div>  
       </section>

      </div>

          <!-- modal para confirmarla accion de eliminar-->
  <x-jet-dialog-modal wire:model="abrir">
    <x-slot name="title">
        
  </x-slot>

    <x-slot name="content">
        {{ $mensaje }}
    </x-slot>

    <x-slot name="footer">
      <button wire:click="eliminar()" class="btn btn-danger btn-sm text-white">Aceptar</button>
    </x-slot>
</x-jet-dialog-modal>
<!-------------------------->

  </section>


  
   
  