<x-jet-action-message on="saved">
   {{ $mensaje }}
</x-jet-action-message>

            <table class="table">
              <thead class="bg bg-success text-white">
                  <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th class="text-center">Acciones</th>
                  </tr>
              </thead>
              <tbody>
               @foreach ($observadores as $observador)
                  <tr>
                      <td>{{$observador->name}}</td>
                      <td>{{$observador->email}}</td>
                      <td class="text-center">
                        <button  wire:click="editar({{$observador->id}})" class="btn btn-success text-white btn-sm">Editar</button>
                        <button wire:click="abrirModal({{$observador->id}})" class="btn btn-danger text-white btn-sm">Eliminar</button>
                      </td>
                      
                  </tr>
                 @endforeach
              </tbody>
            </table>
        
            {{$observadores->links()}}

  
  
          