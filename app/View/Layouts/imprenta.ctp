<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Praver </title>

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

                <?php echo $this->element('sidebar/administrador') ?>

            </div>

            <div class="main-content">



                <div class="row hidden-print">

                    <!-- Profile Info and Notifications -->
                    <div class="col-md-6 col-sm-8 clearfix">

                        <ul class="user-info pull-left pull-none-xsm">

                            <!-- Profile Info -->
                            <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $this->webroot;?>images/user-icon-1106042328.png" alt="" class="img-circle" width="44" />
                                    <?php echo $this->Session->read('Auth.User.nombre');?>
                                </a>
                                <ul class="dropdown-menu">

                                    <!-- Reverse Caret -->
                                    <li class="caret"></li>

                                    <!-- Profile sub-links -->
                                    <li>
                                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Users','action' => 'usuario',$this->Session->read('Auth.User.id')));?>');">
                                            <i class="entypo-user"></i>
                                            Edit Profile
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        </ul>

                    </div>


                    <!-- Raw Links -->
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                        <ul class="list-inline links-list pull-right">
                            <li class="sep"></li>
                            <li>
                                <a href="<?php echo $this->Html->url(array('controller' => 'Users','action' => 'salir'));?>">
                                    Salir <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
                
                <br />

                <!-- lets do some work here... -->
                <!-- Footer -->
                <footer class="main hidden-print">

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
            <!-- Modal  para select -->
            <script>
                function cargarmodal2(urll)
                {
                    jQuery("#div_barra_cargandodos").show();
                    jQuery('#modalimprentados').modal('show', {backdrop: 'static'});
                    jQuery("#divmodalimprentados").show();
                    jQuery("#divmodalimprentados").load(urll, function (responseText, textStatus, req) {
                        if (textStatus == "error")
                        {
                            jQuery("#divmodalimprentados").hide();
                            alert("error!!!");
                        }
                        else {
                            jQuery("#div_barra_cargandodos").hide(800);
                        }
                    });
                }
            </script>
            <div class="modal fade" id="modalimprentados">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div  id="div_barra_cargandodos">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div id="divmodalimprentados" style="display: none;">

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>js/jcrop/jquery.Jcrop.min.css">
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>js/dropzone/dropzone.css">

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

        <?php echo $this->fetch('scriptadd'); ?>
        <!-- JavaScripts initializations and stuff -->
        <script src="<?php echo $this->webroot; ?>js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="<?php echo $this->webroot; ?>js/neon-demo.js"></script>

    </body>
</html>