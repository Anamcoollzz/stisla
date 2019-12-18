@if(count($errors->all()) > 0)

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="{{ $ikon }}"></i>
      </div>
    </div>
    <input @isset($no_required) @else required="required" @endisset value="{{ old($id) }}" @isset($accept) accept="{{ $accept }}" @endisset type="{{ $type ?? 'text' }}" class="form-control {{ isset($classAppend) ? $classAppend : '' }} @error($id) is-invalid @else is-valid @enderror" name="{{ $id }}" id="{{ $id }}">
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
</div>

@else

<div class="form-group">
  <label for="{{ $id }}">{{ $label }}</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="{{ $ikon }}"></i>
      </div>
    </div>
    <input @isset($no_required) @else required="required" @endisset value="{{ isset($value) ? $value : '' }}" @isset($accept) accept="{{ $accept }}" @endisset type="{{ $type ?? 'text' }}" class="form-control {{ isset($classAppend) ? $classAppend : '' }}" name="{{ $id }}" id="{{ $id }}">
  </div>
</div>

@endif