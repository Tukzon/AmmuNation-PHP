<?php session_start(); ?>
<header>
        <div class="navMenu rounded-bottom">
            <img class="float-left logo-izq img-fluid" src="assets/img/page/ammu.png">
            <img class="float-right logo-der img-fluid" src="assets/img/page/ammu.png">
            <h1>AMMU✰NATION</h1>
            <nav class="navbar menu">
                <ul class="mr-auto">
                    <li><a class="nav-item" href="index.php">Inicio</a></li>
                    <li><a class="nav-item" href="informacion.php">Información</a></li>
                </ul>
                <ul class="mx-auto">
                    <?php if(!isset($_SESSION['conexion'])){?>
                    <li><a class="nav-item" href="login.php">Iniciar sesión</a></li>
                    <?php }else{ ?>
                    <li><a class="nav-item" href="vendedor.php"><?php echo $_SESSION['conexion'];?></a></li>
                    <li><a class="nav-item" href="cerrar.php">Cerrar sesión</a></li>
                    <?php } ?>
                </ul>
                <ul class="ml-auto">
                    <li><a class="nav-item" href="carrito.php">Carrito</a></li>
                </ul>
            </nav>
        </div>
</header>