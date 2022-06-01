<x-jet-action-message on="saved">
    {{ $mensaje }}
  </x-jet-action-message>
  
    @if(Auth::user()->rol == '1' || Auth::user()->rol == '2')
      <h4 class="">Productor: > Hacienda:</h4>
    @endif
    
          <div class="table-responsive mt-3">
              <table class="table">
                <thead class="bg bg-success text-white">
                    <tr>
                      <th>Fecha siembre</th>
                      <th>Fecha cosecha</th>
                      <th>Cantidad siembra</th>
                      <th>cultivo</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($producciones as $Produccion)
                  <tr>
                      <td>{{$Produccion->fechaS}}</td>
                      <td>{{$Produccion->fechaC}}</td>
                      <td>{{$Produccion->cantidadS}}</td>
                      <td>{{$Produccion->cultivo}}</td>
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