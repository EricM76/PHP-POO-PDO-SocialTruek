<?php

 ?>
 <header>
   <div class="container-fluid">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="index.php">SocialTruek</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNavDropdown">
     <ul class="navbar-nav">
       <li class="nav-item active">
         <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item dropdown">
         <!-- menu de usuarios -->
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Usuarios
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="registro.php">Nuevo</a>
           <a class="dropdown-item" href="registros.php">Registros</a>
           <a class="dropdown-item" href="#">Buscar</a>
         </div>
       </li>
       <li class="nav-item dropdown">
         <!-- menu de productos -->
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Productos
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="productos.php">Todos</a>
           <a class="dropdown-item" href="#">Buscar</a>
         </div>
       </li>
       <li class="nav-item dropdown">
         <!-- menu de categorias -->
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Categorias
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="categoria.php" >Nueva</a>
           <a class="dropdown-item" href="categorias.php">Ver</a>
         </div>
       </li>
     </ul>
   </div>
 </nav>
</div>
</header>
