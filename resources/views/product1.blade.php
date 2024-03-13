@extends('layouts.main')

@section('css')
    <style>

    </style>
@endsection


@section('content')
    <section class="Heat-pg-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
{{--                    <div class="categories-main">--}}
{{--                        <h3>Heat Transfer </h3>--}}
{{--                    </div>--}}
                    <div class="main-product-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="side-bar-category">
                                    <div class="shopcategory">
                                        <h3>Shop By</h3>
                                    </div>
                                    <div class="category-inner">
                                        @foreach($subcategories as $subcategory)
                                            <ul>
                                                <li class="category-mian-li">
                                                    <a href="javascript:;">
                                                        <i class="fa-solid fa-angle-right"></i>
                                                        {{$subcategory->subcategory}}
                                                    </a>

                                                    @if (count($subcategory->child_sub_categories))
                                                        <span>{{count($subcategory->child_sub_categories)}}</span>
                                                        <div class="category-hover">
                                                            <ul>
                                                                @foreach($subcategory->child_sub_categories as $child_sub_category)
                                                                    <li>
                                                                        <a href="#">
                                                                            <i class="fa-solid fa-angle-right"></i>
                                                                            {{$child_sub_category->childsubcategory}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </li>

                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="categories-main-right cart-inner">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-lg-3">
                                                <div class="product-slider">
                                                    <div class="shirt-slides">
                                                        <a href="javascript:;">
                                                            <div class="shirt-dots" data-bs-toggle="modal"
                                                                 data-bs-target="#exampleModal_{{$product->id}}">
                                                                <figure>
                                                                    <img src="{{asset($product->image)}}" class="img-fluid"
                                                                         alt="">
                                                                </figure>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="product-discription">
                                                        <div class="rainbow-col">
                                                            <div class="pro-name">
{{--                                                                <p> RANDOM RHINESTONE <span--}}
{{--                                                                        class="d-block">CLEAR</span></p>--}}
                                                                <p>
                                                                    {{$product->product_title}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="item-size">
                                                            <p>Item #: {{$product->sku}}
                                                                <span> Size: {{$product->size}}</span>
                                                                Help
                                                            </p>
                                                        </div>
                                                        <div class="item-sale">
                                                            <ul>
                                                                <li>
                                                                    <span>1</span>
                                                                </li>
                                                                <li>
                                                                    <span>2-5</span>
                                                                </li>
                                                                <li>
                                                                    <span>6-11</span>
                                                                </li>
                                                                <li>
                                                                    <span>12+</span>
                                                                </li>
                                                                <li>
                                                                    <span>${{$product->price}}</span>
                                                                </li>

                                                                <li>
                                                                    <span>${{$product->price2}}</span>
                                                                </li>

                                                                <li>
                                                                    <span>${{$product->price3}}</span>
                                                                </li>

                                                                <li>
                                                                    <span>${{$product->price4}}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="stock-cart">
                                                            <div class="item-size">
{{--                                                                <p>Availability: In Stock</p>--}}
                                                                <p>Availability: {{$product->in_stock ? 'In Stock' : 'Not In Stock'}}</p>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('save_cart')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <div class="cart-btn">
                                                                <div class="quantity-btn">
                                                                    <label for="quantity">Qty
                                                                    </label>
                                                                    <input type="number" id="quantity" name="qty"
                                                                           min="1" max="100" value="1">
                                                                    <input type="hidden" name="type_1_product">
                                                                </div>
                                                                <div class="heart-cart">
                                                                    <button type="submit" class="btn btn-black">Add To
                                                                        Cart</button>
                                                                    <a href="#"><i
                                                                            class="fa-regular fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>


                                                    <div class="modal-produc">

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal_{{$product->id}}" tabindex="-1"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="pro-img-modal">
                                                                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                                                                 class="swiper mySwiper4 mySwiper_{{$product->id}}">
                                                                                <div
                                                                                    class="swiper-wrapper change-img">
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide green-back">
                                                                                        <div
                                                                                            class="shirt-dots">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots blue-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots red-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots orange-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div thumbsSlider=""
                                                                                 class="swiper mySwiper3 select-img-slides">
                                                                                <div class="swiper-wrapper">
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots green-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots blue-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots red-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="swiper-slide">
                                                                                        <div
                                                                                            class="shirt-dots orange-back">
                                                                                            <figure>
                                                                                                <img src="{{asset($product->image)}}"
                                                                                                     class="img-fluid"
                                                                                                     alt="">
                                                                                            </figure>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="discription-img-modal">
                                                                                {!! $product->description !!}
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="shirt-dots" data-bs-toggle="modal"--}}
{{--                                                             data-bs-target="#exampleModal">--}}
{{--                                                            <figure>--}}
{{--                                                                <img src="{{asset('images/29.png')}}" class="img-fluid"--}}
{{--                                                                     alt="">--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> RANDOM RHINESTONE <span--}}
{{--                                                                    class="d-block">CLEAR</span></p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p>Item #: A9086F--}}
{{--                                                            <span> Size: 12" x 13"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$3.87</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$3.57</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$3.04</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$2.49</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="cart.php" class="btn btn-black">Add To--}}
{{--                                                                Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="modal-produc">--}}

{{--                                                    <!-- Modal -->--}}
{{--                                                    <div class="modal fade" id="exampleModal" tabindex="-1"--}}
{{--                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                                        <div class="modal-dialog">--}}
{{--                                                            <div class="modal-content">--}}
{{--                                                                <div class="modal-header">--}}
{{--                                                                    <button type="button" class="btn-close"--}}
{{--                                                                            data-bs-dismiss="modal"--}}
{{--                                                                            aria-label="Close"></button>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-body">--}}
{{--                                                                    <div class="pro-img-modal">--}}
{{--                                                                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"--}}
{{--                                                                             class="swiper mySwiper4">--}}
{{--                                                                            <div--}}
{{--                                                                                class="swiper-wrapper change-img">--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide green-back">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots blue-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots red-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots orange-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}

{{--                                                                        </div>--}}
{{--                                                                        <div thumbsSlider=""--}}
{{--                                                                             class="swiper mySwiper3 select-img-slides">--}}
{{--                                                                            <div class="swiper-wrapper">--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots green-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots blue-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots red-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div--}}
{{--                                                                                    class="swiper-slide">--}}
{{--                                                                                    <div--}}
{{--                                                                                        class="shirt-dots orange-back">--}}
{{--                                                                                        <figure>--}}
{{--                                                                                            <img src="{{asset('images/29.png')}}"--}}
{{--                                                                                                 class="img-fluid"--}}
{{--                                                                                                 alt="">--}}
{{--                                                                                        </figure>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="discription-img-modal">--}}
{{--                                                                            <h5>RANDOM RHINESTONE CLEAR--}}
{{--                                                                                <span class="d-block">Item--}}
{{--                                                                                                    #A9086F</span>--}}
{{--                                                                            </h5>--}}
{{--                                                                            <a href="#">Instructions</a>--}}
{{--                                                                            <p><span>Type:</span>--}}
{{--                                                                                Rhinestone</p>--}}
{{--                                                                            <p><span>Size:</span> 12" x--}}
{{--                                                                                13"</p>--}}
{{--                                                                            <p><span>Application:</span>--}}
{{--                                                                                Lights/Darks</p>--}}
{{--                                                                            <p><span>Ink Type:</span>--}}
{{--                                                                                Rhinestone</p>--}}
{{--                                                                            <div--}}
{{--                                                                                class="instruction-discp">--}}
{{--                                                                                <h5>Rhinestone--}}
{{--                                                                                    Application--}}
{{--                                                                                    Instructions</h5>--}}
{{--                                                                                <ul>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Set temperature at 327 degrees Fahrenheit.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Set pressure at medium to heavy.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Remove the white plastic backing from the transfer.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Place the transfer face up on the fabric.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Press for 13 seconds.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Let cool for several minutes and peel off the plastic very slowly.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                    <li>--}}
{{--                                                                                        <p>Press again directly on the design for 5 seconds.</p>--}}
{{--                                                                                    </li>--}}
{{--                                                                                </ul>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="shirt-dots">--}}
{{--                                                            <figure>--}}
{{--                                                                <img src="{{asset('images/30.png')}}" class="img-fluid"--}}
{{--                                                                     alt="">--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> USA FLAG GANG SHEET <span--}}
{{--                                                                    class="d-block">(6PCS)</span></p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p> Item #: A9902D--}}
{{--                                                            <span> Size: 3.5" x 2.2"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$3.49</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$3.19</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$2.74</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.99</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="item">--}}
{{--                                                            <div class="shirt-dots">--}}
{{--                                                                <figure>--}}
{{--                                                                    <img src="{{asset('images/31.png')}}"--}}
{{--                                                                         class="img-fluid" alt="">--}}
{{--                                                                </figure>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> WE SERVE RED LINE <span--}}
{{--                                                                    class="d-block">PKT</span></p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p>Item #: A4528B--}}
{{--                                                            <span>Size: 3.6" x 2"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$1.95</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.65</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.20</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$0.65</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="shirt-dots">--}}
{{--                                                            <figure>--}}
{{--                                                                <img src="{{asset('images/32.png')}}" class="img-fluid"--}}
{{--                                                                     alt="">--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> PEOPLE SKILLS</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p>Item #: A10517C--}}
{{--                                                            <span> Size: 10" x 3.5"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$2.59</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$2.29</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.84</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.29</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="shirt-dots">--}}
{{--                                                            <figure>--}}
{{--                                                                <img src="{{asset('images/33.png')}}" class="img-fluid"--}}
{{--                                                                     alt="">--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> SUGAR SKULLS WITH <span--}}
{{--                                                                    class="d-block">FLOWERS</span></p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p>Item #: A5450G--}}
{{--                                                            <span> Size: 9" x 9"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$3.46</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$3.16</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$2.71</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$0.99</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="shirt-dots">--}}
{{--                                                            <figure>--}}
{{--                                                                <img src="{{asset('images/34.png')}}" class="img-fluid"--}}
{{--                                                                     alt="">--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> PAT ON BACK</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p> Item #: A11060F--}}
{{--                                                            <span> Size: 9" x 8.5"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$2.29</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.99</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.54</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$0.99</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="item">--}}
{{--                                                            <div class="shirt-dots">--}}
{{--                                                                <figure>--}}
{{--                                                                    <img src="{{asset('images/35.png')}}"--}}
{{--                                                                         class="img-fluid" alt="">--}}
{{--                                                                </figure>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> PEOPLE PERSON</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p>Item #: A11086C--}}
{{--                                                            <span>Size: 9.5" x 3"</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$2.29</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.99</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.54</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$0.99</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="shirt-dots">--}}
{{--                                                            <figure>--}}
{{--                                                                <img src="{{asset('images/36.png')}}" class="img-fluid"--}}
{{--                                                                     alt="">--}}
{{--                                                            </figure>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> FREEDOM ISN'T GIVEN ... <span--}}
{{--                                                                    class="d-block">IS WON</span></p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-size">--}}
{{--                                                        <p>Item #: A11255E--}}
{{--                                                            <span> Size: 10 x 9</span>--}}
{{--                                                            Help--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-sale">--}}
{{--                                                        <ul>--}}
{{--                                                            <li>--}}
{{--                                                                <span>1</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>2-5</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>6-11</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>12+</span>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <span>$2.72</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$2.42</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$1.97</span>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <span>$0.99</span>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="stock-cart">--}}
{{--                                                        <div class="item-size">--}}
{{--                                                            <p>Availability: In Stock--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cart-btn">--}}
{{--                                                        <div class="quantity-btn">--}}
{{--                                                            <label for="quantity">Qty--}}
{{--                                                            </label>--}}
{{--                                                            <input type="number" id="quantity" name="quantity"--}}
{{--                                                                   min="1" max="100">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="heart-cart">--}}
{{--                                                            <a href="#" class="btn btn-black">Add To Cart</a>--}}
{{--                                                            <a href="#"><i--}}
{{--                                                                    class="fa-regular fa-heart"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
{{--    <script type="text/javascript">--}}
{{--        @foreach ($products as $product)--}}
{{--            new Swiper(".mySwiper_{{$product->id}}", {--}}
{{--                spaceBetween: 10,--}}
{{--                navigation: {--}}
{{--                    nextEl: ".swiper-button-next",--}}
{{--                    prevEl: ".swiper-button-prev",--}}
{{--                },--}}
{{--                thumbs: {--}}
{{--                    swiper: swiper,--}}
{{--                },--}}
{{--            });--}}
{{--        @endforeach--}}
{{--    </script>--}}
@endsection
