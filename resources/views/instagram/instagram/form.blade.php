<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('link', 'Link') !!}
    	    	{!! Form::text('link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        <input class="form-control dropify" name="image" type="file" id="image" {{ ($instagram->image != '') ? "data-default-file = /$instagram->image" : ''}} {{ ($instagram->image == '') ? "required" : ''}} value="{{$instagram->image}}">
    </div>
</div>


	</div>
</div>

<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
