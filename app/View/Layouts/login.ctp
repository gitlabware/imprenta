<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Neon | Login</title>

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

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body login-page login-form-fall" data-url="http://neon.dev">


        <!-- This is needed when you send requests via Ajax -->
        <script type="text/javascript">
            var baseurl = '';
        </script>

        <div class="login-container">

            <div class="login-header login-caret">

                <div class="login-content">

                    <a href="index.html" class="logo">
                        <img src="<?php echo $this->webroot; ?>images/logo@2x.png" width="120" alt="" />
                    </a>

                    <p class="description">Dear user, log in to access the admin area!</p>

                    <!-- progress bar indicator -->
                    <div class="login-progressbar-indicator">
                        <h3>43%</h3>
                        <span>logging in...</span>
                    </div>
                </div>

            </div>

            <div class="login-progressbar">
                <div></div>
            </div>

            <?php echo $this->fetch('content'); ?>

        </div>


        <!-- Bottom scripts (common) -->
        <script src="<?php echo $this->webroot; ?>js/gsap/main-gsap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/joinable.js"></script>
        <script src="<?php echo $this->webroot; ?>js/resizeable.js"></script>
        <script src="<?php echo $this->webroot; ?>js/neon-api.js"></script>
        <script src="<?php echo $this->webroot; ?>js/jquery.validate.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/neon-login.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="<?php echo $this->webroot; ?>js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="<?php echo $this->webroot; ?>js/neon-demo.js"></script>

    </body>
</html>