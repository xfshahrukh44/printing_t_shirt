<div class="form-body">
<div class="row">


<div class="col-md-12">
    <div class="form-group">
        {!! Form::Label('subcategory', 'Select SubCategory:') !!}
        <select name="subcategory" class="form-control" id="category">
            @foreach($subcategory as $key => $val_subcategory)
            <option value="{{ $val_subcategory->id }}"> {{ $val_subcategory->subcategory }} </option>
            @endforeach
        </select>
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('childsubcategory', 'Childsubcategory') !!}
    	{!! Form::text('childsubcategory', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div>


</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
