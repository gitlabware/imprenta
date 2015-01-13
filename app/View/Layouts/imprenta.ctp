<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Neon | Blank Page</title>

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/neon-core.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/neon-theme.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/neon-forms.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/custom.css">

        <script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js"></script>
        <script>$.noConflict();</script>

        <!--[if lt IE 9]><script src="<?php echo $this->webroot; ?>js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body" data-url="http://neon.dev">

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <div class="sidebar-menu">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="index.html">
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

                    <div class="sidebar-user-info">

                        <div class="sui-normal">
                            <a href="#" class="user-link">
                                <img src="<?php echo $this->webroot; ?>/images/thumb-1.png" alt="" class="img-circle" />

                                <span>Welcome,</span>
                                <strong>Art Ramadani</strong>
                            </a>
                        </div>

                        <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
                            <a href="#">
                                <i class="entypo-pencil"></i>
                                Informacion
                            </a>
                            <a >
                                <?php echo $this->Html->link('<i class="entypo-lock"></i>Log Off', array('Controller' => 'Users', 'action' => 'salir'), array('escape' => false)); ?> 
                            </a>

                            <span class="close-sui-popup">&times;</span><!-- this is mandatory -->				</div>
                    </div>
                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <li>
                            <a href="index.html">
                                <i class="entypo-gauge"></i>
                                <span class="title">Usuarios</span>
                            </a>
                            <ul>
                                <li>
                                    <a>
                                        <?php echo $this->Html->link('Listado de usuarios', array('Controller'=>'Users','action'=>'index'));?>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action'=>'usuario'))?>');">Nuevo Usuario</a>
                                </li>
                                <li>
                            </ul>
                        </li>


                        <li>
                            <a href="mailbox.html">
                                <i class="entypo-mail"></i>
                                <span class="title">Insumos</span>
                                <span class="badge badge-secondary">8</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="mailbox.html">
                                        <i class="entypo-inbox"></i>
                                        <span class="title">Inbox</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox-compose.html">
                                        <i class="entypo-pencil"></i>
                                        <span class="title">Compose Message</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox-message.html">
                                        <i class="entypo-attach"></i>
                                        <span class="title">View Message</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="forms-main.html">
                                <i class="entypo-doc-text"></i>
                                <span class="title">Trabajos</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="forms-main.html">
                                        <span class="title">Basic Elements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-advanced.html">
                                        <span class="title">Advanced Plugins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-wizard.html">
                                        <span class="title">Form Wizard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">
                                        <span class="title">Data Validation</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-masks.html">
                                        <span class="title">Input Masks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-sliders.html">
                                        <span class="title">Sliders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-file-upload.html">
                                        <span class="title">File Upload</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-wysiwyg.html">
                                        <span class="title">Editors</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>

                    </ul>
                    </li>
                    </ul>
                    </li>
                    </ul>

                </div>

            </div>

            <div class="main-content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>

                <!-- lets do some work here... -->
                <!-- Footer -->
                <footer class="main">

                    &copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>

                </footer>
            </div>
            <!-- Modal 6 (Long Modal)-->
            <script>
                function cargarmodal(urll)
                {

                    jQuery("#div_barra_cargando").show();
                    jQuery('#modalimprenta').modal('show', {backdrop: 'static'});
                    jQuery("#divmodalimprenta").show();
                    jQuery("#divmodalimprenta").load(urll, function (responseText, textStatus, req) {
                        if (textStatus == "error")
                        {
                            jQuery("#divmodalimprenta").hide();
                            alert("error!!!");
                        }
                        else {
                            jQuery("#div_barra_cargando").hide(800);
                        }
                    });

                }
            </script>
            <div class="modal fade" id="modalimprenta">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div  id="div_barra_cargando">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div id="divmodalimprenta" style="display: none;">

                        </div>

                    </div>
                </div>
            </div>


        </div>


        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>js/datatables/responsive/css/datatables.responsive.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>js/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>js/select2/select2.css">

        <!-- Bottom scripts (common) -->
        <script src="<?php echo $this->webroot; ?>js/gsap/main-gsap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/joinable.js"></script>
        <script src="<?php echo $this->webroot; ?>js/resizeable.js"></script>
        <script src="<?php echo $this->webroot; ?>js/neon-api.js"></script>
        <script src="<?php echo $this->webroot; ?>js/jquery.dataTables.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/datatables/TableTools.min.js"></script>


        <!-- Imported scripts on this page -->
        <script src="<?php echo $this->webroot; ?>js/dataTables.bootstrap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/datatables/jquery.dataTables.columnFilter.js"></script>
        <script src="<?php echo $this->webroot; ?>js/datatables/lodash.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/datatables/responsive/js/datatables.responsive.js"></script>
        <script src="<?php echo $this->webroot; ?>js/select2/select2.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/neon-chat.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="<?php echo $this->webroot; ?>js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="<?php echo $this->webroot; ?>js/neon-demo.js"></script>

    </body>
</html>