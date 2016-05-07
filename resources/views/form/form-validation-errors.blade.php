@if (!empty($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oh snap!</strong> {{ $error }}
        </div>
    @endforeach
@endif