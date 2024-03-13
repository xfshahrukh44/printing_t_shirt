<?php $segment = Request::segment(1);?>

<div class="top-header">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 p-0">
                    <div class="top-menu">
                         <div class="same-elevate">
                              <h5>New look, same Elevate!</h5>
                              <h6>(USD $)</h6>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<header>
     <div class="container">
          <div class="row">
               <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">

                         <a class="navbar-brand" href="index.php">
                             <img src="{{ asset($logo->img_path) }}" class="img-fluid" alt="">
                         </a>

                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                              aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>

                         <div class="collapse navbar-collapse">
                              <div class="main-menu">
                                   <div class="search-bar">
                                        <input type="search" class="form-control" placeholder="Search For...">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                   </div>
                                   <form class="d-flex btn-top">
                                        <a href="#" class="btn btn-account"><i class="fa-regular fa-user"></i>
                                             Account</a>
                                        <div class="side-top-maodal">
                                            @php
                                                $cart = Session::get('cart');
                                                $cart_count = count($cart);
                                                $subtotal = 0;
                                                $total_variation = 0;
                                                foreach ($cart as $key => $value) {
                                                    $subtotal += $value['baseprice'] * $value['qty'];
                                                    $total_variation += $value['variation_price'];
                                                }
                                            @endphp
                                             <a href="{{route('cart')}}" class="btn btn-black" type="button" onclick="modalspan()"><i
                                                       class="fa-solid fa-cart-shopping"></i>${{ $subtotal + $total_variation }}({{$cart_count}})</a>
                                             <div class="openmaodal" id="modal_span">
                                                  <span class="close">&times;</span>

                                                  <div class="modal-cart-main">
                                                       <div class="items-img">
                                                            <figure>
                                                                 <img src="{{asset('images/29.png')}}" class="img-fluid" alt="">
                                                            </figure>
                                                            <div class="clear-black-img">
                                                                 <h5>RANDOM RHINESTONE CLEAR <span class="d-block">Item
                                                                           #A9086F</span>
                                                                 </h5>
                                                                 <div class="total-price">
                                                                      <h6>$3.87</h6>
                                                                 </div>
                                                                 <div class="items-no">
                                                                      <h6>Qty</h6>
                                                                      <div class="total-price current-item">
                                                                           <input type="number" id="quantity"
                                                                                name="quantity" min="1" max="100">
                                                                      </div>
                                                                 </div>
                                                            </div>

                                                       </div>

                                                  </div>

                                                  <div class="modal-div">
                                                       <div class="items-cart">
                                                            <h6> <span>1</span> Item in Cart
                                                            </h6>
                                                       </div>
                                                       <div class="card-total">
                                                            <h5>Cart Subtotal : <span class="d-block">$3.87</span>
                                                            </h5>
                                                       </div>
                                                  </div>
                                                  <div class="view-btn">
                                                       <a href="#" class="btn light-blue-btn">VIEW CART &
                                                            CHECKOUT</a>
                                                  </div>

                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </nav>
                    <div class="links-menu">
                         <ul class="navbar-nav m-auto">
                              <li class="nav-item mega-menu-on heat-transfers">
                                   <a class="nav-link active" aria-current="page" href="#"> Heat Transfers
                                   </a>
                                   <div class="main-mega-menu">
                                        <div class="row">
                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Graphics By Type</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="screen-printed.php">Screen Printed</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">DTF (Direct to Film)</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Numbered</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Mixed Media</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Rhinestone</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Lettered</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sequins</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Custom Transfers</a>
                                                            </li>
                                                       </ul>
                                                       <h5><a href="javascript:;">Featured Transfers</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Best Selling Graphics</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">New Graphics</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Wildside</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Custom Transfers</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Clearance</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>



                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Graphics By Category</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Animal</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Hat &amp; Pocket-sized</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Biker</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Bird</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Cancer Awareness</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Car</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Cat</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Christian Inspirational</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Clearance</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Color Changing</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Country</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Custom Transfers</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Dance and Cheer</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Decorative</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Dog</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>





                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Entertainment</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Ethnic</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Face Mask</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Family</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Farm Animal</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Floral</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Funny</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Game Wildlife</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Glitter</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Holiday</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Horse</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Insect</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Kids</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Lettering</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Marine Life</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>


                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Military</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Mixed Media</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Native American</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Neon</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Numbers</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Occupation</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Patriotic</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Political</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Pride</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Rebel</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Religious</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Reptile</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Resort</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Rhinestone</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Screen Printed</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>


                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li><a href="javascript:;">Sequins</a></li>
                                                            <li><a href="javascript:;">Sport</a></li>
                                                            <li><a href="javascript:;">TV</a></li>
                                                            <li><a href="javascript:;">Trendy</a></li>
                                                            <li><a href="javascript:;">Ugly Christmas Sweater</a></li>
                                                            <li><a href="javascript:;">Unique Pets</a></li>
                                                            <li><a href="javascript:;">Vintage</a></li>
                                                            <li><a href="javascript:;">Voting</a></li>
                                                            <li><a href="javascript:;">Western</a></li>
                                                            <li><a href="javascript:;">Wildlife</a></li>
                                                            <li><a href="javascript:;">Wildside</a></li>
                                                            <li><a href="javascript:;">Wine</a></li>
                                                       </ul>
                                                  </div>
                                             </div>


                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li><a href="javascript:;"><img src="{{asset('images/1.jpg')}}"
                                                                           class="img-fluid" alt=""></a>
                                                            </li>
                                                            <li><a href="javascript:;"><img src="{{asset('images/2.jpg')}}"
                                                                           class="img-fluid" alt=""></a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </li>
                              <li class="nav-item mega-menu-on Vinyl-on t-shirt-categories">
                                   <a class="nav-link" href="#">Vinyl </a>

                                   <div class="main-mega-menu">
                                        <div class="row">
                                             <div class="col-lg-3">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Vinyl By Type</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">All Vinyl</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Printable Vinyl</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Heat Transfer Vinyl <br>For Garments</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sign &amp; Decorative Vinyl</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>



                                             <div class="col-lg-3">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Vinyl By Brand</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Oracal</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Siser</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sparkleberry Ink</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Specialty Materials</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">K-Laser Foil</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>





                                             <div class="col-lg-4">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Vinyl Cutters &amp; Accessories</a>
                                                       </h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">All Cutters</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">GCC Cutters</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Siser Romeo &amp; Juliet Cutters</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">All Accessories</a>
                                                            </li>
                                                       </ul>
                                                       <h5><a href="javascript:;">Featured</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Vinyl Cutter Starter Package</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Vinyl Packages</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>


                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;"><img src="{{asset('images/3.jpg')}}"
                                                                           class="img-fluid" alt=""></a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;"><img src="{{asset('images/4.jpg')}}"
                                                                           class="img-fluid" alt=""></a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </li>




                              <li class="nav-item mega-menu-on Custom-on t-shirt-categories">
                                   <a class="nav-link" href="#">
                                        Custom Transfers
                                   </a>
                                   <div class="main-mega-menu">
                                        <div class="row">
                                             <div class="col-lg-6">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;"><img src="{{asset('images/5.jpg')}}"
                                                                           class="img-fluid" alt=""></a>
                                                                 <a href="javascript:;">View All Custom
                                                                      Heat Transfers</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                             <div class="col-lg-6">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;"><img src="{{asset('images/27.png')}}"
                                                                           class="img-fluid" alt="">Create Transfer from
                                                                      Design Template</a>
                                                                 <a href="javascript:;"></a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </li>





                              <li class="nav-item mega-menu-on Starter-Packs-on t-shirt-categories">
                                   <a class="nav-link" href="#"> Starter Packs </a>

                                   <div class="main-mega-menu">
                                        <div class="row">
                                             <div class="col-lg-12">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Starter Packages</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">All Starter Packages</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">DTF Starter Packages</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Heat Press Starter Packages</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Mug Starter Packages</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sublimation Starter Packages</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Vinyl Starter Packages</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </li>




                              <li class="nav-item t-shirt-categories">
                                   <a class="nav-link" href="#"> Clearance </a>
                              </li>


                              <li class="nav-item mega-menu-on Digital-on t-shirt-categories">
                                   <a class="nav-link" href="#"> Digital Art </a>
                                   <div class="main-mega-menu">
                                        <div class="row">
                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;">Digital Art By Category</a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">All Digital Art</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Bundles</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">3D Art</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Alphabet</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Animals</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Arrows</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Awareness</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Baby</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Baking</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Birthday</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Bless This</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                             <div class="col-lg-2">

                                                  <h5><a href="javascript:;"></a></h5>
                                                  <ul class="inner-ul-links">
                                                       <li>
                                                            <a href="javascript:;">Blessed</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Business</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Ethnic</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Family</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Farm</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Floral</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Food & Drink</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Funny</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Holiday</a>
                                                       </li>
                                                       <li>
                                                            <a href="javascript:;">Home</a>
                                                       </li>
                                                  </ul>

                                             </div>


                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Health & Beauty</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Kids</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Love</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Masks</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Military</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Medical</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Monogram</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Music</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Patriotic</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Patterns</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>





                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a></h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Police</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Pride</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Religious</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Rememberance</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">School</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Seasonal</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sports</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">States</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sublimation</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Trendy</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Vacation</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>


                                             <div class="col-lg-2">
                                                  <div class="iner-menu-links">
                                                       <h5><a href="javascript:;"></a>Digital Art By Artist</h5>
                                                       <ul class="inner-ul-links">
                                                            <li>
                                                                 <a href="javascript:;">Bailey and Ginger</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Camus Studio</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Digital Diva</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Harbor Grace Designs</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Jordyn Alison Designs</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Savana's Design</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Shine Green</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Sugar Sugar</a>
                                                            </li>
                                                            <li>
                                                                 <a href="javascript:;">Wispy Willow</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                              </li>
                         </ul>
                    </div>
               </div>
          </div>
     </div>
</header>
