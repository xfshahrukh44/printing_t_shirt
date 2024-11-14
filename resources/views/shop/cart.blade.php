@extends('layouts.main')

@section('css')
    <style>

    </style>
@endsection


@section('content')
    <section class="cart-pg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-main">
                        <div class="categories-main">
                            <h3>Shopping Cart </h3>
                        </div>
                        <div class="yellow-back">
                            <p><img src="images/38.png" class="img-fluid" alt=""> We require a minimum order amount of
                                $15. Please add product to your cart to meet
                                this amount.</p>
                            <p> Add $95.13 of products for free US shipping.</p>
                        </div>
                        <div class="main-cart-disc">
                            @if(empty($cart))
                            <p>Your cart is empty.</p>
                            @else
                            <div class="row">
                                <div class="col-lg-9">
                                    <form action="{{ route('update_cart') }}" method="post" id="update-cart">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="type" id="type" value="">
                                        <?php $subtotal = 0;
                                        $addon_total = 0;
                                        $total_variation = 0; ?>

                                        {{--loop--}}
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($cart as $key => $value)
                                            @php
                                                $count = $count + 1;
                                                $prod_image = App\Product::where('id', $value['id'])->first();
                                            @endphp
                                            <div class="cart-quantity">
                                                <div class="random-items">
                                                    <div class="items-no">
                                                        <h6>Item</h6>
                                                    </div>
                                                    <div class="items-img">
                                                        <figure>
                                                            <img style="width: 200px;" src="{{ asset($prod_image->image) }}" class="img-fluid" alt="">
                                                        </figure>
                                                        <div class="clear-black-img">
{{--                                                            <h5>RANDOM RHINESTONE CLEAR <span class="d-block">Item#A9086F</span>--}}
                                                            <h5>{{ $value['name'] }} - <b>${{ $value['baseprice'] }}</b></h5>
                                                            @if(!is_null($value['color']))
                                                                <div class="row">
                                                                    <div class="col-6">Color:</div>
                                                                    <div class="col-6">
                                                                        <h5><div style="width: 40px; height: 40px; background: {{$value['color']}};"></div> </h5>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <br>
                                                            @if (count($value['variation'] ?? []))
                                                                <h6> <b>Variations</b> </h6>
                                                            @endif
                                                            @foreach ($value['variation'] as $key => $values)
                                                                <p class="m-0"> {{ $values['attribute'] }} - {{ $values['attribute_val'] }} - <b>${{ $values['attribute_price'] }}</b></p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-city">
                                                    <div class="listed-items">
                                                        <div class="items-no">
                                                            <h6>Price</h6>
                                                            <?php $t_var = 0;?>
                                                            @foreach ($value['variation'] as $key => $values)
                                                                <?php $t_var += $values['attribute_price']; ?>
                                                            @endforeach
                                                        </div>
                                                        <div class="items-no">
                                                            <h6>Qty</h6>
                                                        </div>
                                                        <div class="items-no">
                                                            <h6>Subtotal</h6>
                                                        </div>
                                                        <div class="items-no">
                                                            <h6>Remove</h6>
                                                        </div>
                                                    </div>
                                                    <div class="quntity-items">
                                                        <div class="total-price">
                                                            <h6>${{$value['baseprice'] + $t_var}}</h6>
                                                        </div>
                                                        <div class="total-price current-item">
{{--                                                            <input style="width: inherit;" type="number" id="{{ 'counter ' . $count }}" name="quantity" min="1" max="100">--}}
                                                            <input style="width: inherit;" type="number" id="{{ 'counter ' . $count }}" name="row[]" value="{{ $value['qty'] }}" min="1" max="100">
                                                            {{--                                                    <button type="submit" class="btn"><i class="fa-solid fa-arrows-rotate"></i></button>--}}
                                                        </div>
                                                        <div class="total-price">
                                                            <h6 style="margin-left: 10px;">${{($value['baseprice'] + $t_var) * $value['qty']}}</h6>

                                                        </div>
                                                        <div class="total-price">
                                                            <a href="javascript:void(0)" onclick="window.location.href='{{ route('remove_cart', [$value['id']]) }}'" style="color: red;">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" id="" value="<?php echo $value['id']; ?>">
                                            <?php $subtotal += $value['baseprice'] * $value['qty'];
                                            $total_variation += $value['variation_price']; ?>
                                        @endforeach

{{--                                        <div class="cart-quantity">--}}
{{--                                            <div class="random-items">--}}
{{--                                                <div class="items-no">--}}
{{--                                                    <h6>Item</h6>--}}
{{--                                                </div>--}}
{{--                                                <div class="items-img">--}}
{{--                                                    <figure>--}}
{{--                                                        <img src="images/29.png" class="img-fluid" alt="">--}}
{{--                                                    </figure>--}}
{{--                                                    <div class="clear-black-img">--}}
{{--                                                        <h5>RANDOM RHINESTONE CLEAR <span class="d-block">Item--}}
{{--                                                                          #A9086F</span>--}}
{{--                                                        </h5>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="price-city">--}}
{{--                                                <div class="listed-items">--}}
{{--                                                    <div class="items-no">--}}
{{--                                                        <h6>Price</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="items-no">--}}
{{--                                                        <h6>Qty</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="items-no">--}}
{{--                                                        <h6>Subtotal</h6>--}}
{{--    --}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="quntity-items">--}}
{{--                                                    <div class="total-price">--}}
{{--                                                        <h6>$3.87</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="total-price current-item">--}}
{{--                                                        <input style="width: inherit;" type="number" id="quantity" name="quantity" min="1" max="100">--}}
{{--    --}}{{--                                                    <button type="submit" class="btn"><i class="fa-solid fa-arrows-rotate"></i></button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="total-price">--}}
{{--                                                        <h6>$3.87</h6>--}}
{{--    --}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="last-btn">
                                            <div class="back-btn">
                                                <a href="{{url()->previous()}}" class="btn light-blue-btn"><i class="fa-solid fa-chevron-left"></i> Continue Shopping</a>
                                            </div>
                                            <div class="back-btn">
                                                <a href="{{route('clear_cart')}}" class="btn light-blue-btn"> Clear Shopping Cart</a>
                                                <a href="#" class="btn light-blue-btn btn_update_shopping_cart"> <i class="fa-solid fa-arrows-rotate"></i> Update Shopping Cart </a>
                                                <!--<a href="#" class="btn light-blue-btn"> <i class="fa-solid fa-arrows-rotate"></i> Delete Multiple Items</a>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-3">
                                    <div class="checkout-side-bar">


                                        <div class="summary-bar">
                                            <button type="submit" class="btn light-blue-btn btn_proceed_to_checkout">Proceed to
                                                Checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
            $('.btn_update_shopping_cart').on('click', function (e) {
                e.preventDefault();

                $('#update-cart').submit();
            });

            $('.btn_proceed_to_checkout').on('click', function (e) {
                e.preventDefault();

                window.location.href = '{{route('checkout')}}';
            });
        });
    </script>
@endsection
