<div class="tags">
    @foreach ($permissions as $permission)
    <span class="tag" style="background-color: rgb(219 234 254); color: rgb(29 78 216);">{{ $permission->name }}</span>
    @endforeach
</div>