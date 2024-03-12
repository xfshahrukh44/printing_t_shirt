@extends('layouts.main')

@section('css')
<style>

.inner-about-txt {
    padding: 0px 20px !important;
    height: auto !important;
    max-height: 550px !important;
    overflow-y: scroll !important;
}

.inner-about-txt::-webkit-scrollbar {
  display: none;
}


</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

 

<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2>ABOUT</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inner-about-sec for-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="inner-about-img">
                    <img src="{{ asset($section[0]->value) }}" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
            
                {!! $section[1]->value !!}

            </div>
        </div>
    </div>
</section>



@endsection

@section('js')
<script type="text/javascript"></script>
@endsection