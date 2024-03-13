<!-- ============================================================== -->
<!-- All SCRIPTS AND JS LINKS BELOW  -->
<!-- ============================================================== -->


<!-- Optional JavaScript; choose one of the two! -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

<script>
    $(document).ready(function () {
        //heat transfer categories
        $('li.heat-transfers a').on('click', function (e) {
            e.preventDefault();
            window.location.href = '{{route("product.index1")}}';
        });

        //t shirt categories
        $('li.t-shirt-categories a').on('click', function (e) {
            e.preventDefault();
            window.location.href = '{{route("product.index2")}}';
        });
    });
</script>

<script>
     var swiper = new Swiper(".mySwiper", {
          spaceBetween: 10,
          slidesPerView: 6,
          freeMode: true,
          watchSlidesProgress: true,
     });
     var swiper2 = new Swiper(".mySwiper2", {
          spaceBetween: 10,
          navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
          },
          thumbs: {
               swiper: swiper,
          },
     });


     var swiper = new Swiper(".mySwiper3", {
         spaceBetween: 10,
         slidesPerView: 6,
         freeMode: true,
         watchSlidesProgress: true,
     });
     var swiper2 = new Swiper(".mySwiper4", {
          spaceBetween: 10,
          navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
          },
          thumbs: {
               swiper: swiper,
          },
     });
</script>

<script src="{{ asset('js/script.js') }}"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>

        // Set the options that I want
        toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }

    </script>


    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init();
        }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper-banner", {
      spaceBetween: 30,
      loop: true,
      effect: "fade",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>


  <script>
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>



<script>

	function editableContent(){
		$('.editable').each(function(){
			$(this).append('<div class="editable-wrapper"><a href="javascript:" class="edit" title="Edit" onclick="editContent(this)"><i class="far fa-edit"></i></a><a href="javascript:" class="update" title="Update" onclick="updateContent(this)"><i class="far fa-share-square"></i></a></div>');
		});
	}

	function editContent(a){
		$(a).closest('.editable').attr('contenteditable', true);;
		$(a).closest('.editable-wrapper').attr('contenteditable', false);
		$(a).closest('.editable').focus();
	}

	function updateContent(a){
		var editableDiv = $(a).closest('.editable');
		var id = $(editableDiv).attr('data-id');
		var keyword = $(editableDiv).attr('data-name');
		var htmlcontent = $(editableDiv).clone(true);
		$(htmlcontent).find('.editable-wrapper').remove();
		sendData(id, keyword, $(htmlcontent).html());
	}

	function sendData(id, keyword, htmlContent){
		console.log(id);
		console.log(keyword);
		console.log(htmlContent);
		$.ajax({
	        url: "update-content",
	        type: "POST",
	        data: {
	            "_token": "{{ csrf_token() }}",
	            id: id,
	            keyword: keyword,
	            htmlContent:htmlContent,
	        },
	        success: function(response) {
	            if (response.status) {
	            	toastr.success(response.message);
	            } else {
	                toastr.success(response.error);
	            }
	        },
	    });
	}

</script>

<script type="text/javascript">

$('#newForm').on('submit',function(e){
  $('#newsresult').html('');
    e.preventDefault();

    let email = $('#newemail').val();

    $.ajax({
      url: "newsletter-submit",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        newsletter_email:email
      },
      success:function(response){
        if(response.status){
          $('#newsresult').html("<div class='alert alert-success'>" + response.message + "</div>");
        }
        else{
          $('#newsresult').html("<div class='alert alert-danger'>" + response.message + "</div>");
        }
      },
     });
    });
  </script>


<script type="text/javascript">

$('#contactform').on('submit',function(e){
  //alert('hogaya');
  $('#contactformsresult').html('');
    e.preventDefault();

    $.ajax({
      url: "{{ route('contactUsSubmit')}}",
      type:"POST",
      data: $("#contactform").serialize(),

      success:function(response){
        if(response.status){
          document.getElementById("contactform").reset();
          $('#contactformsresult').html("<div class='alert alert-success'>" + response.message + "</div>");
        }
        else{
          $('#contactformsresult').html("<div class='alert alert-danger'>" + response.message + "</div>");
        }
      },
     });
    });

</script>

@if (!Auth::guest())
@if(Auth::user()->isAdmin())
<script>editableContent();</script>
@endif
@endif

@if(Session::has('message'))
<script type="text/javascript">
    toastr.success("{{ Session::get('message') }}");
</script>
@endif
