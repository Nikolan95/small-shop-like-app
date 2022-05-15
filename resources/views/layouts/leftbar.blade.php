<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <nav class="nav">
            @if(Auth::user())
            @if(!Auth::user()->is_admin)
            <a href="/dashboard"  data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Dashboard">
                <a href="/dashboard"><i data-feather="monitor" class="align-self-center menu-icon icon-dual" href = "/dashboard"></i></a>
            </a><br>
            <a href="/products"  data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="All Products">
                <a href="/products"><i data-feather="shopping-cart" class="align-self-center menu-icon icon-dual" href = "/products/all"></i></a>
            </a><br>
            @endif
            @if(Auth::user()->is_admin)
                <a href="#administerProducts" class="nav-link" data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Products">
                    <i data-feather="box" class="align-self-center menu-icon icon-dual"></i>
                </a><!--end administerProducts-->
                <a href="#administerCustomers" class="nav-link" data-toggle="tooltip-custom" data-placement="right"  data-trigger="hover" title="" data-original-title="Customers">
                    <i data-feather="user" class="align-self-center menu-icon icon-dual"></i>
                </a><!--end administerProducts-->
            @endif
            @endif
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
        <div class="menu-body slimscroll">
            <div id="administerProducts" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Products</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="/admin/products/approved">Active products</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/products/in process">New products request</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/products/denied">Denied products</a></li>
                </ul>
            </div><!-- end Pages -->

            <div id="administerCustomers" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Customers</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="/admin/customers">Customer list</a></li>
                </ul>
            </div><!-- end Pages -->
        </div><!--end menu-body-->
        <!--end logo-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
