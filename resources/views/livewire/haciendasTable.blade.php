
  <x-jet-action-message on="saved">
    {{ $mensaje }}
  </x-jet-action-message>

  @if(Auth::user()->rol == '1' || Auth::user()->rol == '2')
  <h4 class="">Productor: {{$name->name}}</h4>
  @endif

  <h1 class="display-6 text-center">Tabla haciendas</h1>
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
                      
                      
                      @if(Auth::user()->rol == '0')
                      <button  wire:click="editHacienda({{$hacienda->id}})" class="btn btn-success text-white btn-sm">Editar</button>
                      @endif

                      @if(Auth::user()->rol == '1')
                      <button  wire:click="editHacienda({{$hacienda->id}})" class="btn btn-success text-white btn-sm">Editar</button>
                      <button wire:click="modalHacienda({{$hacienda->id}})" class="btn btn-danger text-white btn-sm">Eliminar</button>
                      @endif

                    </td> 
                </tr>
               @endforeach
              </tbody>
            </table>
        </div>
            <div class="row">
                <div class="col text-center">
                  @if(Auth::user()->rol == '1' || Auth::user()->rol == '2')
                    <button wire:click="tablaPro()" class="btn btn-danger text-white btn-sm">Atras</button>   
                    @else
                    <button wire:click="registroHacienda()" class="btn btn-danger text-white btn-sm">Atras</button>
                  @endif
                </div>
            </div>
           
          