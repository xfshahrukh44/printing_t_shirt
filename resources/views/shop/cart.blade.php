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
                                                            @if (count($value['variation']))
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
                                                            <a href="javascript:void(0)" onclick="window.location.href='{{ route('remove_cart', [$value['id']]) }}'" style="margin-left: 44px; color: red;">
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
                                        <div class="back-wt">
                                            <ul class="Subtotal-price">
                                                <li>
                                                    <h5>Summary</h5>
                                                </li>
                                                <li>
                                                    <h6>Subtotal <span>${{ $subtotal }}</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Variations <span>${{ $total_variation }}</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Order Total <span>${{ $subtotal + $total_variation }}</span></h6>
                                                </li>
                                            </ul>

                                            <div class="pm-reward">
                                                <div class="rewards-pm" onclick="showHtmlDiv('showlog1')">
                                                    <span>Use PW Rewards</span>
                                                    <i class="fa-solid fa-chevron-up"></i>
                                                </div>
                                                <div class="log-in-pm" id="showlog1">
                                                    <p> You need to <a href="login.php">Log In </a> to use your points.</p>
                                                </div>
                                            </div>
                                            <div class="pm-reward">
                                                <div class="rewards-pm" onclick="showHtmlDiv('showlog2')">
                                                    <span>Estimate Shipping and Tax</span>
                                                    <i class="fa-solid fa-chevron-up"></i>
                                                </div>
                                                <div class="log-in-pm" id="showlog2">
                                                    <p> Enter your destination to get a shipping estimate.</p>
                                                    <div class="Countryselect">
                                                        <label for="Country">Country</label>

                                                        <select class="select">
                                                            <option value=""> </option>
                                                            <option data-title="Afghanistan" value="AF">Afghanistan
                                                            </option>
                                                            <option data-title="Åland Islands" value="AX">Åland
                                                                Islands</option>
                                                            <option data-title="Albania" value="AL">Albania
                                                            </option>
                                                            <option data-title="Algeria" value="DZ">Algeria
                                                            </option>
                                                            <option data-title="American Samoa" value="AS">American
                                                                Samoa</option>
                                                            <option data-title="Andorra" value="AD">Andorra
                                                            </option>
                                                            <option data-title="Angola" value="AO">Angola</option>
                                                            <option data-title="Anguilla" value="AI">Anguilla
                                                            </option>
                                                            <option data-title="Antarctica" value="AQ">Antarctica
                                                            </option>
                                                            <option data-title="Antigua &amp; Barbuda" value="AG">
                                                                Antigua &amp; Barbuda</option>
                                                            <option data-title="Argentina" value="AR">Argentina
                                                            </option>
                                                            <option data-title="Armenia" value="AM">Armenia
                                                            </option>
                                                            <option data-title="Aruba" value="AW">Aruba</option>
                                                            <option data-title="Australia" value="AU">Australia
                                                            </option>
                                                            <option data-title="Austria" value="AT">Austria
                                                            </option>
                                                            <option data-title="Azerbaijan" value="AZ">Azerbaijan
                                                            </option>
                                                            <option data-title="Bahamas" value="BS">Bahamas
                                                            </option>
                                                            <option data-title="Bahrain" value="BH">Bahrain
                                                            </option>
                                                            <option data-title="Bangladesh" value="BD">Bangladesh
                                                            </option>
                                                            <option data-title="Barbados" value="BB">Barbados
                                                            </option>
                                                            <option data-title="Belarus" value="BY">Belarus
                                                            </option>
                                                            <option data-title="Belgium" value="BE">Belgium
                                                            </option>
                                                            <option data-title="Belize" value="BZ">Belize</option>
                                                            <option data-title="Benin" value="BJ">Benin</option>
                                                            <option data-title="Bermuda" value="BM">Bermuda
                                                            </option>
                                                            <option data-title="Bhutan" value="BT">Bhutan</option>
                                                            <option data-title="Bolivia" value="BO">Bolivia
                                                            </option>
                                                            <option data-title="Bosnia &amp; Herzegovina" value="BA">Bosnia &amp; Herzegovina</option>
                                                            <option data-title="Botswana" value="BW">Botswana
                                                            </option>
                                                            <option data-title="Bouvet Island" value="BV">Bouvet
                                                                Island</option>
                                                            <option data-title="Brazil" value="BR">Brazil</option>
                                                            <option data-title="British Indian Ocean Territory" value="IO">British Indian Ocean Territory</option>
                                                            <option data-title="British Virgin Islands" value="VG">
                                                                British Virgin Islands</option>
                                                            <option data-title="Brunei" value="BN">Brunei</option>
                                                            <option data-title="Bulgaria" value="BG">Bulgaria
                                                            </option>
                                                            <option data-title="Burkina Faso" value="BF">Burkina
                                                                Faso</option>
                                                            <option data-title="Burundi" value="BI">Burundi
                                                            </option>
                                                            <option data-title="Cambodia" value="KH">Cambodia
                                                            </option>
                                                            <option data-title="Cameroon" value="CM">Cameroon
                                                            </option>
                                                            <option data-title="Canada" value="CA">Canada</option>
                                                            <option data-title="Cape Verde" value="CV">Cape Verde
                                                            </option>
                                                            <option data-title="Caribbean Netherlands" value="BQ">
                                                                Caribbean Netherlands</option>
                                                            <option data-title="Cayman Islands" value="KY">Cayman
                                                                Islands</option>
                                                            <option data-title="Central African Republic" value="CF">Central African Republic</option>
                                                            <option data-title="Chad" value="TD">Chad</option>
                                                            <option data-title="Chile" value="CL">Chile</option>
                                                            <option data-title="China" value="CN">China</option>
                                                            <option data-title="Christmas Island" value="CX">
                                                                Christmas Island</option>
                                                            <option data-title="Cocos (Keeling) Islands" value="CC">Cocos (Keeling) Islands</option>
                                                            <option data-title="Colombia" value="CO">Colombia
                                                            </option>
                                                            <option data-title="Comoros" value="KM">Comoros
                                                            </option>
                                                            <option data-title="Congo - Brazzaville" value="CG">
                                                                Congo - Brazzaville</option>
                                                            <option data-title="Congo - Kinshasa" value="CD">Congo
                                                                - Kinshasa</option>
                                                            <option data-title="Cook Islands" value="CK">Cook
                                                                Islands</option>
                                                            <option data-title="Costa Rica" value="CR">Costa Rica
                                                            </option>
                                                            <option data-title="Côte d’Ivoire" value="CI">Côte
                                                                d’Ivoire</option>
                                                            <option data-title="Croatia" value="HR">Croatia
                                                            </option>
                                                            <option data-title="Cuba" value="CU">Cuba</option>
                                                            <option data-title="Curaçao" value="CW">Curaçao
                                                            </option>
                                                            <option data-title="Cyprus" value="CY">Cyprus</option>
                                                            <option data-title="Czechia" value="CZ">Czechia
                                                            </option>
                                                            <option data-title="Denmark" value="DK">Denmark
                                                            </option>
                                                            <option data-title="Djibouti" value="DJ">Djibouti
                                                            </option>
                                                            <option data-title="Dominica" value="DM">Dominica
                                                            </option>
                                                            <option data-title="Dominican Republic" value="DO">
                                                                Dominican Republic</option>
                                                            <option data-title="Ecuador" value="EC">Ecuador
                                                            </option>
                                                            <option data-title="Egypt" value="EG">Egypt</option>
                                                            <option data-title="El Salvador" value="SV">El Salvador
                                                            </option>
                                                            <option data-title="Equatorial Guinea" value="GQ">
                                                                Equatorial Guinea</option>
                                                            <option data-title="Eritrea" value="ER">Eritrea
                                                            </option>
                                                            <option data-title="Estonia" value="EE">Estonia
                                                            </option>
                                                            <option data-title="Eswatini" value="SZ">Eswatini
                                                            </option>
                                                            <option data-title="Ethiopia" value="ET">Ethiopia
                                                            </option>
                                                            <option data-title="Falkland Islands" value="FK">
                                                                Falkland Islands</option>
                                                            <option data-title="Faroe Islands" value="FO">Faroe
                                                                Islands</option>
                                                            <option data-title="Fiji" value="FJ">Fiji</option>
                                                            <option data-title="Finland" value="FI">Finland
                                                            </option>
                                                            <option data-title="France" value="FR">France</option>
                                                            <option data-title="French Guiana" value="GF">French
                                                                Guiana</option>
                                                            <option data-title="French Polynesia" value="PF">French
                                                                Polynesia</option>
                                                            <option data-title="French Southern Territories" value="TF">French Southern Territories</option>
                                                            <option data-title="Gabon" value="GA">Gabon</option>
                                                            <option data-title="Gambia" value="GM">Gambia</option>
                                                            <option data-title="Georgia" value="GE">Georgia
                                                            </option>
                                                            <option data-title="Germany" value="DE">Germany
                                                            </option>
                                                            <option data-title="Ghana" value="GH">Ghana</option>
                                                            <option data-title="Gibraltar" value="GI">Gibraltar
                                                            </option>
                                                            <option data-title="Greece" value="GR">Greece</option>
                                                            <option data-title="Greenland" value="GL">Greenland
                                                            </option>
                                                            <option data-title="Grenada" value="GD">Grenada
                                                            </option>
                                                            <option data-title="Guadeloupe" value="GP">Guadeloupe
                                                            </option>
                                                            <option data-title="Guam" value="GU">Guam</option>
                                                            <option data-title="Guatemala" value="GT">Guatemala
                                                            </option>
                                                            <option data-title="Guernsey" value="GG">Guernsey
                                                            </option>
                                                            <option data-title="Guinea" value="GN">Guinea</option>
                                                            <option data-title="Guinea-Bissau" value="GW">
                                                                Guinea-Bissau</option>
                                                            <option data-title="Guyana" value="GY">Guyana</option>
                                                            <option data-title="Haiti" value="HT">Haiti</option>
                                                            <option data-title="Heard &amp; McDonald Islands" value="HM">Heard &amp; McDonald Islands</option>
                                                            <option data-title="Honduras" value="HN">Honduras
                                                            </option>
                                                            <option data-title="Hong Kong SAR China" value="HK">
                                                                Hong Kong SAR China</option>
                                                            <option data-title="Hungary" value="HU">Hungary
                                                            </option>
                                                            <option data-title="Iceland" value="IS">Iceland
                                                            </option>
                                                            <option data-title="India" value="IN">India</option>
                                                            <option data-title="Indonesia" value="ID">Indonesia
                                                            </option>
                                                            <option data-title="Iran" value="IR">Iran</option>
                                                            <option data-title="Iraq" value="IQ">Iraq</option>
                                                            <option data-title="Ireland" value="IE">Ireland
                                                            </option>
                                                            <option data-title="Isle of Man" value="IM">Isle of Man
                                                            </option>
                                                            <option data-title="Israel" value="IL">Israel</option>
                                                            <option data-title="Italy" value="IT">Italy</option>
                                                            <option data-title="Jamaica" value="JM">Jamaica
                                                            </option>
                                                            <option data-title="Japan" value="JP">Japan</option>
                                                            <option data-title="Jersey" value="JE">Jersey</option>
                                                            <option data-title="Jordan" value="JO">Jordan</option>
                                                            <option data-title="Kazakhstan" value="KZ">Kazakhstan
                                                            </option>
                                                            <option data-title="Kenya" value="KE">Kenya</option>
                                                            <option data-title="Kiribati" value="KI">Kiribati
                                                            </option>
                                                            <option data-title="Kosovo" value="XK">Kosovo</option>
                                                            <option data-title="Kuwait" value="KW">Kuwait</option>
                                                            <option data-title="Kyrgyzstan" value="KG">Kyrgyzstan
                                                            </option>
                                                            <option data-title="Laos" value="LA">Laos</option>
                                                            <option data-title="Latvia" value="LV">Latvia</option>
                                                            <option data-title="Lebanon" value="LB">Lebanon
                                                            </option>
                                                            <option data-title="Lesotho" value="LS">Lesotho
                                                            </option>
                                                            <option data-title="Liberia" value="LR">Liberia
                                                            </option>
                                                            <option data-title="Libya" value="LY">Libya</option>
                                                            <option data-title="Liechtenstein" value="LI">
                                                                Liechtenstein</option>
                                                            <option data-title="Lithuania" value="LT">Lithuania
                                                            </option>
                                                            <option data-title="Luxembourg" value="LU">Luxembourg
                                                            </option>
                                                            <option data-title="Macao SAR China" value="MO">Macao
                                                                SAR China</option>
                                                            <option data-title="Madagascar" value="MG">Madagascar
                                                            </option>
                                                            <option data-title="Malawi" value="MW">Malawi</option>
                                                            <option data-title="Malaysia" value="MY">Malaysia
                                                            </option>
                                                            <option data-title="Maldives" value="MV">Maldives
                                                            </option>
                                                            <option data-title="Mali" value="ML">Mali</option>
                                                            <option data-title="Malta" value="MT">Malta</option>
                                                            <option data-title="Marshall Islands" value="MH">
                                                                Marshall Islands</option>
                                                            <option data-title="Martinique" value="MQ">Martinique
                                                            </option>
                                                            <option data-title="Mauritania" value="MR">Mauritania
                                                            </option>
                                                            <option data-title="Mauritius" value="MU">Mauritius
                                                            </option>
                                                            <option data-title="Mayotte" value="YT">Mayotte
                                                            </option>
                                                            <option data-title="Mexico" value="MX">Mexico</option>
                                                            <option data-title="Micronesia" value="FM">Micronesia
                                                            </option>
                                                            <option data-title="Moldova" value="MD">Moldova
                                                            </option>
                                                            <option data-title="Monaco" value="MC">Monaco</option>
                                                            <option data-title="Mongolia" value="MN">Mongolia
                                                            </option>
                                                            <option data-title="Montenegro" value="ME">Montenegro
                                                            </option>
                                                            <option data-title="Montserrat" value="MS">Montserrat
                                                            </option>
                                                            <option data-title="Morocco" value="MA">Morocco
                                                            </option>
                                                            <option data-title="Mozambique" value="MZ">Mozambique
                                                            </option>
                                                            <option data-title="Myanmar (Burma)" value="MM">Myanmar
                                                                (Burma)</option>
                                                            <option data-title="Namibia" value="NA">Namibia
                                                            </option>
                                                            <option data-title="Nauru" value="NR">Nauru</option>
                                                            <option data-title="Nepal" value="NP">Nepal</option>
                                                            <option data-title="Netherlands" value="NL">Netherlands
                                                            </option>
                                                            <option data-title="New Caledonia" value="NC">New
                                                                Caledonia</option>
                                                            <option data-title="New Zealand" value="NZ">New Zealand
                                                            </option>
                                                            <option data-title="Nicaragua" value="NI">Nicaragua
                                                            </option>
                                                            <option data-title="Niger" value="NE">Niger</option>
                                                            <option data-title="Nigeria" value="NG">Nigeria
                                                            </option>
                                                            <option data-title="Niue" value="NU">Niue</option>
                                                            <option data-title="Norfolk Island" value="NF">Norfolk
                                                                Island</option>
                                                            <option data-title="Northern Mariana Islands" value="MP">Northern Mariana Islands</option>
                                                            <option data-title="North Korea" value="KP">North Korea
                                                            </option>
                                                            <option data-title="North Macedonia" value="MK">North
                                                                Macedonia</option>
                                                            <option data-title="Norway" value="NO">Norway</option>
                                                            <option data-title="Oman" value="OM">Oman</option>
                                                            <option data-title="Pakistan" value="PK">Pakistan
                                                            </option>
                                                            <option data-title="Palau" value="PW">Palau</option>
                                                            <option data-title="Palestinian Territories" value="PS">Palestinian Territories</option>
                                                            <option data-title="Panama" value="PA">Panama</option>
                                                            <option data-title="Papua New Guinea" value="PG">Papua
                                                                New Guinea</option>
                                                            <option data-title="Paraguay" value="PY">Paraguay
                                                            </option>
                                                            <option data-title="Peru" value="PE">Peru</option>
                                                            <option data-title="Philippines" value="PH">Philippines
                                                            </option>
                                                            <option data-title="Pitcairn Islands" value="PN">
                                                                Pitcairn Islands</option>
                                                            <option data-title="Poland" value="PL">Poland</option>
                                                            <option data-title="Portugal" value="PT">Portugal
                                                            </option>
                                                            <option data-title="Qatar" value="QA">Qatar</option>
                                                            <option data-title="Réunion" value="RE">Réunion
                                                            </option>
                                                            <option data-title="Romania" value="RO">Romania
                                                            </option>
                                                            <option data-title="Russia" value="RU">Russia</option>
                                                            <option data-title="Rwanda" value="RW">Rwanda</option>
                                                            <option data-title="Samoa" value="WS">Samoa</option>
                                                            <option data-title="San Marino" value="SM">San Marino
                                                            </option>
                                                            <option data-title="São Tomé &amp; Príncipe" value="ST">São Tomé &amp; Príncipe</option>
                                                            <option data-title="Saudi Arabia" value="SA">Saudi
                                                                Arabia</option>
                                                            <option data-title="Senegal" value="SN">Senegal
                                                            </option>
                                                            <option data-title="Serbia" value="RS">Serbia</option>
                                                            <option data-title="Seychelles" value="SC">Seychelles
                                                            </option>
                                                            <option data-title="Sierra Leone" value="SL">Sierra
                                                                Leone</option>
                                                            <option data-title="Singapore" value="SG">Singapore
                                                            </option>
                                                            <option data-title="Sint Maarten" value="SX">Sint
                                                                Maarten</option>
                                                            <option data-title="Slovakia" value="SK">Slovakia
                                                            </option>
                                                            <option data-title="Slovenia" value="SI">Slovenia
                                                            </option>
                                                            <option data-title="Solomon Islands" value="SB">Solomon
                                                                Islands</option>
                                                            <option data-title="Somalia" value="SO">Somalia
                                                            </option>
                                                            <option data-title="South Africa" value="ZA">South
                                                                Africa</option>
                                                            <option data-title="South Georgia &amp; South Sandwich Islands" value="GS">South Georgia &amp; South Sandwich
                                                                Islands</option>
                                                            <option data-title="South Korea" value="KR">South Korea
                                                            </option>
                                                            <option data-title="Spain" value="ES">Spain</option>
                                                            <option data-title="Sri Lanka" value="LK">Sri Lanka
                                                            </option>
                                                            <option data-title="St. Barthélemy" value="BL">St.
                                                                Barthélemy</option>
                                                            <option data-title="St. Helena" value="SH">St. Helena
                                                            </option>
                                                            <option data-title="St. Kitts &amp; Nevis" value="KN">
                                                                St. Kitts &amp; Nevis</option>
                                                            <option data-title="St. Lucia" value="LC">St. Lucia
                                                            </option>
                                                            <option data-title="St. Martin" value="MF">St. Martin
                                                            </option>
                                                            <option data-title="St. Pierre &amp; Miquelon" value="PM">St. Pierre &amp; Miquelon</option>
                                                            <option data-title="St. Vincent &amp; Grenadines" value="VC">St. Vincent &amp; Grenadines</option>
                                                            <option data-title="Sudan" value="SD">Sudan</option>
                                                            <option data-title="Suriname" value="SR">Suriname
                                                            </option>
                                                            <option data-title="Svalbard &amp; Jan Mayen" value="SJ">Svalbard &amp; Jan Mayen</option>
                                                            <option data-title="Sweden" value="SE">Sweden</option>
                                                            <option data-title="Switzerland" value="CH">Switzerland
                                                            </option>
                                                            <option data-title="Syria" value="SY">Syria</option>
                                                            <option data-title="Taiwan, Province of China" value="TW">Taiwan, Province of China</option>
                                                            <option data-title="Tajikistan" value="TJ">Tajikistan
                                                            </option>
                                                            <option data-title="Tanzania" value="TZ">Tanzania
                                                            </option>
                                                            <option data-title="Thailand" value="TH">Thailand
                                                            </option>
                                                            <option data-title="Timor-Leste" value="TL">Timor-Leste
                                                            </option>
                                                            <option data-title="Togo" value="TG">Togo</option>
                                                            <option data-title="Tokelau" value="TK">Tokelau
                                                            </option>
                                                            <option data-title="Tonga" value="TO">Tonga</option>
                                                            <option data-title="Trinidad &amp; Tobago" value="TT">
                                                                Trinidad &amp; Tobago</option>
                                                            <option data-title="Tunisia" value="TN">Tunisia
                                                            </option>
                                                            <option data-title="Türkiye" value="TR">Türkiye
                                                            </option>
                                                            <option data-title="Turkmenistan" value="TM">
                                                                Turkmenistan</option>
                                                            <option data-title="Turks &amp; Caicos Islands" value="TC">Turks &amp; Caicos Islands</option>
                                                            <option data-title="Tuvalu" value="TV">Tuvalu</option>
                                                            <option data-title="Uganda" value="UG">Uganda</option>
                                                            <option data-title="Ukraine" value="UA">Ukraine
                                                            </option>
                                                            <option data-title="United Arab Emirates" value="AE">
                                                                United Arab Emirates</option>
                                                            <option data-title="United Kingdom" value="GB">United
                                                                Kingdom</option>
                                                            <option data-title="United States" value="US">United
                                                                States</option>
                                                            <option data-title="Uruguay" value="UY">Uruguay
                                                            </option>
                                                            <option data-title="U.S. Outlying Islands" value="UM">
                                                                U.S. Outlying Islands</option>
                                                            <option data-title="U.S. Virgin Islands" value="VI">
                                                                U.S. Virgin Islands</option>
                                                            <option data-title="Uzbekistan" value="UZ">Uzbekistan
                                                            </option>
                                                            <option data-title="Vanuatu" value="VU">Vanuatu
                                                            </option>
                                                            <option data-title="Vatican City" value="VA">Vatican
                                                                City</option>
                                                            <option data-title="Venezuela" value="VE">Venezuela
                                                            </option>
                                                            <option data-title="Vietnam" value="VN">Vietnam
                                                            </option>
                                                            <option data-title="Wallis &amp; Futuna" value="WF">
                                                                Wallis &amp; Futuna</option>
                                                            <option data-title="Western Sahara" value="EH">Western
                                                                Sahara</option>
                                                            <option data-title="Yemen" value="YE">Yemen</option>
                                                            <option data-title="Zambia" value="ZM">Zambia</option>
                                                            <option data-title="Zimbabwe" value="ZW">Zimbabwe
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="Countryselect">
                                                        <label for="state">State/Province</label>
                                                        <select class="select">
                                                            <option value="">Please select a region, state or
                                                                province.</option>
                                                            <option data-title="Alabama" value="1">Alabama</option>
                                                            <option data-title="Alaska" value="2">Alaska</option>
                                                            <option data-title="American Samoa" value="3">American
                                                                Samoa</option>
                                                            <option data-title="Arizona" value="4">Arizona</option>
                                                            <option data-title="Arkansas" value="5">Arkansas
                                                            </option>
                                                            <option data-title="Armed Forces Africa" value="6">
                                                                Armed Forces Africa</option>
                                                            <option data-title="Armed Forces Americas" value="7">
                                                                Armed Forces Americas</option>
                                                            <option data-title="Armed Forces Canada" value="8">
                                                                Armed Forces Canada</option>
                                                            <option data-title="Armed Forces Europe" value="9">
                                                                Armed Forces Europe</option>
                                                            <option data-title="Armed Forces Middle East" value="10">Armed Forces Middle East</option>
                                                            <option data-title="Armed Forces Pacific" value="11">
                                                                Armed Forces Pacific</option>
                                                            <option data-title="California" value="12">California
                                                            </option>
                                                            <option data-title="Colorado" value="13">Colorado
                                                            </option>
                                                            <option data-title="Connecticut" value="14">Connecticut
                                                            </option>
                                                            <option data-title="Delaware" value="15">Delaware
                                                            </option>
                                                            <option data-title="District of Columbia" value="16">
                                                                District of Columbia</option>
                                                            <option data-title="Federated States Of Micronesia" value="17">Federated States Of Micronesia</option>
                                                            <option data-title="Florida" value="18">Florida
                                                            </option>
                                                            <option data-title="Georgia" value="19">Georgia
                                                            </option>
                                                            <option data-title="Guam" value="20">Guam</option>
                                                            <option data-title="Hawaii" value="21">Hawaii</option>
                                                            <option data-title="Idaho" value="22">Idaho</option>
                                                            <option data-title="Illinois" value="23">Illinois
                                                            </option>
                                                            <option data-title="Indiana" value="24">Indiana
                                                            </option>
                                                            <option data-title="Iowa" value="25">Iowa</option>
                                                            <option data-title="Kansas" value="26">Kansas</option>
                                                            <option data-title="Kentucky" value="27">Kentucky
                                                            </option>
                                                            <option data-title="Louisiana" value="28">Louisiana
                                                            </option>
                                                            <option data-title="Maine" value="29">Maine</option>
                                                            <option data-title="Marshall Islands" value="30">
                                                                Marshall Islands</option>
                                                            <option data-title="Maryland" value="31">Maryland
                                                            </option>
                                                            <option data-title="Massachusetts" value="32">
                                                                Massachusetts</option>
                                                            <option data-title="Michigan" value="33">Michigan
                                                            </option>
                                                            <option data-title="Minnesota" value="34">Minnesota
                                                            </option>
                                                            <option data-title="Mississippi" value="35">Mississippi
                                                            </option>
                                                            <option data-title="Missouri" value="36">Missouri
                                                            </option>
                                                            <option data-title="Montana" value="37">Montana
                                                            </option>
                                                            <option data-title="Nebraska" value="38">Nebraska
                                                            </option>
                                                            <option data-title="Nevada" value="39">Nevada</option>
                                                            <option data-title="New Hampshire" value="40">New
                                                                Hampshire</option>
                                                            <option data-title="New Jersey" value="41">New Jersey
                                                            </option>
                                                            <option data-title="New Mexico" value="42">New Mexico
                                                            </option>
                                                            <option data-title="New York" value="43">New York
                                                            </option>
                                                            <option data-title="North Carolina" value="44">North
                                                                Carolina</option>
                                                            <option data-title="North Dakota" value="45">North
                                                                Dakota</option>
                                                            <option data-title="Northern Mariana Islands" value="46">Northern Mariana Islands</option>
                                                            <option data-title="Ohio" value="47">Ohio</option>
                                                            <option data-title="Oklahoma" value="48">Oklahoma
                                                            </option>
                                                            <option data-title="Oregon" value="49">Oregon</option>
                                                            <option data-title="Palau" value="50">Palau</option>
                                                            <option data-title="Pennsylvania" value="51">
                                                                Pennsylvania</option>
                                                            <option data-title="Puerto Rico" value="52">Puerto Rico
                                                            </option>
                                                            <option data-title="Rhode Island" value="53">Rhode
                                                                Island</option>
                                                            <option data-title="South Carolina" value="54">South
                                                                Carolina</option>
                                                            <option data-title="South Dakota" value="55">South
                                                                Dakota</option>
                                                            <option data-title="Tennessee" value="56">Tennessee
                                                            </option>
                                                            <option data-title="Texas" value="57">Texas</option>
                                                            <option data-title="Utah" value="58">Utah</option>
                                                            <option data-title="Vermont" value="59">Vermont
                                                            </option>
                                                            <option data-title="Virgin Islands" value="60">Virgin
                                                                Islands</option>
                                                            <option data-title="Virginia" value="61">Virginia
                                                            </option>
                                                            <option data-title="Washington" value="62">Washington
                                                            </option>
                                                            <option data-title="West Virginia" value="63">West
                                                                Virginia</option>
                                                            <option data-title="Wisconsin" value="64">Wisconsin
                                                            </option>
                                                            <option data-title="Wyoming" value="65">Wyoming
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="Countryselect">
                                                        <label for="Postal">Zip/Postal Code</label>
                                                        <input type="text" name="zip" placeholder="" class="form-control" required="">
                                                    </div>
                                                    <div class="Countryselect">
                                                        <label for="shipping">Free Standard Shipping</label>
                                                        <div class="checknow">
                                                            <input type="checkbox" name="" id="">
                                                            <span>Free Shipping $0.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="Countryselect">
                                                        <label for="Transfers">Custom Transfers</label>
                                                        <div class="checknow">
                                                            <input type="checkbox" name="" id="">
                                                            <span> Shipping $14.95</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pm-reward">
                                                <div class="rewards-pm" onclick="showHtmlDiv('showlog3')">
                                                    <span>Apply Discount Code</span>
                                                    <i class="fa-solid fa-chevron-up"></i>
                                                </div>
                                                <div class="log-in-pm" id="showlog3">
                                                    <div class="Countryselect">
                                                        <label for="Transfers">Enter discount code</label>
                                                        <input type="text" class="form-control" required="" placeholder="Enter discount code">
                                                        <button type="submit">APPLY DISCOUNT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="summary-bar">
                                            <button type="submit" class="btn light-blue-btn btn_proceed_to_checkout">Proceed to
                                                Checkout</button>
                                        </div>
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
