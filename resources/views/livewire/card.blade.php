<div class='card col-lg-4 col-md-4 col-sm-6 mb-3 mt-3'>
         <img class='card-img-top img-responsive' src='{{Storage::url($evento->file)}}' alt='card image cap'>
         <div class='card-block p-3'>
            <h4 class='card-title'>{{$evento->nombre}}</h4>
            <p class='card-text'>Direccion: {{$evento->direccion}}</p>
            <p class='card-text'>Fecha: {{$evento->apertura}}</p>
               <p class='card-text'>Hora: {{$evento->hora}}</p>
            <!--<a class='btn btn-primary'--> 

                  <!--buttom trigger modal-->
            <button type='button' class='btn btn-success text-white' data-mdb-toggle="modal" data-mdb-target="#{{$evento->id}}">ver mas información</button>

            <div class='row mt-3'>
               @if(Auth::user()->rol == '2')

                  @else
                   <div class='col col-lg-6 text-center'>
                     <button type="" wire:click="editar({{$evento->id}})" class="btn btn-success text-white" data-mdb-toggle="modal" data-mdb-target="#modificar">Editar</button>
                  </div>
   
                  <div class='col col-lg-6 text-center'>
                     <button type="" wire:click.prevent="eliminar1({{$evento->id}})" class="btn btn-danger text-white">Eliminar</button>
                  </div>
               @endif
            </div>
         </div>
      </div>

      

   <div class="modal fade" id="{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="#exampleModallabel" aria-hidden="true">
         <div class='modal-dialog' role='document'>
            <div class='modal-content'>
               <div class='modal-header'>
                  <h5 class='modal-title' id='#exampleModalLabel'></h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                  </button>
               </div>
               <div class='modal-body'>
                  <p>{{$evento->informacion}}</p>
               </div>
               <div class='modal-footer'>
                  <button type='button' class='btn btn-success' data-mdb-dismiss="modal">Cerrar</button>
                  <!--<button type='button' class='btn btn-primary'>save changes</button>-->
               </div>
            </div>
         </div>
   </div>

