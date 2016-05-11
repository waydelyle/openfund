<li class="dropdown">
    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Browse Campaigns<span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        @if(!empty($categories))
            @foreach($categories as $category)
                <li><a href="/{{ $category->slug }}/campaigns/">{{ $category->label }}</a>
            @endforeach
        @endif
    </ul>
</li>