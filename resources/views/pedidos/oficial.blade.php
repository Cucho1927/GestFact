<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!--CDN BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/cosmo/bootstrap.min.css" rel="stylesheet">
        
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>


     <!-- Scripts -->
     @vite(['resources/css/reboot.min.css'])
     @vite(['resources/css/vistaModal.css'])
     
</head>

<body>
    <div class="header">
        <header>
            <ul>
                <li class="perfil">
                    <img src="img/user.png" alt="">
                    @if (auth()->check())
                        <h1>Bienvenido, {{ auth()->user()->name }}</h1>
                    @endif
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
                <li class="logo">
                    <a href="{{ route('dashboard') }}">
                        <img src="img/logos.png" alt="LogoPrincipal">
                    </a>
                </li>
            </ul>
        </header>
    </div>

    <div class="vista-datos">
        @can('pedidos.createpedido')
        <div class="row1">
            <div class="partes">
                <div class="cabecera">
                    <h3>Añade un nuevo registro en este apartado</h3>
                </div>
                
                <form class="flex flex-col pt-3 md:pt-8" action="{{ route('pedidos.createpedido') }}" method="GET">
                    @csrf 
                    <div class="title">
                        <button id="boton-add">Agregar</button>
                </div>
                  </form>
                
            </div>
        </div>
        @endcan

         {{-- Mensaje de Exito al agregar un nuevo producto --}}
         @if(session()->has('success'))
            <div class="alert alert-success cake" id="successMessage">
                {{ session('success') }}
            </div>
        @endif

        @if(session('msg'))
            <div class="alert alert-success cake" id="stock">
                {{ session('msg') }}
            </div>
        @endif

        <div class="row2">
            <table class="table table-hover table__inicial">    
                <thead>
                        <tr>
                            <th>Direccion</th>
                            <th>Estado del Pedido</th>
                            <th>Fecha de creacion</th>
                            @can('pedidos.edit')
                            <th>Actualizar</th>
                            @endcan
                            @can('pedidos.destroy')
                            <th>Eliminar</th>
                            @endcan
                        </tr>
                </thead>
                    
                <tbody>
                        
                @foreach ($pedido as $ped)
    <tr>
        <td>{{ $ped->dir_envio }}</td>
        <td>{{ $ped->estado_ped }}</td>
        <td>{{ $ped->date_ped}}</td>
        @can('pedidos.edit')
        <td>
            <a href="{{ route('pedidos.edit', $ped->id) }}">Editar</a>
        </td>
        @endcan
        @can('pedidos.destroy')
        <td>
            <form action="{{ route('pedidos.destroy', $ped->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="button_delete">Eliminar</button>
            </form>
        </td>
        @endcan
        <td>
            <a href="{{ route('pedidos.pdf', $ped->id) }}" class="btn btn-sm btn-danger">
                PDF
            </a>
        </td>
    </tr>
@endforeach
                    </tbody>
                </table>
        </div>
    </div>


    <!-- JavaScript para ocultar el mensaje después de 5 segundos -->
<script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000); // 5000 milisegundos = 5 segundos
</script>

<script>
    setTimeout(function() {
        document.getElementById('stock').style.display = 'none';
    }, 2000); // 5000 milisegundos = 5 segundos
</script>
  
    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <!--Scripts end-->
</body>

</html>