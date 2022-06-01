
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 p-2 border-radiu">
            <h2 class="display-5 text-center text-dark">Registro del productor</h2>

              <x-jet-action-message on="saved">
                {{ $mensaje }}
              </x-jet-action-message>

                <p>Datos personales</p>
                <hr>
                <div class="row mb-4">
                  
                    <div class="col">
                      <div class="form">
                        <label class="form-label" for="form3Example1">Nombre</label>
                        <input type="text" wire:model="name" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" :value="old('name')" />
                        <x-jet-input-error for="name"></x-jet-input-error>
                      </div>
                    </div>
                    <div class="col">
                        <div class="form">
                          <label class="form-label" for="form3Example1">Cedula</label>
                          <input type="text"  wire:model="cedula" class="{{ $errors->has('cedula') ? 'is-invalid' : '' }} form-control" :value="old('cedula')"/>
                          <x-jet-input-error for="cedula"></x-jet-input-error>
                        </div>
                    </div>
                  </div>
                  
                  <p>Datos para crear cuenta</p>
                  <hr>

                  <div class="row mb-4">
                    <div class="col">
                      <div class="form">
                        <label class="form-label" for="form3Example1">Telefono</label>
                        <input type="text" wire:model="telefono" class="{{ $errors->has('telefono') ? 'is-invalid' : '' }} form-control" :value="old('telefono')"/>
                        <x-jet-input-error for="telefono"></x-jet-input-error>
                      </div>
                    </div>
                    <div class="col">
                      <div class="for">
                        <label class="form-label" for="form3Example2">Correo Electronico</label>
                        <input type="email" wire:model="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control" :value="old('email')"/>
                        <x-jet-input-error for="email"></x-jet-input-error>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col">
                      <div class="form">
                        <label class="form-label" for="form3Example1">Contraseña</label>
                        <input type="password" wire:model="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control"/>
                        <x-jet-input-error for="password"></x-jet-input-error>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form">
                        <label class="form-label" for="form3Example2">Confirmar</label>
                        <input type="password" wire:model="password_confirmation" class="form-control" />
                      </div>
                    </div>
                  </div>
    
                  <div class='container-fluid'>
                    <div class="row ">
                        <div class="col text-center mt-1">
                          <button  wire:click="create()" class="btn btn-success text-white">Guardar</button>
                          <button type="button" class="btn btn-danger text-white">Atras</button>
                        </div>
                    </div>
                  </div>
           
        </div>
    </div>
<div>