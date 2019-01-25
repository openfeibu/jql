<div class="footer">
    <div class="w1200 fb-clearfix">
        <div class="f-left">
            <div class="flogo"><img src="{!! theme_asset('images/flogo.png') !!}" alt=""></div>
            <p>{{ setting('company_name') }}</p>
            <span> {{ setting('company_name_en') }}</span>
        </div>
        <div class="f-right">
            <div class="f-nav">
                <?php $top_navs = app('nav_repository')->navs('pc');?>
                @foreach($top_navs as $key => $nav_item)
                    <a href="{{ $nav_item['url'] }}">{{ $nav_item['name'] }}</a>
                @endforeach
            </div>
            <div class="copy">{{ setting('copyright') }}</div>
        </div>
    </div>
</div>