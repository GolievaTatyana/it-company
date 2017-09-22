<?php $templateUri = get_template_directory_uri();?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $templateUri ?>/favicon.ico">
		<title><?php wp_title(); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo $templateUri ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $templateUri ?>/style.css" >
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
    <header id="header">
        <div class="container-fluid">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><span>IT</span>company</a>
                </div>

                <div class="collapse navbar-collapse top-menu" id="bs-example-navbar-collapse-1">
                    <?php
            				wp_nav_menu( array(
            					'theme_location'  => 'header-menu',
            					'container'       => '',
            					'menu_class'      => 'nav navbar-nav navbar-right',
            					'fallback_cb'     => '__return_empty_string',
            					'depth'           => 1,
            					) );
            					?>
                </div>
            </nav>
        </div>
    </header>
