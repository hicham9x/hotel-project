         <!-- header inner -->
         <style>
             .collapse {
                 visibility: initial !important;
             }
         </style>
         <div class="header">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                         <div class="full">
                             <div class="center-desk">
                                 <div class="logo">
                                     <a href="{{ url('/') }}"><img src="images/kenzi.png" alt="#" /></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                         <nav class="navigation navbar navbar-expand-md navbar-dark ">
                             <button class="navbar-toggler" type="button" data-toggle="collapse"
                                 data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                 aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                             </button>
                             <div class="collapse navbar-collapse" id="navbarsExample04">
                                 <ul class="navbar-nav mr-auto">
                                     <li class="nav-item active">
                                         <a class="nav-link" href="{{ url('/') }}">Home</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="#about">About</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="#room">Our room</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="#gallery">Gallery</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link" href="#contact">Contact Us</a>
                                     </li>
                                     


                                     @if (Route::has('login'))
                                         <ul class="navbar-nav ml-auto">
                                             @auth
                                                 <!-- If the user is logged in -->
                                                 <x-app-layout></x-app-layout>
                                             @else
                                                 <!-- If the user is not logged in -->
                                                 <li class="nav-item" style="padding-right: 10px;">
                                                     <a class="btn btn-success" href="{{ url('login') }}"
                                                         style="margin-left: 70px">Login</a>
                                                 </li>

                                                 @if (Route::has('register'))
                                                     <li class="nav-item">
                                                         <a class="btn btn-primary"
                                                             href="{{ url('register') }}">Register</a>
                                                     </li>
                                                 @endif
                                             @endauth
                                         </ul>
                                     @endif

                                 </ul>
                             </div>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
