<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/ico" href="{{ url('/images/favicon.ico') }}">
    <title>Agence - Prototipo</title>
    
     <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ url('/css/normalize.css') }}">
    
     <!-- Materialize CSS -->
    <link rel="stylesheet" href="{{ url('/css/materialize.min.css') }}">
    
     <!-- Material Design Iconic Font CSS -->
    <link rel="stylesheet" href="{{ url('/css/material-design-iconic-font.min.css') }}">
    
    <!-- Malihu jQuery custom content scroller CSS -->
    <link rel="stylesheet" href="{{ url('/css/jquery.mCustomScrollbar.css') }}">
    
    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="{{ url('/css/sweetalert.css') }}">
    
    <!-- MaterialDark CSS -->
    <link rel="stylesheet" href="{{ url('/css/style.css') }}'">

    
</head> 
<body>

    <!-- Nav Lateral -->
    <section class="NavLateral full-width">
        <div class="NavLateral-FontMenu full-width ShowHideMenu"></div>
        <div class="NavLateral-content full-width">
            <header class="NavLateral-title full-width center-align ">
            <!-- <figure class="full-width NavLateral-logo"> -->
                <a href="#">
                <img src="{{ url('/images/agence.png') }}" alt="agence" class="responsive-img center-box" style='padding-top: 5px'>
                <figcaption class="center-align"></figcaption>
                <i class="zmdi zmdi-close NavLateral-title-btn ShowHideMenu"></i>
                </a>
            <!-- </figure>                 -->
            </header>
 
            <div class="NavLateral-Nav">
                <ul class="full-width">
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-home zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Agence</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Undefined</a></li>
                        </ul>
                    </li>    
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-assignment-check zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Projetos</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Undefined</a></li>
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-border-color zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Administrativos</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Undefined</a></li>
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Comercial</a>
                        <ul class="full-width">
                            <li><a href="{{ url('/performance') }}'" class="waves-effect waves-light">Performance Comercial</a></li>
                        </ul>
                    </li> 
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-picture-in-picture zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Financiero</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Undefined</a></li>
                        </ul>
                    </li>   
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-account-box-mail zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Usuario</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Undefined</a></li>
                        </ul>
                    </li>   
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="{{ url ('/logout') }}" class="waves-effect waves-light"><i class="zmdi zmdi-close-circle zmdi-hc-fw"></i> Salir</a>
                        
                    </li>   
                </ul>
            </div>  
        </div>  
    </section>
    <!-- Page content -->
    <section class="ContentPage full-width">
        <!-- Nav Info -->
        <div class="ContentPage-Nav full-width">
            <ul class="full-width">
                <li class="btn-MobileMenu ShowHideMenu"><a href="#" class="tooltipped waves-effect waves-light" data-position="bottom" data-delay="50" data-tooltip="Menu"><i class="zmdi zmdi-more-vert"></i></a></li>
               <!-- <li><figure><img src="{{ url('/images/user.png') }}" alt="UserImage"></figure></li>-->
                <li style="padding:0 5px;"></li>
                <li><a href="#" class="tooltipped waves-effect waves-light btn-ExitSystem" data-position="bottom" data-delay="50" data-tooltip="Salir"><i class="zmdi zmdi-power"></i></a></li>
                <li><a href="#" class="tooltipped waves-effect waves-light btn-Search" data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="zmdi zmdi-search"></i></a></li>
                <li>
                    <a href="#" class="tooltipped waves-effect waves-light btn-Notification" data-position="bottom" data-delay="50" data-tooltip="Notificaciones">
                        <i class="zmdi zmdi-notifications"></i>
                        <span class="ContentPage-Nav-indicator bg-danger">2</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Notifications area -->
        <section class="z-depth-3 NotificationArea">
            <div class="full-width center-align NotificationArea-title">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                        <strong>New User Registration</strong>
                        <br>
                        <small>Just Now</small>
                    </p>
                </div>
            </a>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                        <strong>New Updates</strong>
                        <br>
                        <small>30 Mins Ago</small>
                    </p>
                </div>
            </a>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                        <strong>Archive uploaded</strong>
                        <br>
                        <small>31 Mins Ago</small>
                    </p>
                </div>
            </a>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                        <strong>New Mail</strong>
                        <br>
                        <small>37 Mins Ago</small>
                    </p>
                </div>
            </a>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                        <strong>Folder delete</strong>
                        <br>
                        <small>1 hours Ago</small>
                    </p>
                </div>
            </a>
        </section>
    </section>