<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
  $("#order").click(function(){
    $("#show").show();
  });
});
$(document).ready(function(){
  $("#close").click(function(){
    $("#show").hide();
  });
});
         
            </script>
        
    </head>

    <body>


      

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                       
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="margin:auto">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                        <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            <li class="scroll-to-section">
                                @auth
                                <a href="{{route('show',['userid'=>Auth::user()->id])}}">
                                Cart[{{$count}}]<!--if user not login the home page not find the count variable beacuse the count in function addcart in home controller after login(Auth) -->
                            </a>
                                @endauth
                                @guest
                                    Cart[0]
                                @endguest
                            
                           </li>
                            <li>@if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                            <li  > <x-app-layout>
                                
                            </x-app-layout> </li>
                                    @else
                                      <li>  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                        @if (Route::has('register'))
                                          <li>  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif</li>
                        </ul>
           
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>



    </header>
    <div id="top">
        <table  align ="center" bgcolor="gray" style="margin-top:20px"  >
            <thead>
                <tr >
                    <th style="padding:10px"scope="col">#</th>
                    <th style="padding:10px" scope="col">FoodName</th>
                    <th style="padding:10px"scope="col">Price</th>
                    <th style="padding:10px"scope="col">Quantity</th>
                    <th style="padding:10px"scope="col">Action</th>
            
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data)
                    <tr>
                        <td style="padding:10px"scope="row">{{ $loop->iteration }}</td>
                        <td style="padding:10px">{{ $data->title }}</td>
                        <td style="padding:10px" >{{ $data->price }}</td>
                        <td style="padding:10px">{{ $data->quantity }}</td>

                    
                     
                    </tr>
                    
                @empty
            
                @endforelse
                 
                  
                
              
            
            
            @foreach ($cartid as $cartid)
            <tr style="position: relative;top:-140px;right:-300px">   
         <td style="padding:10px">
                    
                    <a href="{{ route('deleteproduct', ['cartid' => $cartid->id]) }}" >Delete</a>

                
            
         </td>
        </tr>
            @endforeach
        </tbody>
            </table>
        </div>
        <div align="center" style="margin-top: 10px" >
<button class="btn btn-light" id="order" >OrderNow</button>
        </div>

        <div style="margin-top: 10px;display:none" id="show" >
            <form align ="center" method="post"  action="{{route('order',['userid'=>Auth::user()->id])}}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text"  name="name" id="name" placeholder="Enter Name" >
                  
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number"  name="phone" id="phone" placeholder="Enter Phone Number" >
                    
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text"  name="address" id="address" placeholder="Enter Address">
                    
                  </div>
                <button type="submit" class="btn btn-primary">Order Confirm</button>
                <button type="button" class="btn btn-danger" id="close">Close</button>
              </form>
                    </div>


    </body>
  
           







     <!-- jQuery -->
     <script src="assets/js/jquery-2.1.0.min.js"></script>

     <!-- Bootstrap -->
     <script src="assets/js/popper.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
 
     <!-- Plugins -->
     <script src="assets/js/owl-carousel.js"></script>
     <script src="assets/js/accordions.js"></script>
     <script src="assets/js/datepicker.js"></script>
     <script src="assets/js/scrollreveal.min.js"></script>
     <script src="assets/js/waypoints.min.js"></script>
     <script src="assets/js/jquery.counterup.min.js"></script>
     <script src="assets/js/imgfix.min.js"></script>
     <script src="assets/js/slick.js"></script>
     <script src="assets/js/lightbox.js"></script>
     <script src="assets/js/isotope.js"></script>
 
     <!-- Global Init -->
     <script src="assets/js/custom.js"></script>
     <script>
 
         $(function() {
             var selectedClass = "";
             $("p").click(function(){
             selectedClass = $(this).attr("data-rel");
             $("#portfolio").fadeTo(50, 0.1);
                 $("#portfolio div").not("."+selectedClass).fadeOut();
             setTimeout(function() {
               $("."+selectedClass).fadeIn();
               $("#portfolio").fadeTo(50, 1);
             }, 500);
 
             });
         });
 
     </script>
   </body>
 </html>