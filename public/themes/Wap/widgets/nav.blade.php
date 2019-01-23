@foreach($navs as $key => $item)
    <div class="nav-item {{ active_class($item->active) }}">
        <a href="{{ $item->url }}" @if($item->url == "/#contact")  onclick="$('.nav').slideUp(200)" @endif >{{ $item->name }}</a>
    </div>
@endforeach
