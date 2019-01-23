@foreach($navs as $key => $item)
<div class="nav_item fb-float-left fb-position-relative {{ active_class($item->active) }}">
    <a href="{{ $item->url }}" @if($item->url == "/#/contact") id="contact" @endif>
        {{ $item->name }}
    </a>
</div>
@endforeach
