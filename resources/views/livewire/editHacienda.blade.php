<div class="container-fluid mt-1">
    <div class="row justify-content-center">
        <div class="col-lg-10 p-2 border-radiu">

          @if (Auth::user()->rol == '1')
          <h4 class="">Productor: {{$name->name}}</h4>
          @endif
          
          <h2 class="display-5 text-center text-dark">Actualizar hacienda</h2>

          <x-jet-action-message on="saved">
            {{ $mensaje }}
          </x-jet-action-message>

          <div class="row mb-4">
            <div class="col">
              <label class="form-label" for="form3Example1">Nombre hacienda</label>
              <input type="text" class="{{ $errors->has('nameHaciendaEdit') ? 'is-invalid' : '' }} form-control"  wire:model="nameHaciendaEdit"/>
              <x-jet-input-error for="nameHaciendaEdit"></x-jet-input-error>
          </div>

          <div class="col">
              <label class="form-label" for="form3Example1">telefono</label>
              <input type="text" class="{{ $errors->has('telefonoEdit') ? 'is-invalid' : '' }} form-control" wire:model="telefonoEdit"/>
              <x-jet-input-error for="telefonoEdit"></x-jet-input-error>
          </div>
        </div>

        <div class="row mb-4">

          <div class="col">
            <label class="form-label" for="form3Example1">hectaria</label>
            <input type="text" class="{{ $errors->has('hectariaEdit') ? 'is-invalid' : '' }} form-control" wire:model="hectariaEdit"/>
            <x-jet-input-error for="hectariaEdit"></x-jet-input-error>
          </div>
          
          <div class="col">
              <label class="form-label" for="form3Example1">Direccion</label>
              <input type="text" class="{{ $errors->has('direccionEdit') ? 'is-invalid' : '' }} form-control"  wire:model="direccionEdit" />
              <x-jet-input-error for="direccionEdit"></x-jet-input-error>
            </div>
        </div>

        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">

              <select class="form-select" wire:model="selecEstado">
                <option selected>Selecciona Estado</option>
                @foreach ($estados as $estado)
                  <option value="{{$estado->id}}">{{$estado->name}}</option>
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
                          <button  wire:click="updateHacienda()" class="btn btn-success text-white mt-2" >
                            Actualizar
                          </button>
                          <button  wire:click="cancelarEditHacienda()" class="btn btn-danger text-white mt-2" >
                            Atras
                          </button>
                        </div>
                    </div>
                  </div>
            
        </div>
    </div>
<div>