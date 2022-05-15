@extends('layouts.layout')
@section('content')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">@isset($username) {{ $username }}'s @endisset Products</h4>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="username">Filter</label>
                    <select class="form-control form-control-sm" aria-label="Default select example" onchange="javascript:handleSelect(this)">
                        <option></option>
                        @foreach($categories as $category)
                            <option value="/products/{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <!-- end page title end breadcrumb -->
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="ribbon1 rib1-warning">
                                <span class="text-white text-center rib1-warning">50% off</span>
                            </div><!--end ribbon-->
                            <img src="{{asset('images/products/img-7.png')}}" alt="" class="d-block mx-auto my-4" height="170">
                            <div class="d-flex justify-content-between align-items-center my-4">
                                <div>
{{--                                    <p class="text-muted mb-2">{{ $product->category->name }} > {{ $product->subcategory->name }}</p>--}}
                                    <p class="header-title">{{ $product->title }}</p>
                                </div>
                                <div>
                                    <a href="/{{$product->user->username}}/products">{{ $product->user->username }}</a>
                                    <h4 class="text-dark mt-0 mb-2">${{ $product->price }} </h4>
                                </div>
                            </div>
                            <a href="/product-detail/{{ $product->id }}" class="btn btn-soft-primary btn-block">Show Item</a>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
                @endforeach
            </div>
        </div><!-- container -->

        @include('products.pagination')

        <footer class="footer text-center text-sm-left">
            &copy; 2022 Nikola </span>
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
<script type="text/javascript">
    //fuction for changing years
    function handleSelect(elm)
    {
        window.location = elm.value;
    }
</script>
@endsection
