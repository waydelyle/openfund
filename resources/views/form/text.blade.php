<div class="form-group">
    <label for="name" class="col-lg-2 control-label">{{ $name }}</label>
    <div class="col-lg-12">
        <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $id }}" @if(!empty($placeholder)) placeholder="{{ $placeholder }}" @endif>
    </div>
</div>