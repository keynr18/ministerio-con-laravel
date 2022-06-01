<div class="container-fluid mt-1">
    <div class="row justify-content-center">
        <div class="col-lg-10 p-2 border-radiu">
            <h2 class="display-5 text-center text-dark">Registrar producción</h2>

            <x-jet-action-message on="saved">
              {{ $mensaje }}
            </x-jet-action-message>

                <div class="row mb-4">
                    <div class="col">
                      <label class="form-label" for="form3Example1">Fecha de siembra</label>
                      <input type="date" class="{{ $errors->has('fechasiembra') ? 'is-invalid' : '' }} form-control" :value="old('fechasiembra')" wire:model="fechasiembra" />
                      <x-jet-input-error for="fechasiembra"></x-jet-input-error>
                    </div>

                    <div class="col">
                        <label class="form-label" for="form3Example1">Fecha de cosecha</label>
                        <input type="date" class="{{ $errors->has('fechacosecha') ? 'is-invalid' : '' }} form-control" :value="old('fechacosecha')" wire:model="fechacosecha"/>
                        <x-jet-input-error for="fechacosecha"></x-jet-input-error>
                    </div>

                    <div class="col">
                        <label class="form-label" for="form3Example1">Hectarias sembradas</label>
                        <input type="text" class="{{ $errors->has('hectariaS') ? 'is-invalid' : '' }} form-control" :value="old('hectariaS')" wire:model="hectariaS"/>
                        <x-jet-input-error for="hectariaS"></x-jet-input-error>
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
                          <button class="btn btn-success text-white" wire:click="crear()">Guardar</button>
                        </div>
                    </div>
                  </div>
           
        </div>
    </div>
<div>