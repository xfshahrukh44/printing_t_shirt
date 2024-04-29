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
                                        <ul>
                                            <li class="category-mian-li">
                                                <a href="#" id="btn_all_categories">
                                                    <i class="fa-solid fa-angle-right"></i>
                                                    All
                                                </a>
                                            </li>

                                        </ul>
                                        @foreach($subcategories as $subcategory)
                                            <ul>
                                                <li class="category-mian-li">
                                                    <a href="javascript:;">
                                                        <i class="fa-solid fa-angle-right"></i>
                                                        {{$subcategory->subcategory}}
                                                    </a>

                                                    @if (count($subcategory->child_sub_categories))
                                                        <span>{{count($subcategory->child_sub_categories)}}</span>
                                                        <div class="category-hover" data-sub="{{$subcategory->id}}">
                                                            <ul>
                                                                @foreach($subcategory->child_sub_categories as $child_sub_category)
                                                                    @if($child_sub_category->products->isNotEmpty())
                                                                        <li class="li_child_sub_category" data-child="{{$child_sub_category->id}}">
                                                                            <a href="#" data-sub="{{$subcategory->id}}" data-child="{{$child_sub_category->id}}" class="anchor_child_sub_category">
                                                                                <i class="fa-solid fa-angle-right"></i>
                                                                                {{$child_sub_category->childsubcategory}}
                                                                            </a>
                                                                        </li>
                                                                    @endif
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
                                            @if(count($product->product_prices) > 0)
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

                                                            {{--pricing--}}
                                                            @php
                                                                if (count($product->product_prices) == 4) {
                                                                    $ul_class = '';
                                                                } else if (count($product->product_prices) == 2) {
                                                                    $ul_class = 'class="two-field"';
                                                                } else if (count($product->product_prices) == 3) {
                                                                    $ul_class = 'class="three-field"';
                                                                } else if (count($product->product_prices) == 5) {
                                                                    $ul_class = 'class="five-field"';
                                                                }
                                                            @endphp
                                                            <div class="item-sale">
                                                                <ul {!! $ul_class !!}>
                                                                    @foreach($product->product_prices as $product_price)
                                                                        <li>
                                                                            <span>{{$product_price->min}} {{$product_price->max == 99999999999999 ? '+' : '-'}} {{$product_price->max == 99999999999999 ? '' : $product_price->max}}</span>
                                                                        </li>
                                                                    @endforeach

                                                                    @foreach($product->product_prices as $product_price)
                                                                        <li>
                                                                            <span>${{$product_price->rate}}</span>
                                                                        </li>
                                                                    @endforeach
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
                                                                        <a href="{{route('add.product.to.favourites', $product->id)}}">
                                                                            <i class="fa-{{in_array($product->id, session()->get('favourite_products')) ? 'solid' : 'regular'}} fa-heart"></i>
                                                                        </a>
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
                                                                                     {{--                                                                                 class="swiper mySwiper4 mySwiper_{{$product->id}}">--}}
                                                                                     class="swiper ms4_{{$product->id}}">
                                                                                    <div
                                                                                        class="swiper-wrapper change-img">
                                                                                        <div
                                                                                            class="swiper-slide off-white-back">
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
                                                                                     {{--                                                                                 class="swiper mySwiper3 select-img-slides">--}}
                                                                                     class="swiper select-img-slides ms3_{{$product->id}}">
                                                                                    <div class="swiper-wrapper">
                                                                                        <div
                                                                                            class="swiper-slide off-white-back">
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
                                            @else
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
                                                                    <div class="item">
                                                                        <div class="shirt-dots">
                                                                            <figure>
                                                                                <img src="{{asset( $product->image ?? 'images/default.png')}}" class="img-fluid" alt="">
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
                                                                    <p> {{$product->product_title}} <span class="d-block">Here</span></p>
                                                                </div>
{{--                                                                <div class="box-col">--}}
{{--                                                                    <span>.</span>--}}
{{--                                                                    <span>.</span>--}}
{{--                                                                    <span>.</span>--}}
{{--                                                                </div>--}}
                                                            </div>
                                                            <div class="prod-price">
                                                                <h6>${{$product->price}}</h6>
                                                                <div class="cart-icon">
                                                                    <a href="{{route('add.product.to.favourites', $product->id)}}"><i class="fa-solid fa-heart" {!! in_array($product->id, session()->get('favourite_products')) ? 'style="color: white !important; background: #f76c68 !important;"' : '' !!}></i></a>
                                                                    <a href="{{route('product.detail2', $product->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="mt-4">
                                        {{ $products->links() }}
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
    <script type="text/javascript">
        @foreach ($products as $product)
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
        $(document).ready(function () {
            $('#override_for_2').remove();

            $('.anchor_child_sub_category').on('click', function () {
                $('#subcategory').val($(this).data('sub'));
                $('#childsubcategory').val($(this).data('child'));
                $('#form_product_search').submit();
            });

            $('#btn_all_categories').on('click', function () {
                $('#query').val("");
                $('#subcategory').val("");
                $('#childsubcategory').val("");
                $('#form_product_search').submit();
            });

            if ($('#childsubcategory').val() != "") {
                $('.category-hover[data-sub="' + $('#subcategory').val() + '"]').slideToggle('fast');
                $('.li_child_sub_category[data-child="' + $('#childsubcategory').val() + '"]').css('background', '#07c4f4');
            }
        });
    </script>
@endsection
