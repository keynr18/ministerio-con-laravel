<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ public_path('css/app.css')}}" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="table-responsive mt-3">
        <table class="table">
          <thead class="bg bg-success text-white">
              <tr>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Correo</th>
              </tr>
          </thead>
          <tbody>
           @foreach ($productores as $productor)
              <tr>
                  <td>{{$productor->name}}</td>
                  <td>{{$productor->cedula}}</td>
                  <td>{{$productor->telefono}}</td>
                  <td>{{$productor->email}}</td>
              </tr>
             @endforeach
          </tbody>
        </table>
      </div>
</body>
</html>