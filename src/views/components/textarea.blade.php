@if(count($errors->all()) > 0)

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
  <textarea @isset($no_required) @else required="required" @endisset @isset($accept) accept="{{ $accept }}" @endisset class="form-control {{ isset($classAppend) ? $classAppend : '' }} @error($id) is-invalid @else is-valid @enderror" name="{{ $id }}" id="{{ $id }}">{{ old($id) }}</textarea>
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
  <textarea @isset($no_required) @else required="required" @endisset @isset($accept) accept="{{ $accept }}" @endisset class="form-control {{ isset($classAppend) ? $classAppend : '' }}" name="{{ $id }}" id="{{ $id }}">{{ isset($value) ? $value : '' }}</textarea>
</div>

@endif