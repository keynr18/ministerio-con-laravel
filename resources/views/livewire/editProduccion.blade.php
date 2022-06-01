<div class="container-fluid mt-1">
    <div class="row justify-content-center">
        <div class="col-lg-10 p-2 border-radiu">

          @if (Auth::user()->rol == '1' || Auth::user()->rol == '2')
            <h4 class="">Productor: {{$name->name}} > Hacienda: {{$nombreH->name}}</h4>
          @endif

            <h2 class="display-5 text-center text-dark">Editar producción</h2>

            <x-jet-action-message on="saved">
              {{ $mensaje }}
            </x-jet-action-message>
            
                <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="form3Example1">Fecha de siembra</label>
                      <input type="date" class="{{ $errors->has('fechasiembraEdit') ? 'is-invalid' : '' }} form-control" wire:model="fechasiembraEdit" />
                      <x-jet-input-error for="fechasiembraEdit"></x-jet-input-error>
                    </div>

                    <div class="col">
                        <label class="form-label" for="form3Example1">Fecha de cosecha</label>
                        <input type="date" class="{{ $errors->has('fechacosechaEdit') ? 'is-invalid' : '' }} form-control" wire:model="fechacosechaEdit"/>
                        <x-jet-input-error for="fechacosechaEdit"></x-jet-input-error>
                    </div>

                    <div class="col">
                        <label class="form-label" for="form3Example1">Hectarias sembradas</label>
                        <input type="text" class="{{ $errors->has('hectariaS_edit') ? 'is-invalid' : '' }}  form-control" wire:model="hectariaS_edit"/>
                        <x-jet-input-error for="hectariaS_edit"></x-jet-input-error>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <select class="form-select" wire:model="selecGrupo" aria-label="Default select example">
                          <option selected>Grupo agricola</option>
                          @foreach ($gruposs as $grupo)
                              <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                          @endforeach
                        </select>
                        <x-jet-input-error for="selecGrupo"></x-jet-input-error>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <select class="form-select" wire:model="selecCultivo" aria-label="Default select example">
                          <option selected>Cultivo</option>
                          @if (!is_null($cultivos))
                              @foreach ($cultivos as $cultivo)
                              <option value="{{$cultivo->id}}">{{$cultivo->name}}</option>
                              @endforeach
                          @endif
                        </select>
                        <x-jet-input-error for="selecCultivo"></x-jet-input-error>
                      </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                          <select class="form-select" wire:model="hacienda_id" aria-label="Default select example">
                            <option selected>Selecciona hacienda</option>
                            @foreach ($haciendass as $hacienda)
                              <option value="{{$hacienda->id}}">{{$hacienda->name}}</option>
                            @endforeach
                          </select>
                          <x-jet-input-error for="hacienda_id"></x-jet-input-error>
                        </div>
                      </div>
                  </div>

                  <div class='container-fluid'>
                    <div class="row ">
                        <div class="col text-center mt-1">
                          <button class="btn btn-success text-white" wire:click="updateProduccion()">Actualizar</button>
                          <button wire:click="cancelarEditProduccion()" class="btn btn-danger text-white">Atras</button>
                        </div>
                    </div>
                  </div>
           
        </div>
    </div>
<div>