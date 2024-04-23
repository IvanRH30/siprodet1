<?php $idRolUsr = session()->get('_id_rol_usuario'); ?>
<nav class="navbar navbar-expand-md navbar-dark bg-light sub-navbar navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#subNavBarDropdown" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand sub-navbar" href="#">PROFEDET</a>
        <div class="collapse navbar-collapse" id="subNavBarDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . '' ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . 'Prueba/VerUsuarios' ?>">Ver usuarios</a>
                </li>
                <?php if ($idRolUsr >= 4) { ?>
                    <li class="nav-item">
                        <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_5' ?>">Modulo 5</a>
                    </li>
                <?php } ?>
                <?php if ($idRolUsr >= 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_4' ?>">Modulo 4</a>
                    </li>
                <?php } 
                if ($idRolUsr >= 2) { ?>
                    <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_3' ?>">Modulo 3</a>
                </li>
                <?php }  
                if ($idRolUsr == 5) { ?>
                    <li class="nav-item">
                        <a class="nav-link subnav-link" href="<?= base_url() . 'Modulos/Modulo_2' ?>">Modulo 2</a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link subnav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario (Modulo 1)
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url() ?>Usuario/VerMiPerfil">Ver Perfil</a>
                        <a class="dropdown-item" href="<?= base_url() ?>Usuario/EditarMiPerfil">Actualizar Perfil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link subnav-link" href="<?= base_url() ?>Salir">Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>