<ul>
    @foreach($items as $item)
        <li class="menu-item menu-item-{{ $item->id }} {{ $item->class }} {{ $item->isActive() ? 'active' : '' }} {{ $item->children->count() ? 'has-child' : '' }}">
            <a href="{{ $item->getUrl() }}" target="{{ $item->target }}">
                {!! $item->icon !!}
                <span class="menu-item-label">
                    {{ $item->label }}
                </span>
                <span class="icon-right"></span>
            </a>
            @if($item->children->count())
                <div class="sub-menu">
                    @include('menu::menu-render.default', ['items' => $item->children])
                </div>
            @endif
        </li>
    @endforeach
</ul>
