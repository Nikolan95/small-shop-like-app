<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <nav class="nav">
            <a href="/dashboard"  data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Dashboard">
                <a href="/dashboard"><i data-feather="monitor" class="align-self-center menu-icon icon-dual" href = "/dashboard"></i></a>
            </a><br>
            @if(Auth::user()->is_admin)
                <a href="/adminarea"  data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="adminarea">
                    <a href="/adminarea"><i data-feather="key" class="align-self-center menu-icon icon-dual" href = "/adminarea"></i></a>
                </a><br>
            @endif
            <a href="/products/all"  data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="All Products">
                <a href="/products/all"><i data-feather="shopping-cart" class="align-self-center menu-icon icon-dual" href = "/products/all"></i></a>
            </a>
        </nav><!--end nav-->
        <div class="pro-metrica-end">
            <a href="/logout" class="help" data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Logout">
                <i data-feather="log-out" class="align-self-center menu-icon icon-md icon-dual mb-4"></i>
            </a>
        </div>
    </div><!--end main-icon-menu-->
    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="/dashboard" class="logo">
                <span>
                    <img src="{{ asset('images/laravel-logo.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end logo-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
