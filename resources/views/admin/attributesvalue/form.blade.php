 

<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
               {!! Form::Label('item', 'Attribute Name:') !!}
               <select name="attribute_id" id="" class="form-control js-example-basic-single">
                   @foreach($attributeall as $attribute)
                   <option value="{{ $attribute->id}}" {{ ($attribute->id == $attributes->attribute_id ? 'selected' : '') }}>{{ $attribute->name}}</option>
                   @endforeach
               </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
               {!! Form::label('Name', 'Value') !!}
               {!! Form::text('value', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- <div class="col-md-12">
            <div class="form-group">
               {!! Form::label('attribute_price', 'Attribute Price') !!}
               {!! Form::text('attribute_price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div> -->


    </div>
</div>

<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

