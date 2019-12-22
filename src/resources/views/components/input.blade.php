@php
$noRequired = isset($no_required);
if($noRequired){
  $noRequired = $no_required;
}
@endphp

<div class="form-group">
  <label for="{{ $id }}">{{ $label }} @if($noRequired) @else <font color="red">(*)</font> @endif</label>
  @if($ikon)
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="{{ $ikon }}"></i>
      </div>
    </div>
    @endif
    
    @if(count($errors->all()) > 0)
    
      <input @isset($min) min="{{ $min }}" @endisset @isset($max) max="{{ $max }}" @endisset @if($noRequired) @else required="required" @endif value="{{ old($id) }}" @isset($accept) accept="{{ $accept }}" @endisset type="{{ $type ?? 'text' }}" class="form-control {{ isset($classAppend) ? $classAppend : '' }} @error($id) is-invalid @else is-valid @enderror" name="{{ $id }}" id="{{ $id }}">
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
      <input @isset($min) min="{{ $min }}" @endisset @isset($max) max="{{ $max }}" @endisset @if($noRequired) @else required="required" @endif value="{{ isset($value) ? $value : '' }}" @isset($accept) accept="{{ $accept }}" @endisset type="{{ $type ?? 'text' }}" class="form-control {{ isset($classAppend) ? $classAppend : '' }}" name="{{ $id }}" id="{{ $id }}">
    @endif  

    @if($ikon)
  </div>
  @endif
</div>
