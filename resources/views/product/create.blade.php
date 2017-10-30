@extends('layouts.app')

@section('content')
<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Create Product</div>
	  	<div class="panel-body">
        <h3>Add New Product</h3>

          {!! Form::open(['route'=>'add.product']) !!}

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif

          <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
            {!! Form::label('Product Name:') !!}
            {!! Form::text('product_name', old('product_name'), ['class'=>'form-control', 'placeholder'=>'Enter Product Name']) !!}
            <span class="text-danger">{{ $errors->first('product_name') }}</span>
          </div>
					<div class="form-group {{ $errors->has('product_qty') ? 'has-error' : '' }}">
						{!! Form::label('Product Quantity:') !!}
						{!! Form::text('product_qty', old('product_qty'), ['class'=>'form-control', 'placeholder'=>'Enter Product Quantity']) !!}
						<span class="text-danger">{{ $errors->first('product_qty') }}</span>
					</div>

					<div class="form-group {{ $errors->has('product_price') ? 'has-error' : '' }}">
						{!! Form::label('Product Price:') !!}
						{!! Form::text('product_price', old('product_price'), ['class'=>'form-control', 'placeholder'=>'Enter Product Quantity']) !!}
						<span class="text-danger">{{ $errors->first('product_price') }}</span>
					</div>

          <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            {!! Form::label('Product Category:') !!}
            {!! Form::select('product_cat',[''=>'--- Select Category ---']+$categories,null,['class'=>'form-control']) !!}
            <span class="text-danger">{{ $errors->first('product_id') }}</span>
          </div>


					<div class="form-group {{ $errors->has('product_sub_cat') ? 'has-error' : '' }}">
					  {!! Form::label('Product Sub Category:') !!}
 							{!! Form::select('product_sub_cat',[''=>'--- Select Subcategory ---'],null,['class'=>'form-control']) !!}
					  <span class="text-danger">{{ $errors->first('product_sub_cat') }}</span>
					</div>

          <div class="form-group">
            <button class="btn btn-success">Add New</button>
          </div>

          {!! Form::close() !!}

      </div>
    </div>
  </div>
@endsection
@push('js')
<script type="text/javascript">
  $("select[name='product_cat']").change(function(){
      var product_cat = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('dropdown.product') ?>",
          method: 'POST',
          data: {product_cat:product_cat, _token:token},
          success: function(data) {
            $("select[name='product_sub_cat'").html('');
            $("select[name='product_sub_cat'").html(data.options);
          }
      });
  });
</script>
@endpush
