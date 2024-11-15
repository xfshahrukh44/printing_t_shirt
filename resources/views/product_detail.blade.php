@extends('layouts.main')

@section('css')
<style>



.inner-drop {
    padding-left:1rem;
    display:none;
}
.inner-drop-2 {
    padding-left:1rem;
    display:none;
}


.cart-btn a.btn.btn-custom {
    color: #c0c0c0;
    border: 1px solid #c0c0c0;
    border-radius: 0;
    width: 100% !important;
    padding: 12px 0px;
    margin-top: 16px;
}

.inner-product-details select {
    background-color: transparent;
    width: 100% !important;
    color: #c0c0c0;
    border-radius: unset;
    height: 50px !important;
}

.inner-product-details button {
    background-color: transparent;
    width: 100% !important;
    color: #c0c0c0;
    border-radius: unset;
    height: 50px !important;
    border: 1px solid #c0c0c0;
}


table{

    color:#fff;

}

tbody, th, td{
        border:1px solid #fff;
        padding:5px;
}

p{
    color:#fff;
}

dl, ol, ul {
    margin-top: 0;
    margin-bottom: 1rem;
    color: #fff !important;
}

h2{
    display:none;
}

h3 strong{
    color:#fff !important;
}

.activeee{
   background:#000;
   color:#fff;
   border:1px solid #fff;

}


.activee{

    background:#000;
    color:#fff;
    border:1px solid #fff;

}

</style>
@endsection


