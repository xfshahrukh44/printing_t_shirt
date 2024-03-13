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
                                <div class="categories-main-right">
                                    <div class="row">
                                        @foreach($products as $product)
                                            @php
                                                $product_images = DB::table('product_imagess')
                                                  ->where('product_id', $product->id)
                                                  ->orderBy('id', 'DESC')
                                                  ->get();
                                            @endphp
                                            <div class="col-lg-3">
                                                <div class="product-slider">
                                                    <div class="shirt-slides">
                                                        <a href="{{route('product.detail2', $product->id)}}">
                                                            <div class="product-carousel owl-carousel owl-theme">
                                                                @foreach($product_images as $product_image)
                                                                    <div class="item">
                                                                        <div class="shirt-dots">
                                                                            <figure>
                                                                                <img src="{{asset( $product_image->image)}}" class="img-fluid" alt="">
                                                                            </figure>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
{{--                                                                <div class="item">--}}
{{--                                                                    <div class="shirt-dots">--}}
{{--                                                                        <figure>--}}
{{--                                                                            <img src="{{asset($product->image)}}" class="img-fluid" alt="">--}}
{{--                                                                        </figure>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="item">--}}
{{--                                                                    <div class="shirt-dots">--}}
{{--                                                                        <figure>--}}
{{--                                                                            <img src="{{asset($product->image)}}" class="img-fluid" alt="">--}}
{{--                                                                        </figure>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="product-discription">
                                                        <div class="rainbow-col">
                                                            <div class="pro-name">
                                                                <p> {{$product->product_title}} <span class="d-block">Here</span></p>
                                                            </div>
                                                            <div class="box-col">
                                                                <span>.</span>
                                                                <span>.</span>
                                                                <span>.</span>
                                                            </div>
                                                        </div>
                                                        <div class="prod-price">
                                                            <h6>$ 35</h6>
                                                            <div class="cart-icon">
                                                                <a href="#"><i class="fa-solid fa-heart"></i></a>
                                                                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
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
{{--                                                        <div class="product-carousel owl-carousel owl-theme">--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/10.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/11.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/10.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> Product Name Goes <span class="d-block">Here</span></p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="box-col">--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="prod-price">--}}
{{--                                                        <h6>$ 35</h6>--}}
{{--                                                        <div class="cart-icon">--}}
{{--                                                            <a href="#"><i class="fa-solid fa-heart"></i></a>--}}
{{--                                                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="product-carousel owl-carousel owl-theme">--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/11.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/10.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/11.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> Product Name Goes <span class="d-block">Here</span></p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="box-col">--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="prod-price">--}}
{{--                                                        <h6>$ 35</h6>--}}
{{--                                                        <div class="cart-icon">--}}
{{--                                                            <a href="#"><i class="fa-solid fa-heart"></i></a>--}}
{{--                                                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="product-carousel owl-carousel owl-theme">--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/10.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/11.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/10.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> Product Name Goes <span class="d-block">Here</span></p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="box-col">--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="prod-price">--}}
{{--                                                        <h6>$ 35</h6>--}}
{{--                                                        <div class="cart-icon">--}}
{{--                                                            <a href="#"><i class="fa-solid fa-heart"></i></a>--}}
{{--                                                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="product-slider">--}}
{{--                                                <div class="shirt-slides">--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <div class="product-carousel owl-carousel owl-theme">--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/11.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/10.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="item">--}}
{{--                                                                <div class="shirt-dots">--}}
{{--                                                                    <figure>--}}
{{--                                                                        <img src="{{asset('images/11.png')}}" class="img-fluid" alt="">--}}
{{--                                                                    </figure>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="product-discription">--}}
{{--                                                    <div class="rainbow-col">--}}
{{--                                                        <div class="pro-name">--}}
{{--                                                            <p> Product Name Goes <span class="d-block">Here</span></p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="box-col">--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                            <span>.</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="prod-price">--}}
{{--                                                        <h6>$ 35</h6>--}}
{{--                                                        <div class="cart-icon">--}}
{{--                                                            <a href="#"><i class="fa-solid fa-heart"></i></a>--}}
{{--                                                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>--}}
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
    <script type="text/javascript"></script>
@endsection
