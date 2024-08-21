<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
           <title>{{ config('app.name', 'NutriHealth') }}</title>

               <link rel="icon" href="{{ asset('images/logo_no back.png') }}" type="image/x-icon">

   <!-- site metas -->
   <title>NutriHealth</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="nutri_index/css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="nutri_index/css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="nutri_index/css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="nutri_index/images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="nutri_index/css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>

<body>
   <!-- header SECCIÓN start -->
   <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo"><a href=""><img src="images/logo_no back.png" width="100"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">Inicio</a>
                             </li>

               @if (Route::has('login'))
                          @auth
                          <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                       </li>

                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}" >Iniciar sesión</a>
                                       </li>

                        @if (Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}" >Registrarse</a>
                                           </li>

                        @endif
                    @endauth
            @endif
     
            </ul>
         </div>
      </nav>
      <!-- header SECCIÓN end -->
      <!-- banner SECCIÓN start -->
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="banner_section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital">Nutri <br><span style="color: #151515;">Health</span></h1>
                           <p class="banner_text">Tu camino hacia una vida más saludable</p>
                           <div class="btn_main">
                              <div class="more_bt"><a href="#">Contactanos</a></div>
                              <div class="contact_bt"><a href="#">GRATIS</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="images/index/dietasf.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="banner_section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital">Nutri <br><span style="color: #151515;">Health</span></h1>
                           <p class="banner_text">Tu camino hacia una vida más saludable</p>
                           <div class="btn_main">
                              <div class="more_bt"><a href="#">Contactanos</a></div>
                              <div class="contact_bt"><a href="#">GRATIS</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="images/index/icons/excercise.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="banner_section">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital"> Nutri<br><span style="color: #151515;">Health</span></h1>
                           <p class="banner_text">Cuidando tu cuerpo, fortaleciendo tu vida</p>
                           <div class="btn_main">
                              <div class="more_bt"><a href="#">Contactanos</a></div>
                              <div class="contact_bt"><a href="#">GRATIS</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="images/index/icons/excercise.png" style="width: 200px;"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
      </div>
   </div>
   <!-- banner SECCIÓN end -->
   <!-- health SECCIÓN start -->
   <div class="health_section layout_padding">
      <div class="container">
         <h1 class="health_taital">Acerca de Nosotros</h1>
         <p class="health_text">
En NutriHealth, creemos que una vida saludable es la base para alcanzar el bienestar total. Somos una plataforma dedicada a brindar herramientas y recursos  que te ayudarán a mejorar tu salud y alcanzar tus metas de bienestar. Ya sea que estés buscando un plan de alimentación equilibrado, una rutina de ejercicios adaptada a tus necesidades, o un espacio para conectarte con una comunidad de personas con objetivos similares, NutriHealth está aquí para apoyarte en cada paso del camino.

         </p>
         <div class="health_section layout_padding">
            <div class="row">
               <div class="col-sm-7">
                  <div class="image_main">
                     <div class="main">
                        <img src="images/index/salud2.jpg" alt="Avatar" class="image" style="width:100%">
                     </div>
                     <div class="middle">
                        <div class="text"><img src="images/index/salud2.jpg" style="width: 40px;"></div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-5">
                  <div class="image_main_1">
                     <div class="main">
                        <img src="images/index/ejercicio1.jpeg" alt="Avatar" class="image" style="width:100%">
                     </div>
                     <div class="middle">
                        <div class="text"><img src="images/index/ejercicio1.jpeg" style="width: 40px;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- health SECCIÓN end -->
   <!-- knowledge SECCIÓN end -->
   <div class="knowledge_section layout_padding">
      <div class="container">
         <div class="knowledge_main">
            <div class="left_main">
               <h1 class="knowledge_taital">Nuestra misión</h1>
               <p class="knowledge_text">
                Es hacer que el camino hacia un estilo de vida saludable sea accesible y manejable para todos, sin importar tu nivel de experiencia o conocimiento previo. Con un enfoque claro, te ofrecemos planes y recomendaciones  para ti, basados en tus calorias, edad y sexo.

               </p>
            </div>
            <div class="right_main">
               <div class="play_icon"><a href="https://www.youtube.com/watch?v=dtE72Iv8e3E"><img src="nutri_index/images/play-icon.png"></a></div>
            </div>
         </div>
      </div>
   </div>
   <!-- knowledge SECCIÓN end -->
   <!-- news SECCIÓN start -->
   <div class="news_section layout_padding">
      <div class="container">
         <h1 class="health_taital">Características</h1>
         <p class="health_text">Calculadora de Calorías: Ingresa tu estatura, edad, peso y nivel de actividad para obtener una
