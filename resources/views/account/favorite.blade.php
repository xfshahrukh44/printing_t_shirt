@extends('layouts.main')
@section('title', 'Order')
@section('content')

<?php $segment = Request::segments(); ?>


<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2> FAVORITE PRODUCTS </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<main class="my-cart" style="background:#fff;">

<br><br><br>

 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            @include('account.sidebar')
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="orders" role="#">
                                        <div class="myaccount-content">
                                            <div class="section-heading">
                                                <h2>Favorite Products</h2>
                                            </div>
    
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Product Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
    
                                                    <tbody>
                                                    
                                                    @if($favorite)
                                                        @foreach($favorite as $val)
                                                            <tr>
                                                              <td>{{ $val->id }}</td>
                                                             
                                                              <td>{{ $val->product->product_title }}</td>
                                                              <td class="viewbtn"><a href="{{ url("favorite-delete/$val->id") }}">Delete</a></td>
                                                              
                                                            </tr>
                                                        @endforeach
                                                    @endif
                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                    
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->

<br><br><br>

<!-- main content end -->   
</main>

@endsection
@section('css')
<style type="text/css">
    
</style>
@endsection
@section('js')
<script type="text/javascript">
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>
@endsection