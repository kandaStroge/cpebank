<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <?php
            $menu = array(
                array(
                    'name' => 'ฝากถอนเงิน',
                    'url' => 'admin/hq',
                    'icon' => 'home'
                ),
                array(
                    'name' => 'กู้ยืมเงิน',
                    'url' => 'admin/branch',
                    'icon' => 'file'
                ),
                array(
                    'name' => 'ข้อมูลลูกค้า',
                    'url' => 'admin/user',
                    'icon' => 'shopping-cart'
                ),
                array(
                    'name' => 'โปรโมชั่น',
                    'url' => 'admin/promotion/manage',
                    'icon' => 'users'
                ),
                array(
                    'name' => '4',
                    'url' => 'admin/4',
                    'icon' => 'bar-chart-2'
                ),
                array(
                    'name' => 'โปรโมชั่น/แนะนำบริการ',
                    'url' => 'admin/promotion',
                    'icon' => 'layers'
                ),
                array(
                    'name' => '6',
                    'url' => 'admin/6',
                    'icon' => 'layers'
                ),
                array(
                    'name' => 'Add Loan',
                    'url' => 'admin/loan',
                    'icon' => 'layers'
                ),
                array(
                    'name' => 'show Loan',
                    'url' => 'admin/loanshow',
                    'icon' => 'layers'
                ),
				        array(
                    'name' => ' report',
                    'url' => 'admin/report',
                    'icon' => 'layers'
                ),
                array(
                    'name' => ' Showreport',
                    'url' => 'admin/showreport',
                    'icon' => 'layers'
                ),

            );
            ?>
            @foreach($menu as $m)
            <li class="nav-item">
                <a class="nav-link {{ Request::is($m['url']) ? 'active' : '' }}" href="{{url($m['url'])}}">
                    <span data-feather="{{$m['icon']}}"></span>
                    {{$m['name']}} @if( Request::is($m['url']))<span class="sr-only">(current)</span>@endif
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
