@foreach(childs as $child)
<div class="form-group {{ $errors->has('product_cat') ? 'has-error' : '' }}">
  {!! Form::label('Product Category:') !!}
   <option value=""></option>
  <!-- {!! Form::select('product_cat',$childs, old('product_cat'), ['class'=>'form-control','id'=>'childs', 'placeholder'=>'Select Category']) !!} -->
  <span class="text-danger">{{ $errors->first('product_cat') }}</span>
</div>
@if(count($child->childs))
  @include('product.childDropdown',['childs'=> $child->childs])
@endif
@endforeach
