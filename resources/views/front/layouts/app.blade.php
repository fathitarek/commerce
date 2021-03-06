<!DOCTYPE html>
<html>
<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Title web-->
    <title>Nova Solution Co.</title>
    <!--icon-->
    <link rel="icon" href="{{ asset('front/img/LOGOS%20GOBER-12.png') }}">
            <!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAvIsz3M59Jyze3pfpZSXcOmFzH7KQ79Ys"></script> -->

    <!--Bootstrap 4-->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <!--googel font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo:400,600,700,800|Varela+Round">
    <!--anmation-->
    <link rel="stylesheet" href="{{ asset('front/css/anmation.css') }}">
    <!--skitter-->
    <link rel="stylesheet" href="{{ asset('front/css/skitter.css') }}">
    <!--normlize-->
    <link rel="stylesheet" href="{{ asset('front/css/normlize.css') }}">
    <!--hover-->
    <link rel="stylesheet" href="{{ asset('front/css/hover.css') }}">
    <!--Style-->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--if it-->
    <script src="{{ asset('front/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('front/js/respond.min.js') }}"></script>
    <!--end if-->
</head>
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="index.html">
                    <img class="navbar-logo left-logo" src="{{ asset('front/img/LOGOS%20GOBER-05.png') }}" alt="">
                    <img class="navbar-logo right-logo" src="{{ asset('front/img/LOGOS%20GOBER-12.png') }}" alt="">
                </a>
            </div>
             <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Inicio</a></li>
                <li><a href="news.html">Novedades</a></li>
                <li class="dropdown">
                    <a href="#">Nosotros <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="programa.html">Programa Artesanías de Boyacá</a>
                        <a href="sellers.html">Profiles</a>
                        <a href="contact.html">Contacto</a>
                    </div>
                </li><!--/.dropdown--->
                <li class="dropdown">
                    <a href="#">Productos <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a class="header-drop" href="#">Hogar y decoración</a>
                        <a href="category.html">Cestería</a>
                        <a href="category.html">Cerámica</a>
                        <a href="category.html">Carpintería</a>
                        <a href="category.html">Forja y Metales</a>
                        <a href="category.html">Taracea</a>

                        <a class="header-drop" href="#">Moda Artesanal</a>
                        <a href="category.html">Tejeduría</a>

                        <a class="header-drop" href="#">Joyería</a>
                        <a href="category.html">Bisutería</a>
                        <a href="category.html">Plata</a>
                    </div>
                </li><!--/.dropdown--->
                <li class="dropdown">
                    <a href="#">Historias <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="stories.html">Relatos</a>
                        <a href="maestros%20-artesanos.html">Maestros Artesanos</a>
                    </div>
                </li><!--/.dropdown--->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a href="javascript:void(0);"> <i id="search_show" class="fa fa-search" aria-hidden="true"></i></a>
                <a href="javascript:void(0);"> <i id="login_show" class="fa fa-user-circle" aria-hidden="true"></i></a>
                <a href="card.html"> <i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                <div class="search-form-box">
                    <input class="search-store">
                </div>
            </ul>
        </div>
    </nav>
    
    <div id="menu-right" onclick="openNav()">  <i class="fa fa-bars" aria-hidden="true"></i>  </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
        <img class="logo img-fluid" src="img/LOGOS%20GOBER-12.png" alt="Logo"> 
        <li class="active"><a href="index.html">Inicio</a></li>
        <li><a href="news.html">Novedades</a></li>
        <li class="dropdown">
            <a href="#">Nosotros <i class="fa fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="programa.html">Programa Artesanías de Boyacá</a>
                <a href="sellers.html">Profiles</a>
                <a href="contact.html">Contacto</a>
            </div>
        </li><!--/.dropdown--->
        <li class="dropdown">
            <a href="#">Productos <i class="fa fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a class="header-drop" href="#">Hogar y decoración</a>
                <a href="category.html">Cestería</a>
                <a href="category.html">Cerámica</a>
                <a href="category.html">Carpintería</a>
                <a href="category.html">Forja y Metales</a>
                <a href="category.html">Taracea</a>

                <a class="header-drop" href="#">Moda Artesanal</a>
                <a href="category.html">Tejeduría</a>

                <a class="header-drop" href="#">Joyería</a>
                <a href="category.html">Bisutería</a>
                <a href="category.html">Plata</a>
            </div>
        </li><!--/.dropdown--->
        <li class="dropdown">
            <a href="#">Historias <i class="fa fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="stories.html">Relatos</a>
                <a href="maestros%20-artesanos.html">Maestros Artesanos</a>
            </div>
        </li><!--/.dropdown--->
    </div>
    <!--/.navbar-->
    <!--.login-wrap-->
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="/" method="POST">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>
                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="sign-up-htm">
                    <form action="/" method="POST">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" class="input">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @yield('content')

  <footer class="text-center">
        <div class="container">
            <a class="btn-footer" href="#">simple hero unit</a>
            <a class="btn-footer" href="#">simple hero unit</a>
            <div class="text-footer">
                <div class="links-footer">
                    <p><i class="fa fa-map-marker"></i> Nuestra Oficina: Calle 20 No. 9-90 Oficina 202-203, Centro Plaza de Bolívar, Tunja, Boyacá Colombia</p>
                    <p><i class="fa fa-hourglass"></i> Horario: Lunes a Viernes 8:00 am a 12:00pm y de 2:00pm a 6:00pm</p>
                    <p><i class="fa fa-envelope"></i> Correo: info@artesaniasdeboyaca.com</p>
                    <p><i class="fa fa-phone"></i> Teléfono: (8) 742 0150 Ext. 2200</p>
                </div>
            </div><!--./text-footer-->
            <div class="item-brand">
                <img src="{{ asset('front/img/LOGOS%20GOBER-11white.png') }}" alt="">
                <img src="{{ asset('front/img/LOGOS%20GOBER-White.png') }}" alt="">
                <img src="{{ asset('front/img/LOGOS%20GOBERa-white.png') }}" alt="">
            </div><!--/.item-brand-->
        </div>
    </footer>
    <!--/.footer-->
    
    <!-- jquery -->
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <!-- jquery.easing -->
    <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
    <!-- jquery.skitter -->
    <script src="{{ asset('front/js/jquery.skitter.js') }}"></script>
    <!-- anmation -->
    <script src="{{ asset('front/js/anmation.js') }}"></script>
    <!-- main -->
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>