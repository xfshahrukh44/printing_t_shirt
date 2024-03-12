@extends('layouts.main')

@section('css')
<style>




</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->



<!-- blog -->
<section class="blog-sectionn">
    <div class="container">
        <div class="col-lg-12">
            <div class="blog" style="margin-top: 150px;" >
            
                <img  src="{{ asset($blog_detail->image) }}" style="height: 600px; width: 1100px; border-radius: 15px;" />

            </div>
        </div>
    </div>
    </div>
</section>
<!-- blog -->

<!-- blog-working -->

<section class="blog-working">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <p> {!! $blog_detail->detail !!} </p>
                <a href="{{ route('blog') }}"> Back To Blog </a>


            </div>
        </div>
    </div>
</section>
<!-- blog-working -->


@endsection

@section('js')
<script type="text/javascript"></script>
@endsection