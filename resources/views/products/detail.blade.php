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
                                    <li class="breadcrumb-item"><a href="/products/{{$product->subcategory->category->name}}">{{ $product->subcategory->category->name }}</a></li>
                                    <li class="breadcrumb-item"><a href="/products/{{$product->subcategory->category->name}}/{{$product->subcategory->name}}">{{ $product->subcategory->name }}</a></li>
                                    <li class="breadcrumb-item active">{{ $product->name }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Procuct-Detail</h4>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="{{asset('images/products/img-7.png')}}" alt="" class=" mx-auto  d-block" height="400">
                                    </div><!--end col-->
                                    <div class="col-lg-6 align-self-center">
                                        <div class="single-pro-detail">
                                            <p class="mb-1">{{$product->subcategory->name}}</p>
                                            <div class="custom-border mb-3"></div>
                                            <h3 class="pro-title">{{$product->name}}</h3>
                                            <p class="text-muted mb-0">{{$product->description}}</p>
                                            <h2 class="pro-price">${{$product->price}} </h2>
                                            <a href="/{{$product->user->username}}/products" class="text-muted font-13">From user: {{ $product->user->username }}</a>
                                            <ul class="list-unstyled pro-features border-0">
                                                <li>{{ $product->user->city }}</li>
                                                <li>{{ $product->user->address }} </li>
                                            </ul>
                                            <div class="quantity mt-3 ">
                                                <input class="form-control" type="number" min="0" value="0" id="example-number-input">
                                                <a href="" class="btn btn-gradient-primary text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="pro-order-box">
                                            <i class="mdi mdi-truck-fast text-success"></i>
                                            <h4 class="header-title">Fast Delivery</h4>
                                            <p class="text-muted mb-0">
                                                It is a long established fact that a reader will be distracted.
                                                Contrary to popular belief.
                                            </p>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-3">
                                        <div class="pro-order-box">
                                            <i class="mdi mdi-refresh text-danger"></i>
                                            <h4 class="header-title">Returns in 30 Days</h4>
                                            <p class="text-muted mb-0">
                                                It is a long established fact that a reader will be distracted.
                                                Contrary to popular belief.
                                            </p>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-3">
                                        <div class="pro-order-box">
                                            <i class="mdi mdi-headset text-warning"></i>
                                            <h4 class="header-title">Online Support 24/7</h4>
                                            <p class="text-muted mb-0">
                                                It is a long established fact that a reader will be distracted.
                                                Contrary to popular belief.
                                            </p>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-3">
                                        <div class="pro-order-box mb-0">
                                            <i class="mdi mdi-wallet text-purple"></i>
                                            <h4 class="header-title">Secure Payment</h4>
                                            <p class="text-muted mb-0">
                                                It is a long established fact that a reader will be distracted.
                                                Contrary to popular belief.
                                            </p>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0">Related Products</h5>
                                <p class="text-muted mb-3 font-14">There are many variations of passages of Lorem Ipsum available,
                                    but the majority have suffered alteration in some form, by injected humour,
                                    or randomised words which don't look even slightly believable.
                                    If you are going to use a passage.
                                </p>
                            </div><!--end card-body-->
                        </div><!--end card-->
                        <div class="row">
                            @foreach($relatedProducts as $product)
                            <div class="col-lg-4">
                                <div class="card e-co-product">
                                    <a href="">
                                        <img src="{{asset('images/products/img-1.png')}}" alt="" class="img-fluid">
                                    </a>
                                    <div class="card-body product-info">
                                        <a href="" class="product-title">{{ $product->name }}</a>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="product-price">${{ $product->price }}</p>
                                        </div>
                                        <a href="/products/{{ $product->subcategory->category->name }}/{{ $product->subcategory->name }}/{{ $product->name }}" class="btn btn-gradient-primary btn-round px-3 btn-sm waves-effect waves-light" style="padding-top: 7px;"> View this product</a>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                            @endforeach
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2022 Nikola </span>
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
@endsection
