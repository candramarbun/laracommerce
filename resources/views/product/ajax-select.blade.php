<option>--- Select Product Cat ---</option>
@if(!empty($childs))
  @foreach($childs as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
