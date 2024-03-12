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

.category ul li a {
    color: #c0c0c0;
    font-family: 'Lato';
    font-size: 18px !important;
    text-decoration: none;
}

.page-link {
    color: #141414 !important;
}

.page-item.active .page-link {
    z-index: 1 !important;
    color: #fff !important;
    background-color: #c00a27 !important;
    border-color: #c00a27 !important;
}

</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->


<?php 
                
    $get_category = DB::table('categories')->get();
    $route_category = Request::segment(2);
    $route_subcategory = Request::segment(3);
    $route_child_subcategory = Request::segment(4);

?>

    
 
<!--<section class="heading-sec">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <div class="inner-headings">-->
                    
<!--                    <?php if($route_category != "" && $route_subcategory == "" && $route_child_subcategory == ""){ ?>-->
                    
<!--                        <h2> {{ App\Category::find($route_category)->name }} </h2>-->
                    
<!--                    <?php }elseif($route_category != "" && $route_subcategory != "" && $route_child_subcategory == ""){ ?>-->
                    
<!--                        <h2> {{ App\Models\Subcategory::find($route_category)->subcategory }} </h2>-->
                    
<!--                    <?php }elseif($route_category != "" && $route_subcategory != "" && $route_child_subcategory != ""){ ?>-->
                    
<!--                       <h2> {{ App\Models\Childsubcategory::find($route_category)->childsubcategory }} </h2>-->
                    
<!--                    <?php }else{ ?>-->
                    
<!--                        <h2>PRODUCTS</h2>-->
                    
<!--                    <?php } ?>-->
                    
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<br><br><br><br>

<section class="section2 for-inner">
    <div class="container">
        <div class="row">
            

           
                
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

                <div class="col-md-9">

                  
                        
                        <div class="row">

                            @foreach($get_product as $key => $val_product)
                            <div class="col-lg-4">
                                <div class="opt-sec-2-main">
                                    
                                    @if($route_category != "" && $route_subcategory == "" && $route_child_subcategory == "")
                                    
                                    <a href="{{ URL('product_detail/'.$val_product->id.'/'.$route_category) }}">
                                    
                                    @elseif($route_category != "" && $route_subcategory != "" && $route_child_subcategory == "")
                                    
                                    <a href="{{ URL('product_detail/'.$val_product->id.'/'.$route_category.'/'.$route_subcategory) }}">
                                    
                                    @elseif($route_category != "" && $route_subcategory != "" && $route_child_subcategory != "")
                                    
                                    <a href="{{ URL('product_detail/'.$val_product->id.'/'.$route_category.'/'.$route_subcategory.'/'.$route_child_subcategory) }}">
                                    
                                    @elseif($route_category == "" && $route_subcategory == "" && $route_child_subcategory == "")
                                    
                                    <a href="{{ URL('product_detail/'.$val_product->id.'/'.$val_product->category.'/'.$val_product->subcategory.'/'.$val_product->childsubcategory) }}">
                                    
                                    @endif
                                    
                                        <div class="opt-sec2-img">
                                            <figure>
                                                <img src="{{asset($val_product->image)}}" class="img-fluid" alt="" style="height: 260px; width: 260px;" >
                                            </figure>
                                        </div>
                                        <div class="opt-sec2-text">
                                            <p> {{ $val_product->product_title }} </p>
                                            <h6>${{ $val_product->price }} <?php if($val_product->maximum_price != "" && $val_product->maximum_price != "0"){ echo ' - $'.$val_product->maximum_price; } ?> </h6>
                                            <!-- <a href="#" class="btn btn-bustom">Add to cart</a> -->
                                        </div>
                                    </a>
    
                                </div>
                            </div> 
                            @endforeach              
                            
                            
                        </div>
                        
                        
                        <div class="row">
                            
                            <div class="col-lg-12"> 
                                
                                <center> {{ $get_product->links() }} </center> 
                                
                            </div>
                                
                        </div>
                  
                        

                </div>


            

        </div>
    </div>
</section>



@endsection

@section('js')
<script type="text/javascript">

// $(document).ready(function () {
//     $(".inner-shop").click(function () {
//         $(".inner-drop").show()
//     })
// });

// $(document).ready(function () {
//     $(".inner-shop-2").click(function () {
//         $(".inner-drop-2").show()
//     })
// });


</script>
@endsection 