<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Browse Projects<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        @if(!empty($categories))
            @foreach($categories as $category)
                <li><a href="/{{ $category->slug }}/projects/">{{ $category->label }}</a>
            @endforeach
        @endif
    </ul>
</li>