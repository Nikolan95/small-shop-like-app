@if(session('loginsuccess'))
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script>
$('document').ready(function () {

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: function(toast) {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Signed in successfully'
    })

  });
  </script>
  @endif
<div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-right mb-0">
            @if(Auth::user())
            <a class="dropdown">
                <div class="nav-link dropdown-toggle waves-effect waves-light nav-user">

                </div>

                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">

                    <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->username }} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/logout"><i class="dripicons-exit text-muted mr-2"></i>Logout</a>
                </div>

            </a>
            @else
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @endif
        </ul><!--end topbar-nav-->
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <a href="../ecommerce/ecommerce-index.html">
                    <span class="responsive-logo">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="logo-small" class="logo-sm align-self-center" height="34">
                    </span>
                </a>
            </li>
            <li>
                <button class="button-menu-mobile nav-link">
                    <i data-feather="menu" class="align-self-center"></i>
                </button>
            </li>
            @if(Auth::user())
            @if(!Auth::user()->is_admin)
            <li class="hide-phone app-search">
                <form  action="{{route('product.search')}}" method="GET">
                    <input type="text" id="" name="query" placeholder="Search..." class="form-control">
                    <button style="display: none" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </li>
            @endif
            @endif
        </ul>
    </nav>
    <!-- end navbar-->
</div>