estimación de las calorías que debes consumir diariamente para
alcanzar tus objetivos de salud y fitness.</p>
         <div class="news_section_2 layout_padding">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="box_main">
                     <div class="icon_1"><img src="images/index/icons/exercise (1).png" ></div>
                     <h4 class="daily_text_1">Plan de Entrenamiento Básico</h4>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="box_main active">
                     <div class="icon_1"><img src="images/index/icons/advice.png"></div>
                     <h4 class="daily_text_1">Consejos de Salud y Fitness</h4>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="box_main">
                     <div class="icon_1"><img src="images/index/icons/communities.png"></div>
                     <h4 class="daily_text_1">Comunidad y Apoyo Social</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="getquote_bt"><a href="#">Inicio <span><img src="nutri_index/images/right-arrow.png"></span></a></div>
      </div>
   </div>
   <!-- news SECCIÓN end -->

   <!-- client SECCIÓN start -->
   <div class="client_section layout_padding">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <h1 class="client_taital">En NutriHealth, valoramos las opiniones de nuestros usuarios.</h1>
                  <p class="client_text">
                 
                    Creemos que escuchar a nuestra comunidad es clave para mejorar y ofrecer un servicio que realmente marque la diferencia en la vida de las personas. A continuación, te compartimos algunas experiencias y comentarios de usuarios que han confiado en nosotros para alcanzar sus metas de salud y bienestar. Sus palabras reflejan nuestro compromiso con la calidad y la satisfacción de cada persona que utiliza nuestra plataforma. </p>
                  <div class="client_section_2">
                     <div class="client_left">
                        <div><img src="images/index/fotoperfil.jpeg" width="1000" height="100" class="client_img"></div>
                     </div>
                     <div class="client_right">
                        <h3 class="distracted_text">Lucía Fernández</h3>
                        <p class="lorem_text">
                        La plataforma es muy fácil de usar y me encanta que puedo ajustar mis planes de alimentación según mis gustos. Gracias a NutriHealth, he logrado mantener una dieta balanceada sin sentir que estoy sacrificando mis comidas favoritas.                        </p>
                        <div class="quote_icon"><img src="nutri_index/images/quote-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 class="client_taital">¿Qué opinan nuestros usuarios?</h1>
                  <div class="client_section_2">
                     <div class="client_left">
                        <div><img src="nutri_index/images/client-img.png" class="client_img"></div>
                     </div>
                     <div class="client_right">
                        <h3 class="distracted_text">Carlos Méndez</h3>
                        <p class="lorem_text">
                        Lo que más me gusta de NutriHealth es la comunidad. No solo he encontrado recursos útiles para mejorar mi salud, sino también un grupo de personas que me motiva y apoya en cada paso del camino.                        </p>
                        <div class="quote_icon"><img src="nutri_index/images/quote-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 class="client_taital">¿Qué opinan nuestros usuarios?</h1>
                  <div class="client_section_2">
                     <div class="client_left">
                        <div><img src="nutri_index/images/client-img.png" class="client_img"></div>
                     </div>
                     <div class="client_right">
                        <h3 class="distracted_text">Carlos Méndez</h3>
                        <p class="lorem_text">
                        Lo que más me gusta de NutriHealth es la comunidad. No solo he encontrado recursos útiles para mejorar mi salud, sino también un grupo de personas que me motiva y apoya en cada paso del camino.                        </p>
                        <div class="quote_icon"><img src="nutri_index/images/quote-icon.png"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" style="font-size:24px; padding-top: 4px;"></i>
         </a>
         <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" style="font-size:24px; padding-top: 4px;"></i>
         </a>
      </div>
   </div>
   <!-- client SECCIÓN end -->
   <!-- footer SECCIÓN start -->
<div class="footer_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-sm-6">
            <div class="footer_logo">
               <a href=""><img src="images/logo_no back.png"  alt="NutriHealth Logo"></a>
            </div>
            <div class="social_icon">
               <ul>
                  <li><a href="#"><img src="nutri_index/images/fb-icon.png" alt="Facebook"></a></li>
                  <li><a href="#"><img src="nutri_index/images/twitter-icon.png" alt="Twitter"></a></li>
                  <li><a href="#"><img src="nutri_index/images/linkedin-icon.png" alt="LinkedIn"></a></li>
                  <li><a href="#"><img src="nutri_index/images/instagram-icon.png" alt="Instagram"></a></li>
               </ul>
            </div>
            
         </div>
         <div class="col-lg-3 col-sm-6">
            <h1 class="adderss_text">Nuestros Programadores</h1>
            <div class="hiphop_text_1">
                Dafne Moreno<br>Aldo Peña <br>David Treviño<br>
            </div>
         </div>
        <div class="col-lg-3 col-sm-6">
   <h1 class="adderss_text">Apartados</h1>
   <div class="hiphop_text_1">
      <ul style="color: white;">
         <li><a href="#" style="color: white;">Inicio</a></li>
         <li><a href="#" style="color: white;">Dietas</a></li>
         <li><a href="#" style="color: white;">Foro</a></li>
         <li><a href="#" style="color: white;">Ejercicios</a></li>
         <li><a href="#" style="color: white;">Perfil</a></li>
         <li><a href="#" style="color: white;">Contacto</a></li>
      </ul>
   </div>
</div>

         <div class="col-lg-3 col-sm-6">
            <h1 class="adderss_text">Contáctanos</h1>
            <div class="map_icon">
               <img src="nutri_index/images/map-icon.png" alt="Ubicación">
               <span class="paddlin_left_0"> Av. Nuevas Tecnologías 5902, Parque Científico y Tecnológico de Tamaulipas, 87138 Cdad. Victoria, Tamps., México</span>
            </div>
            <div class="map_icon">
               <img src="nutri_index/images/call-icon.png" alt="Teléfono">
               <span class="paddlin_left_0">+123 456 7890</span>
            </div>
            <div class="map_icon">
               <img src="nutri_index/images/mail-icon.png" alt="Email">
               <span class="paddlin_left_0">contacto@nutrihealth.com</span>
            </div>
            
         </div>
      </div>
   </div>
</div>

   <!-- footer SECCIÓN end -->
   <!-- copyright SECCIÓN start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">2024 All Rights Reserved. Diseñado por  Team2</p>
      </div>
   </div>
   <!-- copyright SECCIÓN end -->
   <!-- Javascript files-->
   <script src="nutri_index/js/jquery.min.js"></script>
   <script src="nutri_index/js/popper.min.js"></script>
   <script src="nutri_index/js/bootstrap.bundle.min.js"></script>
   <script src="nutri_index/js/jquery-3.0.0.min.js"></script>
   <script src="nutri_index/js/plugin.js"></script>
   <!-- sidebar -->
   <script src="nutri_index/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="nutri_index/js/custom.js"></script>
   <!-- javascript -->
   <script src="nutri_index/js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>