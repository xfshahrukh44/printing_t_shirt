<footer>
     <div class="container">
          <div class="row align-items-center">
               <div class="col-md-3">
                    <div class="footer-link">
                         <img src="{{ asset($logo->img_path) }}" class="img-fluid" alt="">
                        
                    </div>
               </div>

               <div class="col-md-3">
                    <div class="footer-link">
                         <!--<ul>-->
                         <!--     <li><a href="javascript:void(0)">Purchases & Returns</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Shipping Information</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Help & Support</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Sales Tax Info</a></li>-->
                         <!--     <li><a href="{{ route('contact') }}">Contact us</a></li>-->
                         <!--     <li><a href="{{ route('about') }}">About Us</a></li>-->
                         <!--</ul>-->
                         
                         
                          <ul>

                             <li><a style="color:#777777;" >{{App\Http\Traits\HelperTrait::returnFlag(519)}}</a></li>
                              <li><a style="color:#777777;" >{{App\Http\Traits\HelperTrait::returnFlagType(1964)}} {{App\Http\Traits\HelperTrait::returnFlag(1964)}}</a></li>
                              <li><a style="color:#777777;" >{{App\Http\Traits\HelperTrait::returnFlagType(1965)}} {{App\Http\Traits\HelperTrait::returnFlag(1965)}}</a></li>
                              <li><a style="color:#777777;" >{{App\Http\Traits\HelperTrait::returnFlag(59)}}</a></li>

                         </ul>
                         
                    </div>
               </div>
               <div class="col-md-3">
                    <div class="footer-link">
                         <!--<ul>-->
                         <!--     <li><a href="javascript:void(0)">Partner Program</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Getting Into Business</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Sublimation 101</a></li>-->
                         <!--     <li><a href="javascript:void(0)">T-Shirt Iron-Ons</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Why Order from Us</a></li>-->
                         <!--     <li><a href="javascript:void(0)">PW Reward Points</a></li>-->
                         <!--     <li><a href="javascript:void(0)">Siser Offers</a></li>-->
                         <!--</ul>-->
                         
                         
                          <ul>

                             <li><a href="{{ route('contact') }}">Contact us</a></li>-->
                              <li><a href="{{ route('about') }}">About Us</a></li>
                              <li><a href="{{ URL('signin') }}">Signin</a></li>
                             
                         </ul>
                         
                    </div>
               </div>
               <div class="col-md-3">
                    <div class="footer-sub">
                         <img src="{{ asset($logo->img_path) }}" class="img-fluid" alt="">
                         <p>GET IN TOUCH</p>
                         <p class="email">Feel free to get in touch with us via email</p>

                         <p class="email">
                             {{App\Http\Traits\HelperTrait::returnFlag(218)}}
                         </p>

                         <div class="social-icons">
                              <span><a href="{{App\Http\Traits\HelperTrait::returnFlag(682)}}"><i class="fa-brands fa-facebook-f"></i> </a></span>
                              <span><a href="{{App\Http\Traits\HelperTrait::returnFlag(1962)}}"><i class="fa-brands fa-instagram"></i></a></span>
                              <span><a href="{{App\Http\Traits\HelperTrait::returnFlag(1960)}}"><i class="fa-brands fa-twitter"></i></a></span>
                         </div>
                    </div>
               </div>
          </div>
          <div class="footer-row">
               <div class="row">
                    <div class="col-md-8">
                         <div class="footer-email">
                              <p>Copyright © 2024 | all right reserved</p>
                         </div>
                    </div>

                    <div class="col-md-4">
                         <div class="footer-anchor">
                              <a href="{{ URL('terms-and-condition') }}">terms of services</a>
                              <a href="{{ URL('privacy-policy') }}">privacy policy</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</footer>
