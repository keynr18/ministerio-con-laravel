<div class="container-fluid mt-1">
    <div class="row justify-content-center">
        <div class="col-lg-10 p-2 border-radiu">
            <h2 class="display-5 text-center text-dark">Registrar hacienda</h2>

            <x-jet-action-message on="saved">
              {{ $mensaje }}
            </x-jet-action-message>

          <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="form3Example1">Nombre hacienda</label>
                        <input type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" wire:model="name"/>
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>

                    <div class="col">
                        <label class="form-label" for="form3Example1">telefono</label>
                        <input type="text" class="{{ $errors->has('telefono') ? 'is-invalid' : '' }} form-control" wire:model="telefono"/>
                        <x-jet-input-error for="telefono"></x-jet-input-error>
                    </div>
                  </div>

                  <div class="row mb-4">

                    <div class="col">
                      <label class="form-label" for="form3Example1">hectaria</label>
                      <input type="text" class="{{ $errors->has('hectaria') ? 'is-invalid' : '' }} form-control" wire:model="hectaria"/>
                      <x-jet-input-error for="hectaria"></x-jet-input-error>
                    </div>
                    
                    <div class="col">
                        <label class="form-label" for="form3Example1">Direccion</label>
                        <input type="text" class="{{ $errors->has('direccion') ? 'is-invalid' : '' }} form-control" wire:model="direccion" />
                        <x-jet-input-error for="direccion"></x-jet-input-error>
                      </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">

                        <select class="form-select" wire:model="selecEstado">
                          <option selected>Selecciona Estado</option>
                          @foreach ($estados as $estado)
                            <option  value="{{$estado->id}}">{{$estado->name}}</option>
                          @endforeach
                          <x-jet-input-error for="selecEstado"></x-jet-input-error>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <select class="form-select" wire:model="selecMunicipio">
                          <option selected>Selecciona Municipio</option>
                          @if (!is_null($municipios))
                              @foreach ($municipios as $municipio)
                              <option value="{{$municipio->id}}">{{$municipio->name}}</option>
                              @endforeach
                          @endif
                        </select>
                        <x-jet-input-error for="selecMunicipio"></x-jet-input-error>
                      </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                          <select class="form-select" wire:model="selecParroquia">
                            <option selected>Selecciona Parroquia</option>
                            @if (!is_null($parroquias))
                                @foreach ($parroquias as $parroquia)
                                <option value="{{$parroquia->id}}">{{$parroquia->name}}</option>
                                @endforeach
                            @endif
                          </select>
                          <x-jet-input-error for="selecParroquia"></x-jet-input-error>
                        </div>
                      </div>
                  </div>

                  <div class='container-fluid'>
                    <div class="row ">
                        <div class="col text-center mt-1">
                          <button  wire:click="crear" class="btn btn-success text-white mt-2" >
                            Guardar
                          </button>
                          <button  wire:click="listHaciendas({{Auth::user()->id}})" class="btn btn-success text-white mt-2" >
                            Ver hacienda
                          </button>
                        </div>
                    </div>
                  </div>
            
        </div>
    </div>
<div>