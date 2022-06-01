<x-jet-action-message on="saved">
  {{ $mensaje }}
</x-jet-action-message>

  @if(Auth::user()->rol == '1' || Auth::user()->rol == '2')
    <h4 class="">Productor: {{$name->name}} > Hacienda: {{$nombreH->name}}</h4>
  @endif
  
  <h1 class="display-6 text-center">Tabla producciones</h1>
          <div class="table-responsive mt-3">
            <table class="table">
              <thead class="bg bg-success text-white">
                  <tr>
                    <th>Fecha siembre</th>
                    <th>Fecha cosecha</th>
                    <th>Cantidad siembra</th>
                    <th>cultivo</th>
                    <th class="text-center">Acciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($producciones as $Produccion)
                <tr>
                    <td>{{$Produccion->fechaS}}</td>
                    <td>{{$Produccion->fechaC}}</td>
                    <td>{{$Produccion->cantidadS}}</td>
                    <td>{{$Produccion->cultivo}}</td>
                    <td class="text-center">

                      @if(Auth::user()->rol == '0')
                      <button  wire:click="editarProduccion({{$Produccion->id}})" class="btn btn-success text-white btn-sm">Editar</button>
                      @endif

                      @if(Auth::user()->rol == '1')
                      <button  wire:click="editarProduccion({{$Produccion->id}})" class="btn btn-success text-white btn-sm">Editar</button>
                      <button wire:click="modalProduccion({{$Produccion->id}})" class="btn btn-danger text-white btn-sm">Eliminar</button>
                      @endif
                    </td> 
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
            <div class="row">
                <div class="col text-center">
                  <button wire:click="tablaHacienda()" class="btn btn-danger text-white btn-sm">Atras</button>
                </div>
            </div>