<!DOCTYPE html>
<html lang="pl">
<head>

     <title>Hydro - Landing Page Template</title>
<!--
Hydro Template
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <!-- lOGO TEXT HERE -->
                    <a href="calc_view.php" class="navbar-brand">KALKULATOR OBLICZAJĄCY PRZYBLIŻONĄ WARTOŚĆ PIERWIASTNA N-TEGO STOPNIA</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                         <?php if(isset($logged) && $logged == true){?> <li class="section-btn"><a href="#" data-toggle="modal" data-target="#modal-form">Wyloguj</a></li><?php } ?>
                    </ul>
               </div>

          </div>
     </section>
