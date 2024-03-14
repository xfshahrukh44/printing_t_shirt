@extends('layouts.main')
@section('title', 'Account Details')
@section('content')

<?php $segment = Request::segments(); ?>



<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2> PROFILE UPDATE </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<main class="my-cart" style="background:#fff;">

<br><br><br>

    <!-- banner start -->
    <!-- banner end -->

<!-- main content start -->

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
                                    <div class="tab-pane active" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <div class="section-heading">
                                                <h2>Account Details</h2>
                                            </div>

                                            <div class="account-details-form">
                                               <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data" id="accountForm">
                                                @csrf
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Name</label>
                                                                <input type="text" id="last-name" name="uname" placeholder="Last Name" value="<?php echo Auth::user()->name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Addres</label>
                                                        <input type="email" id="email" placeholder="Email Address" name="email" value="<?php echo Auth::user()->email; ?>">
                                                    </div>

                                                    <fieldset>
                                                        <legend>Password change</legend>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New Password</label>
                                                                    <input type="password" id="new-pwd" placeholder="New Password" name="password">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                    <input type="password" id="confirm-pwd" placeholder="Confirm Password" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                   @if ($user = App\User::where('id', '=', Auth::user()->id)->first())
                                                       <?php $profile = $user->profile; ?>
                                                       @if ($profile)
                                                           <fieldset>
                                                               <legend>Billing Details</legend>

                                                               <div class="row">
                                                                   <div class="col-lg-12">
                                                                       <div class="single-input-item">
                                                                           <label for="new-pwd" class="required">Address *</label>
                                                                           <input type="text" id="new-pwd" placeholder="Address *" name="profile_data[address]" value="{{$profile->address}}">
                                                                       </div>
                                                                   </div>

                                                                   <div class="col-lg-12">
                                                                       <div class="single-input-item">
                                                                           <label for="new-pwd" class="required">Town / City *</label>
                                                                           <input type="text" id="new-pwd" placeholder="Town / City *" name="profile_data[city]" value="{{$profile->city}}">
                                                                       </div>
                                                                   </div>

                                                                   <div class="col-lg-12">
                                                                       <div class="single-input-item">
                                                                           <label for="new-pwd" class="required">Country</label>
                                                                           <input type="text" id="new-pwd" placeholder="Country" name="profile_data[country]" value="{{$profile->country}}">
                                                                       </div>
                                                                   </div>

                                                                   <div class="col-lg-12">
                                                                       <div class="single-input-item">
                                                                           <label for="new-pwd" class="required">Phone *</label>
                                                                           <input type="text" id="new-pwd" placeholder="Phone *" name="profile_data[phone]" value="{{$profile->phone}}">
                                                                       </div>
                                                                   </div>

                                                                   <div class="col-lg-12">
                                                                       <div class="single-input-item">
                                                                           <label for="new-pwd" class="required">Postcode</label>
                                                                           <input type="text" id="new-pwd" placeholder="Postcode" name="profile_data[postal]" value="{{$profile->postal}}">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </fieldset>
                                                       @endif
                                                   @endif

                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn btn btn-danger" id="updateProfile" style="background-color: #07c4f4; border: 0px;">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->


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

    .account-details-form input {
        border-color:#000 !important;
    }

</style>
@endsection
@section('js')

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
        $('#accountForm').submit();
  });

</script>

@endsection
