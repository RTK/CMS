<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Admin Control Panel</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" media="handheld, projection, screen, tv" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,300,400italic,500,900italic,900,700italic,700,500italic|Raleway:400,200" />
        <link rel="stylesheet" href="out/fontawesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="out/css/main.css" />
        <link rel="stylesheet" href="out/css/acp.css" />
        <link rel="stylesheet" href="out/css/contents.css" />
    </head>
    <body>
        <div class="cms-acp">
            <header>
                <nav>
                    <a class="fa fa-home" tooltip tooltip-text="Frontend" tooltip-direction="bottom" href="<?= URL ?>" target="_blank"></a>  
                    <a class="fa fa-sign-out" tooltip tooltip-text="Logout" tooltip-direction="bottom" href="?page=logout"></a> 
                </nav>
                <section>
                    <hgroup>
                        <h1>RK CMS</h1>
                        <h3>V 0.3</h3>
                    </hgroup>
                </section>
                <menu role="menu">
                    <nav role="navigation" role="presentation">
                        <a href="?templates">
                            <figure class="fa fa-desktop">
                                <figcaption>Menüpunkt1</figcaption>
                            </figure>
                        </a>
                        <a href="?inhalte">
                            <figure class="fa fa-file-text">
                                <figcaption>Menüpunkt2</figcaption>
                            </figure>
                        </a>
                        <a href="?module">
                            <figure class="fa fa-puzzle-piece">
                                <figcaption>Menüpunk3</figcaption>
                            </figure>
                        </a>
                        <a href="?page=filemanager">
                            <figure class="fa fa-cloud-upload">
                                <figcaption>Dateiverwaltung</figcaption>
                            </figure>
                        </a>
                        <a href="?page=rightscontrol">
                            <figure class="fa fa-dashboard">
                                <figcaption>Rechteverwaltung</figcaption>
                            </figure>
                        </a>
                    </nav>
                </menu>
            </header>
            <section role="main">
                <section>