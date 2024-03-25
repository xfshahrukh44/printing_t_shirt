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
        $(document).ready(function () {
            $('#form_product_search').append(`<input type="hidden" name="override_for_2" id="override_for_2" value="1">`);

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
                // $('.category-hover[data-sub="' + $('#subcategory').val() + '"]').attr('style', 'display: block!important;');
            }
        });
    </script>
@endsection
