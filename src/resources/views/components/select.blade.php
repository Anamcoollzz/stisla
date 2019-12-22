@php
$noRequired = isset($no_required);
if($noRequired){
  $noRequired = $no_required;
}
@endphp

<div class="form-group">
  <label for="{{ $id }}">{{ $label }} @if($noRequired) @else <font color="red">(*)</font> @endif</label>
  @if(count($errors->all()) > 0)
  <select @if(!$noRequired) required="required" @endif class="form-control @error($id) is-invalid @else is-valid @enderror" name="{{ $id }}" id="{{ $id }}">
    @foreach ($selectData as $option => $optionText)
    <option @if(old($id) == $option) selected="selected" @endif value="{{ $option }}">{{ $optionText }}</option>
    @endforeach
  </select>
  @error($id)
  <span class="invalid-feedback">
    {{ $message }}
  </span>
  @else
  <span class="invalid-feedback">
    Data sudah benar
  </span>
  @enderror
  
  @else
  <select @if(!$noRequired) required="required" @endif class="form-control" name="{{ $id }}" id="{{ $id }}">
    @foreach ($selectData as $option => $optionText)
    <option @if($value == $option) selected="selected" @endif value="{{ $option }}">{{ $optionText }}</option>
    @endforeach
  </select>
  @endif
</div>

