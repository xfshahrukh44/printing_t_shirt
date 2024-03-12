<div class="form-body">
    <div class="row">

<?php 

$category = DB::table('categories')->get();

?>

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
    	<select name="category" class="form-control">
            @foreach($category as $key => $val_category)
            <option value="{{ $val_category->id }}"> {{ $val_category->name }} </option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('subcategory', 'Subcategory') !!}
    	{!! Form::text('subcategory', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>


<!-- <div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('image', 'Image') !!}
    	    	{!! Form::text('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div> -->


	</div>

</div>

<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
