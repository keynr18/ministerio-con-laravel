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

  <div class="table-responsive mt-3"> 
  <table class="table">
              <thead class="bg bg-success text-white">
                  <tr>
                    <th>Nombre hacienda</th>
                    <th>Telefono</th>
                    <th>Hectaria</th>
                    <th>Region</th>
                    <th>Direccion</th>
                    <th class="text-center">Acciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($haciendas as $hacienda)
                <tr>
                    <td>{{$hacienda->name}}</td>
                    <td>{{$hacienda->telefono}}</td>
                    <td>{{$hacienda->hectaria}}</td>
                    <td>Estado: {{$hacienda->estado}} <br/> Municipio: {{$hacienda->municipio}} <br/> Parroquia: {{$hacienda->parroquia}}</td>
                    <td>{{$hacienda->direccion}}</td>
                    <td class="text-center">

                      @if(Auth::user()->rol == '2' || Auth::user()->rol == '1' || Auth::user()->rol == '0')
                      <button  wire:click="ListProducciones({{$hacienda->id}})" class="btn btn-success text-white btn-sm">producciones</button>
                      @endif
                    </td> 
                </tr>
               @endforeach
              </tbody>
            </table>
  </div>
            {{$haciendas->links()}}          