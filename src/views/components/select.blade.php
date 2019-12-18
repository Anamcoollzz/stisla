@if(count($errors->all()) > 0)

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
  <select class="form-control @error($id) is-invalid @else is-valid @enderror" name="{{ $id }}" id="{{ $id }}">
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
</div>

@else

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
  <select class="form-control" name="{{ $id }}" id="{{ $id }}">
    @foreach ($selectData as $option => $optionText)
    <option @if($value == $option) selected="selected" @endif value="{{ $option }}">{{ $optionText }}</option>
    @endforeach
  </select>
</div>

@endif