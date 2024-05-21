@extends('layouts.main')

@section('css')
<style>

</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

 
<br><br>
<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2 class="text-center">CONTACT US</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>

<section class="contact-text">

    <div class="container">

        <form class="form_submission" id="contactform" method="post">

            @csrf 

            <div class="row">

                <div class="col-lg-2"></div>

                <div class="col-lg-4">
                    <div class="lable-txt">
                    <label></label>

                    <input type="hidden" value="contact_form" name="form_name">

                    <input placeholder="Name" type="text" name="fname" class="form-control" required>
                </div>
                </div>

                <div class="col-lg-4">
                    <div class="lable-txt">
                        <label></label>
                        <input placeholder="Email *" type="text" class="form-control" name="email" required>
                    </div>
                </div>

                <div class="col-lg-2"></div>

                <div class="col-lg-2"></div>

                <div class="col-lg-8">
                    <div class="lable-txt">
                        <label></label>
                        <input placeholder="Phone Number"  class="form-control" type="number" required>
                    </div> 
                </div>

                <div class="col-lg-2"></div>


                <div class="col-lg-2"></div>
                
               
                
                <div class="col-lg-8">
                    
                    <br>
                    
                    <div class="lable-txt gap">
                        <textarea name="notes" class="form-control" placeholder="Comment" id="" cols="30" rows="10" required> </textarea>
                    </div>
                </div>

                      
        

                <div class="col-lg-2"></div>



                <div class="col-lg-2"></div>

                <div class="col-lg-8">
                    
                    <br>
                    
                    <div class="lable-anker">
                        <button type="submit" class="btn btn-primary" style="background-color:#fff;color:#000;height: 60px;width: 120px;"> Send </button>
                    </div>

                    <br>
                    
                    <div id="contactformsresult">  </div>

                </div>

                <div class="col-lg-2"></div>

            
            </div>
            
        </form>
  
        
     
    </div>

</section>


@endsection

@section('js')
<script type="text/javascript"></script>
@endsection