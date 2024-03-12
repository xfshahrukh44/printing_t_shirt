@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->

    <section class="banner inner-banner" style="background-image: url({{ asset('images/banner.png') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li>
                            <img src="{{ asset('images/1-star.png') }}" alt="">
                        </li>
                        <li>
                            <div class="banner-content">
                                <div class="section-heading">
                                    <h1 class="red">{{ $product_detail->product_title }}</h1>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('images/1-star.png') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($product_detail->image) }}" class="w-100" alt="">
                </div>
                <div class="col-md-6 conpad text-left">
                    <form class="h-100 d-flex flex-column justify-content-center align-items-start" method="post"
                        action="{{ route('save_cart') }}" id="add-cart">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_detail->id }}">
                        <h1 class="product_title">{{ $product_detail->product_title }}</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quod ea voluptatibus atque dolorum
                            ad quo, pariatur iure iste, ullam labore facilis sint fugit laboriosam ex dolores! Sunt,
                            delectus vero.</p>
                        <p class="price">$ {{ $product_detail->price }}</p>

                        @foreach ($att_model as $att_models)
                            <div class="variation">
                                <h2>{{ $att_models->attribute->name }}</h2>
                                @php
                                    $pro_att = \App\ProductAttribute::where(['attribute_id' => $att_models->attribute_id, 'product_id' => $product_detail->id])->get();
                                @endphp
                                <select name="variation[{{ $att_models->attribute->name }}]">
                                    @foreach ($pro_att as $pro_atts)
                                        <option value="{{ $pro_atts->attributesValues->id }}">
                                            {{ $pro_atts->attributesValues->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                        <div class="qty">
                            <span class="minus bg-dark">-</span>
                            <input type="number" id="addcount" class="count" name="qty" value="1">
                            <span class="plus bg-dark">+</span>
                        </div>


                        <a id="addCart" class="qty btn btnDonate" href="javascript:void(0)" class="nav-link btn btn-red"
                            id="addCart">Add
                            To
                            Cart</a>

                    </form>
                </div>
            </div>
        </div>

    </section>



    <div class="description">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h1>Description</h1>
                        <?= html_entity_decode($product_detail->description) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="realted-product pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <h1>Related Products</h1>
                </div>
                @foreach ($shop as $shops)
                    <div class="col-lg-3 col-lg-4 col-md-6">
                        <div class="shop-box">
                            <figure>
                                <img src="{{ asset($shops->image) }}" alt="">
                            </figure>
                            <h6>{{ $shops->product_title }}</h6>
                            <div class="stars">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <ul>
                                <li>
                                    <h5>${{ $shops->price }}</h5>
                                </li>
                                <li>
                                    <a href="{{ route('shopDetail', $shops->id) }}">Add to cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- BODY END HERE -->
    <!-- ============================================================== -->
@endsection
@section('css')
    <style>
        h1.red {
            font-size: 70px;
        }

        section.main-pro-dtail {
            padding: 100px 0px;
        }

        .variation h2 {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
        }

        .variation {
            padding: 0px 0px 20px 0px;
        }

        .wunty-check h1 {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .variation select {
            width: 100%;
            height: 36px;
            padding: 0px 10px;
            text-transform: capitalize;
            font-weight: 400;
        }

        .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px;
            min-width: 35px;
            text-align: center;
        }

        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
        }

        .qty .minus {
            cursor: pointer;
            display: inline-block;

            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }

        .minus:hover {
            background-image: -webkit-linear-gradient(-180deg, rgb(254, 109, 14) 0%, rgb(253, 66, 23) 100%);
        }

        .plus:hover {
            background-image: -webkit-linear-gradient(-180deg, rgb(254, 109, 14) 0%, rgb(253, 66, 23) 100%);
        }

        input.count {
            border: 0;
            width: 2%;
        }

    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', "#addCart", function(e) {
            console.log($('#addcount').val())
            $('#add-cart').submit();
        });

        $(document).on('keydown keyup', ".qty", function(e) {
            if ($(this).val() <= 1) {
                e.preventDefault();
                $(this).val(1);
            }
        });
        $(document).ready(function() {
            $(document).on('click', '.plus', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.minus', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>
@endsection
