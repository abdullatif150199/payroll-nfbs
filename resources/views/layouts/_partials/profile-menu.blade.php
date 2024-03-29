<ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    @foreach(Menu::get('profile')->roots() as $item)
        <li @lm-attrs($item) class="nav-item" @lm-endattrs>
            <a class="nav-link" @if($item->hasChildren()) href="javascript:void(0)" data-toggle="dropdown"
            @else href="{!! $item->url() !!}" @endif><i class="{!! $item->icon !!}"></i>{!! $item->title !!} </a>
            @if($item->hasChildren())
                <div class="dropdown-menu dropdown-menu-arrow">
                    @foreach($item->children() as $childItem)
                        <a href="{!! $childItem->url() !!}" class="dropdown-item ">{!! $childItem->title !!}</a>
                    @endforeach
                </div>
            @endif
        </li>
    @endforeach
</ul>
