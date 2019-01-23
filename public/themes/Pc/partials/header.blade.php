<div class="header">
    <div class="header_b fb-position-relative">
        <div class="logo fb-float-left">
            <a href="{{ route('pc.home') }}">
                <img alt="" src="{!! logo() !!}">
            </a>
        </div>
        <div class="nav fb-float-right">
            {!! Theme::widget('nav',['slug' => 'pc'])->render() !!}
        </div>
    </div>
</div>