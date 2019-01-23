<div class="banner"><img src="{!! $banner !!}" alt="" width="100%"></div>

    <!-- 这是PC端的轮播图 -->
    <div class="join w1200">
        <div class="join-title">
            <p>人才招聘</p>
            <span>JOBS AND CAREERS AT JIAQILE</span>
        </div>
        <div class="join-btn">
            <a href="#">招聘简历范本下载</a>
            <p>下载表格后，请按范本填写简历，电邮至 <span>hr@jiaqile.cn </span>  我们将尽快回复。</p>
        </div>
        <div class="jion-con">

            @foreach($recruit_list as $key => $recruit_list_item)
                @if(count($recruit_list_item['recruits']))
                <div class="jion-list">
                    <div class="jion-list-t">{{ $recruit_list_item['category']['name'] }}</div>
                    @foreach($recruit_list_item['recruits'] as $recruit_key => $recruit_item)
                    <div class="join-item">
                        <div class="join-item-t">{{ $recruit_item['title'] }}</div>
                        <div class="join-item-n">
                            <span>招聘岗位：{{ $recruit_item['post'] }}</span>
                            <span>汇报对象：{{ $recruit_item['reports_to'] }}</span>
                        </div>
                        <dl>
                            <dt>岗位职责：</dt>
                            {!! $recruit_item['duty'] !!}
                        </dl>
                        <dl>
                            <dt>任职要求：</dt>
                            {!! $recruit_item['requirement'] !!}
                        </dl>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="jion-list2">
                    <div class="jion-list-t">{{ $recruit_list_item['category']['name'] }}</div>
                    <div class="jion-list-con">{{ date('Y') }}，拭目以待......</div>
                </div>
                @endif
            @endforeach

        </div>
    </div>
