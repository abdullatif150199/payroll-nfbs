<ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    @foreach(Menu::get('primary')->roots() as $item)
    <li @lm-attrs($item) class="nav-item" @lm-endattrs>
        <a class="nav-link" @if($item->hasChildren()) href="javascript:void(0)"
            @else href="{!! $item->url() !!}" @endif><i class="{!! $item->icon !!}"></i>{!! $item->title !!} </a>
        @if($item->hasChildren())
        <div class="nav-submenu nav">
            @foreach($item->children() as $childItem)
            <a href="{!! $childItem->url() !!}" class="nav-item">{!! $childItem->title !!}</a>
            @endforeach
        </div>
        @endif
    </li>
    @endforeach
</ul>
