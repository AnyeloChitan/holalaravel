<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    
    @vite(['resources/css/app.css']) 
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos-tablas.css')}}">   
    <link rel="stylesheet" href="{{asset('css/estilos-formularios.css')}}">
    
    
</head>

<body>
  <!-- slidebar   -->
   <aside class="slidebar" id="slidebar">
   
    <a href="" class="logo">
        <img src="{{asset('img/cangrejo.png')}}" alt="Logo" class="logo-img">
        <p class="logo-text">Tienda</p>
      </a>
    
    <!-- PERFIL -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="{{asset('img/face3.png')}}" alt="avatar"></span>
         <p>user</p>
        </div>
        <div class="element-slidebar-content">
            <a href="">Perfil</a>
            
            <form method="POST" action="">
                @csrf
               <input type="submit" value="Salir" class="logout-link">

             </form>

        </div>

       
    </div>
    <!-- Dashboard -->
         
        <div class="element-slidebar-btn">
         <span><img  src="{{asset('img/compras.png')}}" alt="Dashboard"></span>
         <a href="">Dashboard</a>
        </div>

     <!-- Categorias -->
         
        <div class="element-slidebar-btn">
         <span><img  src="{{asset('img/category.png')}}" alt="Product"></span>
         <a href="{{route('categoria.index')}}">Categorias</a>
        </div>


        <!-- productos -->
         
        <div class="element-slidebar-btn">
         <span><img  src="{{asset('img/rokrt.png')}}" alt="Product"></span>
         <a href="">Prodcutos</a>
        </div>
       
  
    
           
    
   </aside>

   <!-- main -->
   <main class="main">
    <!-- header -->
    <header class="header">
        <div class="titulo-nav">@yield('titulomain')</div>  

        <button id="menu-toggle" class="menu-hamburger">☰</button>
    </header>
    {{-- aqui se coloca todos los elmentos cambiantes --}}
      
      @yield('contenido')

   </main>
   
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>