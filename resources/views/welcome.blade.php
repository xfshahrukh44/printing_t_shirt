@extends('layouts.main')

@section('css')
    <style>

    </style>
@endsection


@section('content')

    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->

    <section class="home-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="digital-print"
                         style="background-image: url({{asset($page->sections[0]->value ?? '')}}) !important;">
                        {{--                        <div class="down-top" data-aos="fade-down" data-aos-duration="2000">--}}
                        {{--                             <h1>Digital Printing T Shirt</h1>--}}
                        {{--                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                        {{--                                  incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>--}}
                        {{--                             <a href="#" class="btn light-blue-btn">--}}
                        {{--                                  <div class="rotate-z">Send Message</div>--}}
                        {{--                             </a>--}}
                        {{--                         </div>--}}

                        {!! $page->sections[1]->value ?? '' !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="digital-art">
                        <div class="row  align-items-center">
                            <div class="col-lg-6">
                                {{--                                   <div class="save-t-shirt" data-aos="fade-right" data-aos-duration="2000">--}}
                                {{--                                        <h2>Save $50 <span class="d-block">Digital Art T Shirt </span></h2>--}}
                                {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
                                {{--                                             tempor incididunt ut labore et dolore magna aliqua. Quis </p>--}}
                                {{--                                        <a href="#" class="btn light-blue-btn">--}}
                                {{--                                             <div class="rotate-z">Send Message</div>--}}
                                {{--                                        </a>--}}
                                {{--                                   </div>--}}

                                {!! $page->sections[3]->value ?? '' !!}
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <figure>
                                        {{--                                             <img src="{{ asset('images/3.png') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-duration="2000">--}}
                                        <img src="{{asset($page->sections[2]->value ?? '')}}" class="img-fluid" alt=""
                                             data-aos="zoom-in" data-aos-duration="2000">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="digital-art">
                        <div class="row  align-items-center">
                            <div class="col-lg-6">
                                {{--                                   <div class="save-t-shirt" data-aos="fade-right" data-aos-duration="2000">--}}
                                {{--                                        <h2>20% OFF <span class="d-block">Sublimation Products </span></h2>--}}
                                {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
                                {{--                                             tempor incididunt ut labore et dolore magna aliqua. Quis </p>--}}
                                {{--                                        <a href="#" class="btn light-blue-btn">--}}
                                {{--                                             <div class="rotate-z">Send Message</div>--}}
                                {{--                                        </a>--}}
                                {{--                                   </div>--}}

                                {!! $page->sections[5]->value ?? '' !!}
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <figure>
                                        {{--                                             <img src="{{ asset('images/4.png') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-duration="2000">--}}
                                        <img src="{{asset($page->sections[4]->value ?? '')}}" class="img-fluid" alt=""
                                             data-aos="zoom-in" data-aos-duration="2000">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{--                    <div class="categories-main">--}}
                    {{--                         <h3  data-aos="zoom-in" data-aos-duration="2000">Popular Categories</h3>--}}
                    {{--                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                    {{--                              incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>--}}
                    {{--                    </div>--}}

                    {!! $page->sections[6]->value ?? 'Popular Categories' !!}
                    @php
                        $p_c_images = [
                            asset('images/6.png'),
                            asset('images/7.png'),
                            asset('images/8.png'),
                            asset('images/9.png'),
                            asset('images/10.png'),
                            asset('images/11.png'),
                            asset('images/12.png'),
                            asset('images/13.png'),
                            asset('images/65fdccc90ed5e_a12698d.png'),
                            asset('images/65fdce6da275e_A1109C_1.png'),
                            asset('images/14.png'),
                            asset('images/15.png'),
                        ];

                        $popular_categories_1 = [];
                        $popular_categories_2 = [];
                        foreach ($popular_categories as $key => $popular_category) {
                            if ($key < 5) {
                                $popular_categories_1 []= $popular_category;
                            } else {
                                $popular_categories_2 []= $popular_category;
                            }
                        }
                    @endphp

                    <div class="main-art">
                        @foreach($popular_categories_1 as $key => $popular_category)
                            <div class="shirt-art" data-aos="flip-left" data-aos-duration="2000">
                                <a href="#" data-sub="{{$popular_category->subcategory}}"
                                   data-child="{{$popular_category->id}}" class="anchor_child_sub_category">
                                    <div class="shirt-art-img">
                                        <figure>
                                            <img src="{{ $p_c_images[$key] }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                    <div Art T Shirtv class="discription-shirt">
                                        <h6>{{$popular_category->childsubcategory}}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="main-art">
                        @foreach($popular_categories_2 as $key => $popular_category)
                            <div class="shirt-art" data-aos="flip-right" data-aos-duration="2000">
                                <a href="#" data-sub="{{$popular_category->subcategory}}"
                                   data-child="{{$popular_category->id}}" class="anchor_child_sub_category">
                                    <div class="shirt-art-img">
                                        <figure>
                                            <img src="{{ $p_c_images[$key + 5] }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                    <div Art T Shirtv class="discription-shirt">
                                        <h6>{{$popular_category->childsubcategory}}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="slides-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{--                    <div class="categories-main">--}}
                    {{--                         <h3 data-aos="zoom-in" data-aos-duration="2000">Popular Digital Shirt</h3>--}}
                    {{--                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                    {{--                              incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>--}}
                    {{--                    </div>--}}

                    {!! $page->sections[7]->value ?? 'Popular Specialty Materials' !!}

                </div>
                @foreach($popular_specialty_materials as $popular_specialty_material)
                    <div class="col-lg-3">
                        <div class="product-slider" data-aos="fade-down" data-aos-duration="2000">
                            <div class="shirt-slides">
                                <a href="javascript:;">
                                    <div class="shirt-dots" data-bs-toggle="modal"
                                         data-bs-target="#exampleModal_{{$popular_specialty_material->id}}">
                                        <figure>
                                            <img src="{{asset($popular_specialty_material->image)}}" class="img-fluid"
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
                                            {{$popular_specialty_material->product_title}}
                                        </p>
                                        @php
                                            $colors = (isset($popular_specialty_material) && !is_null($popular_specialty_material->colors)) ? json_decode($popular_specialty_material->colors) : [];
                                        @endphp
                                        <div class="box-col">
                                            @foreach($colors as $color)
                                                <span style="background: {{$color}} !important; color: {{$color}} !important;">.</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="item-size">
                                    <p>Item #: {{$popular_specialty_material->sku}}
                                        <span> Size: {{$popular_specialty_material->size}}</span>
                                        Help
                                    </p>
                                </div>

                                {{--pricing--}}
                                @php
                                    if (count($popular_specialty_material->product_prices) == 4) {
                                        $ul_class = '';
                                    } else if (count($popular_specialty_material->product_prices) == 2) {
                                        $ul_class = 'class="two-field"';
                                    } else if (count($popular_specialty_material->product_prices) == 3) {
                                        $ul_class = 'class="three-field"';
                                    } else if (count($popular_specialty_material->product_prices) == 5) {
                                        $ul_class = 'class="five-field"';
                                    }
                                @endphp
                                <div class="item-sale">
                                    <ul {!! $ul_class !!}>
                                        @foreach($popular_specialty_material->product_prices as $product_price)
                                            <li>
                                                <span>{{$product_price->min}} {{$product_price->max == 99999999999999 ? '+' : '-'}} {{$product_price->max == 99999999999999 ? '' : $product_price->max}}</span>
                                            </li>
                                        @endforeach

                                        @foreach($popular_specialty_material->product_prices as $product_price)
                                            <li>
                                                <span>${{$product_price->rate}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="stock-cart">
                                    <div class="item-size">
                                        {{--                                                                <p>Availability: In Stock</p>--}}
                                        <p>Availability: {{$popular_specialty_material->in_stock ? 'In Stock' : 'Not In Stock'}}</p>
                                    </div>
                                </div>
                                <form action="{{route('save_cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$popular_specialty_material->id}}">
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
                                            <a href="{{route('add.product.to.favourites', $popular_specialty_material->id)}}">
                                                <i class="fa-{{in_array($popular_specialty_material->id, session()->get('favourite_products')) ? 'solid' : 'regular'}} fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="modal-produc">

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{$popular_specialty_material->id}}" tabindex="-1"
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
                                                         {{--                                                                                 class="swiper mySwiper4 mySwiper_{{$popular_specialty_material->id}}">--}}
                                                         class="swiper ms4_{{$popular_specialty_material->id}}">
                                                        <div
                                                            class="swiper-wrapper change-img">
                                                            <div
                                                                class="swiper-slide">
                                                                <div
                                                                    class="shirt-dots">
                                                                    <figure>
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
                                                                             class="img-fluid"
                                                                             alt="">
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div thumbsSlider=""
                                                         {{--                                                                                 class="swiper mySwiper3 select-img-slides">--}}
                                                         class="swiper select-img-slides ms3_{{$popular_specialty_material->id}}">
                                                        <div class="swiper-wrapper">
                                                            <div
                                                                class="swiper-slide">
                                                                <div
                                                                    class="shirt-dots">
                                                                    <figure>
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
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
                                                                        <img src="{{asset($popular_specialty_material->image)}}"
                                                                             class="img-fluid"
                                                                             alt="">
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="discription-img-modal">
                                                        {!! $popular_specialty_material->description !!}
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
            </div>
        </div>
    </section>



    <section class="slides-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{--                    <div class="categories-main">--}}
                    {{--                         <h3 data-aos="zoom-in" data-aos-duration="2000">Popular Sublimations</h3>--}}
                    {{--                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                    {{--                              incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>--}}
                    {{--                    </div>--}}

                    {!! $page->sections[8]->value ?? 'Popular Heat Transfers' !!}

                </div>
                @foreach($popular_heat_transfers as $popular_heat_transfer)
                    <div class="col-lg-3">
                        <div class="product-slider" data-aos="fade-down" data-aos-duration="2000">
                            <div class="shirt-slides">
                                <a href="{{route('product.detail2', $popular_heat_transfer->id)}}">
                                    <div class="product-carousel owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="shirt-dots">
                                                <figure>
                                                    <img src="{{asset( $popular_heat_transfer->image ?? 'images/default.png')}}" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        @foreach($product_images as $product_image)
                                            <div class="item">
                                                <div class="shirt-dots">
                                                    <figure>
                                                        <img src="{{asset( $product_image->image ?? 'images/default.png')}}" class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </a>
                            </div>
                            <div class="product-discription">
                                <div class="rainbow-col">
                                    <div class="pro-name">
                                        <p> {{$popular_heat_transfer->product_title}} <span class="d-block">Here</span></p>
                                    </div>
                                    @php
                                        $colors = (isset($popular_heat_transfer) && !is_null($popular_heat_transfer->colors)) ? json_decode($popular_heat_transfer->colors) : [];
                                    @endphp
                                    <div class="box-col">
                                        @foreach($colors as $color)
                                            <span style="background: {{$color}} !important; color: {{$color}} !important;">.</span>
                                        @endforeach
                                    </div>
                                    {{--                                                                <div class="box-col">--}}
                                    {{--                                                                    <span>.</span>--}}
                                    {{--                                                                    <span>.</span>--}}
                                    {{--                                                                    <span>.</span>--}}
                                    {{--                                                                </div>--}}
                                </div>
                                <div class="prod-price">
                                    <h6>${{$popular_heat_transfer->price}}</h6>
                                    <div class="cart-icon">
                                        <a href="{{route('add.product.to.favourites', $popular_heat_transfer->id)}}"><i class="fa-solid fa-heart" {!! in_array($popular_heat_transfer->id, session()->get('favourite_products')) ? 'style="color: white !important; background: #f76c68 !important;"' : '' !!}></i></a>
                                        <a href="{{route('product.detail2', $popular_heat_transfer->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="barnd-logos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="categories-main">
                        <h3 data-aos="zoom-in" data-aos-duration="2000">Collaborative Brands</h3>
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
{{--                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="back-blue-div">
                    <div class="col-lg-12 p-0">
                        <div class="main-carusel">
                            <div class="brand-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/14.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/15.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/16.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/17.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/18.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/19.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/20.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-0">
                        <div class="main-carusel">
                            <div class="brand-carousel2 owl-carousel owl-theme">
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/21.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/22.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/23.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/24.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/16.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/25.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/26.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-0">
                        <div class="main-carusel">
                            <div class="brand-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/14.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/15.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/16.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/17.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/18.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/19.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="shirt-dots">
                                        <figure>
                                            <img src="{{ asset('images/20.png') }}" class="img-fluid" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="categories-main">
                        <h3 data-aos="zoom-in" data-aos-duration="2000">Subscribe to Our Newsletter</h3>
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
{{--                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>--}}
                    </div>
                    <form action="#" id="newForm" method="POST">
                        <div class="emial-letter">
                            <input id="newemail" type="text" name="newsletter_email" class="form-control" placeholder="Your E-mail Address" required>
                            <button type="submit" class="btn light-blue-btn" value=" Subscribe"> Subscribe </button>
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <div id="newsresult"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js')

    <script type="text/javascript">
        @foreach ($popular_specialty_materials as $product)
            var swiper = new Swiper(".ms3_{{$product->id}}", {
                spaceBetween: 10,
                slidesPerView: 6,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".ms4_{{$product->id}}", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        @endforeach
        @foreach ($popular_heat_transfers as $product)
            var swiper = new Swiper(".ms3_{{$product->id}}", {
                spaceBetween: 10,
                slidesPerView: 6,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".ms4_{{$product->id}}", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        @endforeach
    </script>
    <script type="text/javascript">
        $('.anchor_child_sub_category').on('click', function () {
            $('#subcategory').val($(this).data('sub'));
            $('#childsubcategory').val($(this).data('child'));
            $('#form_product_search').submit();
        });
    </script>
@endsection
