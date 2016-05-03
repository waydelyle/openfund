<fieldset>
    <form class="form-horizontal" method="POST" action="@if(!empty($postTo)) {{ $postTos }} @endif">
        <legend>{{ $heading }}</legend>
        {{ csrf_field() }}