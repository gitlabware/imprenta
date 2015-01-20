<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Praver</title>

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

            <div class="login-form">

                <div class="login-content">
                    <div class="form-login-error">
                        <h3>Login Invalido</h3>
                        <p>Usuario o password incorrectos intente de nuevo</p>
                    </div>
                    <?php echo $this->fetch('content'); ?>
                </div>

            </div>

        </div>


        <!-- Bottom scripts (common) -->
        <script src="<?php echo $this->webroot; ?>js/gsap/main-gsap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/bootstrap.js"></script>
        <script src="<?php echo $this->webroot; ?>js/joinable.js"></script>
        <script src="<?php echo $this->webroot; ?>js/resizeable.js"></script>
        <script src="<?php echo $this->webroot; ?>js/neon-api.js"></script>
        <script src="<?php echo $this->webroot; ?>js/jquery.validate.min.js"></script>


        <script>
            /**
             *	Neon Login Script
             *
             *	Developed by Arlind Nushi - www.laborator.co
             */

            var neonLogin = neonLogin || {};

            ;
            (function ($, window, undefined)
            {
                "use strict";

                jQuery(document).ready(function ()
                {
                    neonLogin.$container = jQuery("#form_login");


                    // Login Form & Validation
                    neonLogin.$container.validate({
                        rules: {
                            username: {
                                required: true
                            },
                            password: {
                                required: true
                            },
                        },
                        highlight: function (element) {
                            $(element).closest('.input-group').addClass('validate-has-error');
                        },
                        unhighlight: function (element)
                        {
                            $(element).closest('.input-group').removeClass('validate-has-error');
                        },
                        submitHandler: function (ev)
                        {
                            /* 
                             Updated on v1.1.4
                             Login form now processes the login data, here is the file: data/sample-login-form.php
                             */

                            jQuery(".login-page").addClass('logging-in'); // This will hide the login form and init the progress bar


                            // Hide Errors
                            jQuery(".form-login-error").slideUp('fast');

                            // We will wait till the transition ends				
                            setTimeout(function ()
                            {

                                // The form data are subbmitted, we can forward the progress to 70%
                                neonLogin.setPercentage(100);

                                // Send data to the server
                                var postData = $('#form_login').serializeArray();
                                var formURL = '<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'login2')); ?>';
                                jQuery.ajax(
                                        {
                                            url: formURL,
                                            type: "POST",
                                            data: postData,
                                            /*beforeSend:function (XMLHttpRequest) {
                                             alert("antes de enviar");
                                             },
                                             complete:function (XMLHttpRequest, textStatus) {
                                             alert('despues de enviar');
                                             },*/
                                            success: function (data, textStatus, jqXHR)
                                            {
                                                if (jQuery.parseJSON(data).error != '') {
                                                    $(".login-page").removeClass('logging-in');
                                                    neonLogin.resetProgressBar(true);
                                                } else {
                                                    //alert('todo bien');
                                                    setTimeout(function ()
                                                    {
                                                        var redirect_url = '';
                                                        if(jQuery.parseJSON(data).role == 'Administrador'){
                                                            redirect_url = '<?php echo $this->Html->url(array('controller' => 'Users','action' => 'index'));?>';
                                                        }
                                                        window.location.href = redirect_url;
                                                    }, 800);
                                                }
                                            },
                                            error: function (jqXHR, textStatus, errorThrown)
                                            {
                                                //if fails   
                                                alert("error");
                                            }
                                        });




                            }, 650);
                        }
                    });




                    // Lockscreen & Validation
                    var is_lockscreen = jQuery(".login-page").hasClass('is-lockscreen');

                    if (is_lockscreen)
                    {
                        neonLogin.$container = $("#form_lockscreen");
                        neonLogin.$ls_thumb = neonLogin.$container.find('.lockscreen-thumb');

                        neonLogin.$container.validate({
                            rules: {
                                password: {
                                    required: true
                                },
                            },
                            highlight: function (element) {
                                $(element).closest('.input-group').addClass('validate-has-error');
                            },
                            unhighlight: function (element)
                            {
                                $(element).closest('.input-group').removeClass('validate-has-error');
                            },
                            submitHandler: function (ev)
                            {
                                /* 
                                 Demo Purpose Only 
                                 
                                 Here you can handle the page login, currently it does not process anything, just fills the loader.
                                 */

                                $(".login-page").addClass('logging-in-lockscreen'); // This will hide the login form and init the progress bar

                                // We will wait till the transition ends				
                                setTimeout(function ()
                                {
                                    var random_pct = 25 + Math.round(Math.random() * 30);

                                    neonLogin.setPercentage(random_pct, function ()
                                    {
                                        // Just an example, this is phase 1
                                        // Do some stuff...

                                        // After 0.77s second we will execute the next phase
                                        setTimeout(function ()
                                        {
                                            neonLogin.setPercentage(100, function ()
                                            {
                                                // Just an example, this is phase 2
                                                // Do some other stuff...

                                                // Redirect to the page
                                                setTimeout("window.location.href = '../../'", 600);
                                            }, 2);

                                        }, 820);
                                    });

                                }, 650);
                            }
                        });
                    }






                    // Login Form Setup
                    neonLogin.$body = $(".login-page");
                    neonLogin.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
                    neonLogin.$login_progressbar = neonLogin.$body.find(".login-progressbar div");

                    neonLogin.$login_progressbar_indicator.html('0%');

                    if (neonLogin.$body.hasClass('login-form-fall'))
                    {
                        var focus_set = false;

                        setTimeout(function () {
                            neonLogin.$body.addClass('login-form-fall-init')

                            setTimeout(function ()
                            {
                                if (!focus_set)
                                {
                                    neonLogin.$container.find('input:first').focus();
                                    focus_set = true;
                                }

                            }, 550);

                        }, 0);
                    }
                    else
                    {
                        neonLogin.$container.find('input:first').focus();
                    }

                    // Focus Class
                    neonLogin.$container.find('.form-control').each(function (i, el)
                    {
                        var $this = $(el),
                                $group = $this.closest('.input-group');

                        $this.prev('.input-group-addon').click(function ()
                        {
                            $this.focus();
                        });

                        $this.on({
                            focus: function ()
                            {
                                $group.addClass('focused');
                            },
                            blur: function ()
                            {
                                $group.removeClass('focused');
                            }
                        });
                    });

                    // Functions
                    $.extend(neonLogin, {
                        setPercentage: function (pct, callback)
                        {
                            pct = parseInt(pct / 100 * 100, 10) + '%';

                            // Lockscreen
                            if (is_lockscreen)
                            {
                                neonLogin.$lockscreen_progress_indicator.html(pct);

                                var o = {
                                    pct: currentProgress
                                };

                                TweenMax.to(o, .7, {
                                    pct: parseInt(pct, 10),
                                    roundProps: ["pct"],
                                    ease: Sine.easeOut,
                                    onUpdate: function ()
                                    {
                                        neonLogin.$lockscreen_progress_indicator.html(o.pct + '%');
                                        drawProgress(parseInt(o.pct, 10) / 100);
                                    },
                                    onComplete: callback
                                });
                                return;
                            }

                            // Normal Login
                            neonLogin.$login_progressbar_indicator.html(pct);
                            neonLogin.$login_progressbar.width(pct);

                            var o = {
                                pct: parseInt(neonLogin.$login_progressbar.width() / neonLogin.$login_progressbar.parent().width() * 100, 10)
                            };

                            TweenMax.to(o, .7, {
                                pct: parseInt(pct, 10),
                                roundProps: ["pct"],
                                ease: Sine.easeOut,
                                onUpdate: function ()
                                {
                                    neonLogin.$login_progressbar_indicator.html(o.pct + '%');
                                },
                                onComplete: callback
                            });
                        },
                        resetProgressBar: function (display_errors)
                        {
                            TweenMax.set(neonLogin.$container, {css: {opacity: 0}});

                            setTimeout(function ()
                            {
                                TweenMax.to(neonLogin.$container, .6, {css: {opacity: 1}, onComplete: function ()
                                    {
                                        neonLogin.$container.attr('style', '');
                                    }});

                                neonLogin.$login_progressbar_indicator.html('0%');
                                neonLogin.$login_progressbar.width(0);

                                if (display_errors)
                                {
                                    var $errors_container = $(".form-login-error");

                                    $errors_container.show();
                                    var height = $errors_container.outerHeight();

                                    $errors_container.css({
                                        height: 0
                                    });

                                    TweenMax.to($errors_container, .45, {css: {height: height}, onComplete: function ()
                                        {
                                            $errors_container.css({height: 'auto'});
                                        }});

                                    // Reset password fields
                                    neonLogin.$container.find('input[type="password"]').val('');
                                }

                            }, 800);
                        }
                    });


                    // Lockscreen Create Canvas
                    if (is_lockscreen)
                    {
                        neonLogin.$lockscreen_progress_canvas = $('<canvas></canvas>');
                        neonLogin.$lockscreen_progress_indicator = neonLogin.$container.find('.lockscreen-progress-indicator');

                        neonLogin.$lockscreen_progress_canvas.appendTo(neonLogin.$ls_thumb);

                        var thumb_size = neonLogin.$ls_thumb.width();

                        neonLogin.$lockscreen_progress_canvas.attr({
                            width: thumb_size,
                            height: thumb_size
                        });


                        neonLogin.lockscreen_progress_canvas = neonLogin.$lockscreen_progress_canvas.get(0);

                        // Create Progress Circle
                        var bg = neonLogin.lockscreen_progress_canvas,
                                ctx = ctx = bg.getContext('2d'),
                                imd = null,
                                circ = Math.PI * 2,
                                quart = Math.PI / 2,
                                currentProgress = 0;

                        ctx.beginPath();
                        ctx.strokeStyle = '#eb7067';
                        ctx.lineCap = 'square';
                        ctx.closePath();
                        ctx.fill();
                        ctx.lineWidth = 3.0;

                        imd = ctx.getImageData(0, 0, thumb_size, thumb_size);

                        var drawProgress = function (current) {
                            ctx.putImageData(imd, 0, 0);
                            ctx.beginPath();
                            ctx.arc(thumb_size / 2, thumb_size / 2, 70, -(quart), ((circ) * current) - quart, false);
                            ctx.stroke();

                            currentProgress = current * 100;
                        }

                        drawProgress(0 / 100);


                        neonLogin.$lockscreen_progress_indicator.html('0%');

                        ctx.restore();
                    }

                });

            })(jQuery, window);
        </script>


        <!-- JavaScripts initializations and stuff -->
        <script src="<?php echo $this->webroot; ?>js/neon-custom.js"></script>


        <!-- Demo Settings -->
        <script src="<?php echo $this->webroot; ?>js/neon-demo.js"></script>

    </body>
</html>