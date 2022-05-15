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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">My products</h4><br>
                            <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createproduct">add new product for sale</button>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">my producrs</h4>
                                <p class="text-muted mb-4 font-13">
                                    My active products
                                </p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Price</th>
                                        <th>Current status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr id="row{{ $product->id }}">
                                            <td>
                                                {{ $product->title }}
                                            </td>
                                            <td>@if($product->category->rootAncestor){{ $product->category->rootAncestor->name  }}@else {{ $product->category->name }} @endif</td>
                                            <td>@if($product->category->parent){{ $product->category->name }}@else no subcategory @endif</td>
                                            <td>${{$product->price}}</td>
                                            <td>{{$product->approve}}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editProduct({{$product->id}})"><i class="far fa-edit text-info mr-1"></i></a>
                                                <a class="deleteproduct" data-toggle = "modal" data-target ="#deleteproduct" data-id ="{{ $product->id }}" data-name ="{{ $product->title }}"><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2022 Nikola </span>
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
    <!-- end page-wrapper -->
    @include('products.actions.crudModal')
@endsection
