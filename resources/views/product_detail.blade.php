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

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

<!-- <section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2>PRODUCTS</h2>
                </div>
            </div>
        </div>
    </div>
</section> -->



<section class="inner-product-sec">
    <div class="container">
        <div class="row">
            
        
            <?php 
                
                $get_category = DB::table('categories')->get();
                $route_category = Request::segment(3);
                $route_subcategory = Request::segment(4);
                $route_child_subcategory = Request::segment(5);

            ?>

            <div class="col-md-3">

                <div class="category">
                    <h4>Category</h4>
                    <ul>

                        @foreach($get_category as $key1 => $val_category)
                        <li class="inner-shop">
                            
                            <a href="{{ URL('product/'.$val_category->id) }}" style="<?php if($route_category == $val_category->id){ echo 'color:red'; } ?>" > {{ $val_category->name }} </a>
                                
                                <?php $get_subcategory = DB::table('subcategories')->where('category',$val_category->id)->get(); ?>

                                @foreach($get_subcategory as $key2 => $val_subcategory)
                                <div class="inner-drop" style="<?php if($route_category == $val_subcategory->category){ echo 'display:block;'; } ?>" >
                                    <ul>
                                    <li class="inner-shop-2">
                                        <a href="{{ URL('product/'.$route_category.'/'.$val_subcategory->id) }}" style="<?php if($route_subcategory == $val_subcategory->id){ echo 'color:red'; } ?>" > {{ $val_subcategory->subcategory }} </a>
                                            
                                        <?php $get_childsubcategory = DB::table('childsubcategories')->where('subcategory', $val_subcategory->id)->get(); ?> 
                                        
                                        @foreach($get_childsubcategory as $key2 => $val_childsubcategory)
                                        <div class="inner-drop-2" style="<?php if($route_subcategory == $val_childsubcategory->subcategory){ echo 'display:block;'; } ?>" >
                                            <ul>
                                                <li>
                                                    <a href="{{ URL('product/'.$route_category.'/'.$val_subcategory->id.'/'.$val_childsubcategory->id) }}"  style="<?php if($route_child_subcategory == $val_childsubcategory->id){ echo 'color:red'; } ?>" > {{ $val_childsubcategory->childsubcategory }} </a> 
                                                </li>
                                            </ul>
                                        </div>
                                        @endforeach

                                    </li>
                                    </ul>
                                </div>
                                @endforeach

                        </li>
                        @endforeach

                </ul>
                </div>

            </div>

            <?php 
                $get_multiple_images = DB::table('product_imagess')->where('product_id', $get_product_detail->id)->get();
            ?>

            <div class="col-lg-5">
                <div class="inner-img">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            
                            <div class="swiper-slide">
                                <img src="{{asset($get_product_detail->image)}}" style="height: 430px;width: 430px;" />
                            </div>
                            
                            @foreach($get_multiple_images as $key => $val_images)
                            <div class="swiper-slide">
                                <img src="{{asset($val_images->image)}}" style="height: 430px;width: 430px;" />
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset($get_product_detail->image)}}" style="height: 100px; width: 100px;" />
                            </div>
                            @foreach($get_multiple_images as $key => $val_images)
                            <div class="swiper-slide">
                                <img src="{{asset($val_images->image)}}" style="height: 100px; width: 100px;" />
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                
                <br><br><hr style="border:1px solid #5f5f5f;">

                <div class="col-lg-12">
                        
                    <div class="inner-producttt">
                        
                            <div class="productmain">
                                  <button class="clicktabs activeee" onclick="opencity(event , 'porduct1')" id="showonly" > Description </button>
                                  <button class="clicktabs" onclick="opencity(event , 'porduct2')"> Additional Information </button>
                            </div>
                         
                         <br>
                         
                        <div class="contentinfo">
                        
                            <div class="cycleinfo" id="porduct1">
                            
                                {!! $get_product_detail->description !!}
                                
                            </div>
                            
                            
                            <div class="cycleinfo" id="porduct2" style="display:none;">
                              
                                {!! $get_product_detail->additional_information !!}
                                
                            </div>
                            
                        
                        </div>
                
                
                     </div>
                     
                </div>
             
                
                
            </div>





            <?php
                $productAttributes_id = DB::table('product_attributes')->select('product_id', 'attribute_id')->where('product_id', $get_product_detail->id)->groupBy('attribute_id')->get();
                // dump($productAttributes);
            ?>

            

            <div class="col-lg-4">

            <form method="POST" action="{{ route('save_cart') }}" id="add-cart">

                @csrf

                <input type="hidden" name="product_id" id="product_id" value="{{ $get_product_detail->id }}">

                <div class="inner-product-details">
                    <!-- <h4>TECHDEV-PROFILERACING</h4> -->
                    <h2> {{ $get_product_detail->product_title }} </h2>
                    <h3>${{ $get_product_detail->price }} USD</h3>
                    
                    
                    @foreach($productAttributes_id as $key => $val_product_attribute)
                    
                    <h6> {{ App\Attributes::find($val_product_attribute->attribute_id)->name }} </h6>

                    <?php  

                        $get_attribute_values = DB::table('product_attributes')->where('attribute_id',$val_product_attribute->attribute_id)->where('product_id',$val_product_attribute->product_id)->get();

                    ?>

                    <select class="form-control" name="variation[{{ App\Attributes::find($val_product_attribute->attribute_id)->name }}]>
                        
                        <option value="0">Choose an option</option>
                        @foreach($get_attribute_values as $key => $val_attr_value)
                        <option value="{{ $val_attr_value->value }}"> {{ App\AttributeValue::find($val_attr_value->value)->value }} </option>
                        @endforeach

                    </select>
                    @endforeach


                    <h6>Quantity</h6>
                    <div class="quantity">
                        <a href="#" class=" minus-1"><span>-</span></a>
                        <input name="qty" type="text" class="quantity__input input-1" readonly="" value="1">
                        <a href="#" class=" plus-1"><span>+</span></a>
                    </div>

                    <br>

                    <div class="cart-btn">
                        <button type="submit" class="btn btn-custom" id="addCart">Add to cart
                        <!-- <a href="#" class="btn btn-custom white">Buy it now</a> -->
                    </div>

                </div>
            
            </form>

            </div>
            
            
            
            
            



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