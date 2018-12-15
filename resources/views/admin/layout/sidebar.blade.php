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
                    'name' => 'จัดการสมาชิก',
                    'url' => 'admin/user',
                    'icon' => 'shopping-cart'
                ),
                array(
                    'name' => 'จัดการโปรโมชั่น',
                    'url' => 'admin/promotion/manage',
                    'icon' => 'users'
                ),
                array(
                    'name' => 'รายการที่ต้องทำ',
                    'url' => 'admin/todo',
                    'icon' => 'bar-chart-2'
                ),
                array(
                    'name' => '---',
                    'url' => '#',
                    'icon' => 'layers'
                ),
                array(
                    'name' => 'ข้อมูลลูกค้า',
                    'url' => 'admin/customer',
                    'icon' => 'layers'
                ),
                array(
                    'name' => 'โปรโมชั่น/แนะนำบริการ',
                    'url' => 'admin/promotion',
                    'icon' => 'layers'
                ),
                array(
                    'name' => 'ติดตามบัชชี',
                    'url' => 'admin/6',
                    'icon' => 'layers'
                ),
                array(
                    'name' => 'Loan การกู้ยืม',
                    'url' => 'admin/loan',
                    'icon' => 'layers'
                ),
            );
            ?>
            @foreach($menu as $m)
                @if($m['name']==="---")
                    <div class="dropdown-divider"></div>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is($m['url']) ? 'active' : '' }}" href="{{url($m['url'])}}">
                            <span data-feather="{{$m['icon']}}"></span>
                            {{$m['name']}} @if( Request::is($m['url']))<span class="sr-only">(current)</span>@endif
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