@section('content')
    <section class="porduct-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-pro-slides">
                        <div class="slides-swiper">
                            <h1>{{$product->product_title}}</h1>
                            @php
                                $product_images = DB::table('product_imagess')
                                  ->where('product_id', $product->id)
                                  ->orderBy('id', 'DESC')
                                  ->get();
                            @endphp
                        </div>
{{--                        <div class="slides-star">--}}
{{--                            <div class="star-icon">--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                            </div>--}}
{{--                            <p><a href="#"> 50 Reviews </a> <a href="#">Write a Review</a> Item #MP350</p>--}}
{{--                        </div>--}}
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                             class="swiper mySwiper2">
                            <div class="swiper-wrapper change-img">
                                <div class="swiper-slide">
                                    <img src="{{asset( $product->image)}}" />
                                </div>
                                @foreach($product_images as $product_image)
                                    <div class="swiper-slide">
                                        <img src="{{asset( $product_image->image)}}" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{asset( $product->image)}}" />
                                </div>
                                @foreach($product_images as $product_image)
                                    <div class="swiper-slide">
                                        <img src="{{asset( $product_image->image)}}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="productg-price">
                        <div class="starting-price">
                            <h4><span class="d-block"></span>${{$product->price}}</h4>
                        {{--<h5><span class="d-block">Regular Price</span>$1,299.00</h5>--}}
                        </div>
                        <div class="info-product">
                            @php
                                $description = str_replace('<img src="/media', '<img src="https://www.proworldinc.com/media', html_entity_decode($product->description));
                                $description = str_replace('href="/media', 'href="https://www.proworldinc.com/media', $description);
                            @endphp

                            {!! $description !!}
                        </div>
                        <form action="{{route('save_cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">

                            <div class="stock-price">
                                <p>In Stock - Available for immediate delivery</p>
                                <div class="quantity-btn">
                                    <label for="quantity">Qty
                                    </label>
                                    <input type="number" id="quantity" name="qty" min="1" max="100" value="1">
                                </div>
                                @php
                                    $colors = (isset($product) && !is_null($product->colors)) ? json_decode($product->colors) : [];
                                @endphp
                                @if(count($colors))
                                    <label for="">Select color</label>
                                    <select name="color" id="select_color" class="" required>
                                        @foreach($colors as $key => $color)
                                            <option value="{{$color}}" style="background: {{$color}};" {!! $key == 0 ? 'selected' : '' !!}></option>
                                        @endforeach
                                    </select>
                                    <div style="width: 40px; height: 40px; background: transparent; border: 4px solid black;" id="div_selected_color"></div>
                                @endif
{{--                                variation--}}
                                <div class="year-btn">
                                    <?php
                                    $productAttributes_id = DB::table('product_attributes')->select('product_id', 'attribute_id')->where('product_id', $product->id)->groupBy('attribute_id')->get();
                                    // dump($productAttributes);
                                    ?>
                                    @foreach($productAttributes_id as $key => $val_product_attribute)

                                        <h6> {{ App\Attributes::find($val_product_attribute->attribute_id)->name }} </h6>

                                        <?php

                                        $get_attribute_values = DB::table('product_attributes')->where('attribute_id',$val_product_attribute->attribute_id)->where('product_id',$val_product_attribute->product_id)->get();

                                        ?>

                                        @foreach($get_attribute_values as $key2 => $val_attr_value)
                                            <input class="btn" type="radio" id="{{$key . '_' . $key2}}" name="variation[{{ App\Attributes::find($val_product_attribute->attribute_id)->name }}]" value="{{ $val_attr_value->value }}" required>
                                            <label for="{{$key . '_' . $key2}}">{{ App\AttributeValue::find($val_attr_value->value)->value }}</label><br>
                                        @endforeach

                                    @endforeach
                                </div>
                                <button class="btn light-blue-btn" type="submit">ADD TO CART</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="featured-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-tabs-info">
                        <div class="change-tabs">
                            <button class="clicktabs" onclick="opentabs(event , 'info1')"
                                    id="showonly">Details</button>
{{--                            <button class="clicktabs" onclick="opentabs(event , 'info2')">Reviews (50)</button>--}}
                        </div>
                        <div class="feature-details">
                            <div class="changetabs" id="info1">
                                <div class="row">
                                    {!! $product->additional_information !!}
                                </div>
                            </div>
                            <div class="changetabs" id="info2">
                                <div class="testimonals">
                                    <div class="reviews-info">
                                        <h4>Customer Reviews</h4>
                                    </div>
                                    <div class="show-reviews">
                                        <div class="points-reviews">
                                            <div class="reviewsss">
                                                <h4>4.6</h4>
                                            </div>
                                            <div class="reviewsss-star">
                                                <div class="star-icon">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="star-count">
                                                    <p>50 reviews</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-range">
                                            <a href="javascript:;">5 stars <div class="yellow-line"></div> 66%
                                                (33)</a>
                                            <a href="javascript:;">4 stars <div class="yellow-line"></div> 28%
                                                (14)</a>
                                            <a href="javascript:;">3 stars <div class="yellow-line"></div> 0%
                                                (0)</a>
                                            <a href="javascript:;">2 stars <div class="yellow-line"></div> 0%
                                                (0)</a>
                                            <a href="javascript:;">1 star <div class="yellow-line"></div> 6%
                                                (3)</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="show-five">
                                    <p>Top customer reviews with 5 stars | <a href="#">Show All</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slides-swiper">
                        <h1>Related Products</h1>
                    </div>
                </div>
                @foreach($related_products as $product)
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
                                            @php
                                                $colors = (isset($product) && !is_null($product->colors)) ? json_decode($product->colors) : [];
                                            @endphp
                                            <div class="box-col">
                                                @foreach($colors as $color)
                                                    <span style="background: {{$color}} !important; color: {{$color}} !important;" data-color="{{$color}}" class="span_select_color" title="Select color">.</span>
                                                @endforeach
                                            </div>
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
                                    <form class="form_save_cart" action="{{route('save_cart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="color" class="color" value="">
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
                                                @if (Auth::user() && Auth::user()->role != 1)
                                                  @php
                                                  $isFavorite = App\Models\Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
                                                  $check_f = $isFavorite->favorite == 1 ? 0 : 1;
                                                  @endphp
                                                    <a href="{{ route('add.product.to.favourites', ['product_id' => $product->id, 'fav' => $check_f]) }}">
                                                        <i class="fa-{{ ($isFavorite->favorite == 1) ? 'solid' : 'regular'}} fa-heart"></i>
                                                    </a>
                                                  @else
                                                  <a href="{{route('signin')}}">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </a>
                                                @endif
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
                                        @php
                                            $colors = (isset($product) && !is_null($product->colors)) ? json_decode($product->colors) : [];
                                        @endphp
                                        <div class="box-col">
                                            @foreach($colors as $color)
                                                <span style="background: {{$color}} !important; color: {{$color}} !important;">.</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="prod-price">
                                        <h6>${{$product->price}}</h6>
                                        <div class="cart-icon">
                                            <a href="{{route('add.product.to.favourites', $product->id)}}"><i class="fa-solid fa-heart" {!! in_array($product->id, (session()->get('favourite_products') ?? [])) ? 'style="color: white !important; background: #f76c68 !important;"' : '' !!}></i></a>
                                            <a href="{{route('product.detail2', $product->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
<script type="text/javascript">


$(document).ready(function () {
    $(".inner-shop").click(function () {
        $(".inner-drop").show()
    })

    $('#select_color').on('change', function () {
        if ($(this).find('option:selected').val() != "") {
            $('#div_selected_color').css('background', $(this).find('option:selected').val());
        }
    });

    $('#select_color').trigger('change');

    $('body').on('click', '.span_select_color', function () {
        $(this).parent().find('span').each((i, item) => {
            $(item).css('border', '4px solid transparent');
        });
        $(this).css('border', '4px solid black');

        toastr.success('Color selected!');
        $(this).parent().parent().parent().parent().find('.color').val($(this).data('color'));
    })

    $('.form_save_cart').on('submit', function (e) {
        if ($(this).find('.color').val() == "") {
            e.preventDefault();
            toastr.error('Please select a color first.');
        } else {
            $(this).submit();
        }
    });
});

$(document).ready(function () {
    $(".inner-shop-2").click(function () {
        $(".inner-drop-2").show()
    })
});


 function opencity(evt, cityName) {

       var a, cycleinfo, clicktabs;

       cycleinfo = document.getElementsByClassName("cycleinfo");

       for (i = 0; i < cycleinfo.length; i++) {
            cycleinfo[i].style.display = "none";
       }
       clicktabs = document.getElementsByClassName("clicktabs");
       for (i = 0; i < clicktabs.length; i++) {
            clicktabs[i].className = clicktabs[i].className.replace("activee", " ")
       }
       document.getElementById(cityName).style.display = "block";
       evt.currentTarget.className += " activee"
  }

</script>
@endsection
