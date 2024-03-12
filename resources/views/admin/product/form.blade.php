
<div class="form-body">
    <div class="row">

    
        <div class="col-md-12">
            <div class="form-group">
               {!! Form::Label('category', 'Select Category:') !!}
               <select name="category" class="form-control" id="category">
                    <option value="0"> Select Category </option>
                    @foreach($items as $key => $val_items)
                    <option value="{{ $val_items->id }}"> {{ $val_items->name }} </option>
                    @endforeach
               </select>
            </div>
        </div>



        <div class="col-md-12" id="subcategory_sec" >
            <div class="form-group">
               {!! Form::Label('item', 'Select Sub-Category:') !!}
               <select name="subcategory" id="subcategory" class="form-control">
                    
               </select>
            </div>
        </div>




        <div class="col-md-12" id="childsubcategory_sec" >
            <div class="form-group">
               {!! Form::Label('item', 'Select Child Sub-Category:') !!}
               <select name="childsubcategory" id="childsubcategory" class="form-control">
                    
               </select>
            </div>
        </div>



        <div class="row" style="margin-left: 0;">
            
            <div class="col-md-4">
                <div class="form-group">
                <label> Category </label>
                <input type="text" value="{{ App\Category::find($product->category)->name }}" class="form-control" readonly/>
                </div>
            </div>
       

            <div class="col-md-4">
                <div class="form-group">
                <label> Sub-Category </label>
                <input type="text" value="{{ App\Models\Subcategory::find($product->subcategory)->subcategory }}" class="form-control" readonly/>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                <label> Child Sub-Category </label>
                <input type="text" value="{{ App\Models\Childsubcategory::find($product->childsubcategory)->childsubcategory }}" class="form-control" readonly/>
                </div>
            </div>

        
        </div>


        <div class="col-md-12">
            <div class="form-group">
               {!! Form::label('product_title', 'Product Title') !!}
               {!! Form::text('product_title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>




        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        
        
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('maximum_price', 'Maximum Price') !!}
                {!! Form::text('maximum_price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>

        
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('sku', 'Sku') !!}
                {!! Form::text('sku', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        
        
           
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}
                {!! Form::text('tags', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>


        
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('additional_information', 'Additional Information') !!}
                {!! Form::textarea('additional_information', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor1', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input class="form-control dropify" name="image" type="file" id="image" {{ ($product->image != '') ? "data-default-file = /$product->image" : ''}} {{ ($product->image == '') ? "required" : ''}} value="{{$product->image}}">
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('additional_image', 'Gallary Image') !!}
                <div class="gallery Images">
                <!--<div class="row">-->
                @foreach($product_images as $product_image)
                    <!--<div class="col-md-2">-->
                        <div class="image-single" style="padding: 15px;">
                        <img src="{{ asset( $product_image->image)}}" alt="" id="image_id" style="height: 100px; width: 100px; border: 1px solid; border-radius: 15px;" >
                        <button type="button" class="btn btn-danger" data-repeater-delete="" onclick="getInputValue({{$product_image->id}}, this);"> <i class="ft-x"></i>Delete</button>               
                        </div>
                    <!--</div>-->
                @endforeach
                <!--</div>-->
                </div>
                <input class="form-control dropify" name="images[]" type="file" id="images" {{ ($product->additional_image != '') ? "data-default-file = /$product->additional_image" : ''}} value="{{$product->additional_image}}" multiple>
            </div>
        </div>


        <div class="col-md-12">
            <h4 class="card-title" id="repeat-form">Add Variation</h4>
        </div>

        @foreach($product->attributes as $pro_att_edits)
        <div class="col-md-12">
            <div data-repeater-list="attribute">
                <div data-repeater-item="" class="row">
                    <input type="hidden" value="{{ $pro_att_edits->id}}" name="product_attribute[]">
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="email-addr">Attribute</label>
                            <br>
                            <select class="form-control" id="attribute_id" name="attribute_id[]" onchange="getval(this)" disabled>
                            <option value="{{ $pro_att_edits->attribute_id }}">{{ $pro_att_edits->attribute->name }}</option>
                                <!-- @foreach($att as $atts)
                                <option value="{{ $atts->id}}">{{ $atts->name}}</option>
                                @endforeach -->
                            </select>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-4">
                            <label for="pass">value</label>
                            <br>
                             <select class="form-control value" id="value" name="value[]" disabled>
                                <option value="{{ $pro_att_edits->value }}">{{ $pro_att_edits->attributesValues->value }}</option>
                            </select>   
                        </div>


                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="bio" class="cursor-pointer">Price</label>
                            <br>
                            <input type="number" name="v_price[]" class="form-control" id="price" value="{{ $pro_att_edits->price }}">
                        </div>
                        
                        <!--<div class="form-group mb-1 col-sm-12 col-md-2">-->
                            <!--<label for="bio" class="cursor-pointer">qty</label>-->
                            <!--<br>-->
                            <!--<input type="number" name="qty[]" class="form-control" id="qty" value="{{ $pro_att_edits->qty }}">-->
                        <!--</div>-->

                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                            <button onclick="deleteAttr({{ $pro_att_edits->id }}, this)" type="button" class="btn btn-danger" data-repeater-delete=""> <i class="ft-x"></i>
                                Delete</button>
                        </div>
                    
                    <hr>
                </div>
            </div>
        </div>
        @endforeach

        <div class="repeater-default col-md-12">
            <div data-repeater-list="attribute">
                <div data-repeater-item="" class="row">
                    
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="email-addr">Attribute</label>
                            <br>
                            <select class="form-control" id="attribute_id" name="attribute_id" onchange="getval(this)">
                                @foreach($att as $atts)
                                <option value="{{ $atts->id}}">{{ $atts->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-4">
                            <label for="pass">value</label>
                            <br>
                             <select class="form-control value" id="value" name="value">
                            
                            </select>   
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="bio" class="cursor-pointer">Price</label>
                            <br>
                            <input type="num`ber" name="v-price" class="form-control" id="price" value="">
                        </div>
                        <!--<div class="form-group mb-1 col-sm-12 col-md-2">-->
                            <!--<label for="bio" class="cursor-pointer">qty</label>-->
                            <!--<br>-->
                            <input type="hidden" name="qty" class="form-control" id="qty" value="1">
                        <!--</div>-->
                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                            <button type="button" class="btn btn-danger" data-repeater-delete=""> <i class="ft-x"></i>
                                Delete</button>
                        </div>
                    
                    <hr>
                </div>
            </div>
            <div class="form-group overflow-hidden">
                <div class="">
                    <button type="button" data-repeater-create="" class="btn btn-primary">
                        <i class="ft-plus"></i> Add
                    </button>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    
  $(document).ready(function() {

  $('#subcategory_sec').hide();

          
  $('#category').change(function() {

        var get_id = $('#category').val();
        
        // alert(get_id);

        if(get_id == '0'){
            
        $('#subcategory_sec').hide(500);
            
        }else{
            
        $('#subcategory_sec').show(500);    
            
        }
          
      
        $.ajax({
            url: "{{route('set_sub_category')}}",
            type: "get",
            dataType: "json",
            data: {
                
                 "_token": "{{ csrf_token() }}",
                get_id:get_id
                
            },
            success: function (response) {
               

                 if (response.status) {
                
                	console.log(response.getsub_category);
                    const options = response.getsub_category;
                    $('#subcategory').empty();
                    const selectElement = $('#subcategory');
                    const optionElement1 = $('<option></option>').attr('value', 0).text('----');
                    selectElement.append(optionElement1);
                    options.forEach((option) => {
                    const { id, subcategory } = option;
                    const optionElement = $('<option></option>').attr('value', id).text(subcategory);
                    selectElement.append(optionElement);
                    });

	            } else {
	                toastr.success(response.error);
	            }
                
               
            }
        });

  });
  

// Child Sub-Category Section

$('#childsubcategory_sec').hide();

$('#subcategory').change(function() {

var get_child_id = $('#subcategory').val();

// alert(get_child_id);

if(get_child_id == '0'){
    
$('#childsubcategory_sec').hide(500);
    
}else{
    
$('#childsubcategory_sec').show(500);    
    
}

$.ajax({
    url: "{{route('set_child_sub_category')}}",
    type: "get",
    dataType: "json",
    data: {
        
         "_token": "{{ csrf_token() }}",
         get_child_id:get_child_id
        
    },
    success: function (response) {
       

        if (response.status) {
    
            console.log(response.get_child_sub_category);

            const options = response.get_child_sub_category;

            $('#childsubcategory').empty();

            const selectElement = $('#childsubcategory');
                
            options.forEach((option) => {

                const { id, childsubcategory } = option;
                const optionElement = $('<option></option>').attr('value', id).text(childsubcategory);
                selectElement.append(optionElement);

            });
        

        } else {

            toastr.success(response.error);

        }   
        
       
    }
});




});



  
    
    
  });
  
  

</script>

  