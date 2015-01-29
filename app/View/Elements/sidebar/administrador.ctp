<div class="sidebar-menu-inner">
    <header class="logo-env">
        <!-- logo -->
        <div class="logo">
            <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'index')); ?>">
                <img src="<?php echo $this->webroot; ?>images/logo@2x.png" width="120" alt="" />
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                <i class="entypo-menu"></i>
            </a>
        </div>
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                <i class="entypo-menu"></i>
            </a>
        </div>

    </header>


    <ul id="main-menu" class="main-menu">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        <li>
            <a href="index.html">
                <i class="entypo-user"></i>
                <span class="title">Usuarios</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'index')); ?>">
                        <span class="title">Listado de Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'usuario')); ?>');">
                        <span class="title">Nuevo Usuario</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="index.html">
                <i class="entypo-picture"></i>
                <span class="title">Trabajos</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Trabajos', 'action' => 'index')); ?>">
                        <span class="title">Listado de Trabajos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Trabajos', 'action' => 'trabajo')); ?>" >
                        <span class="title">Nuevo Trabajo</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="index.html">
                <i class="entypo-database"></i>
                <span class="title">Insumos</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Insumos', 'action' => 'index')); ?>">
                        <span class="title">Listado de Insumos</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Insumos', 'action' => 'insumo')); ?>');">
                        <span class="title">Nuevo Insumo</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="index.html">
                <i class="entypo-docs"></i>
                <span class="title">Costos</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Costos', 'action' => 'index')); ?>">
                        <span class="title">Listado de Costos</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Costos', 'action' => 'add')); ?>');">
                        <span class='title'>Nuevo Costo</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="index.html">
                <i class="entypo-newspaper"></i>
                <span class="title">Facturacion</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Facturas', 'action' => 'index')); ?>">
                        <span class="title">Listado de Facturas</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Facturas', 'action' => 'listaparametros')); ?>">
                        <span class="title">Listado de Docificacion</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Facturas', 'action' => 'parametrofactura')); ?>');">
                        <span class='title'>Nueva Docificacion</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="index.html">
                <i class="entypo-newspaper"></i>
                <span class="title">Tipos</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'Tipos', 'action' => 'index')); ?>">
                        <span class="title">Listado de Tipos</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tipos', 'action' => 'add')); ?>');">
                     <span class="title">Nuevo Tipo</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</div>
