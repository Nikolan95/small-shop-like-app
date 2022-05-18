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
                            <h4 class="page-title">@if($status == 'approved') All active products @elseif($status == 'in process') New products request @elseif($status == 'denied') Denied products @endif</h4><br>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
                @include('admin.status.message')
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">@if($status == 'approved') All active products @elseif($status == 'in process') New products request @elseif($status == 'denied') Denied products @endif</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Price</th>
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
                                            <td>
                                                @if($status == 'approved')
                                                    <a href="javascript:void(0)"><i class="fa fa-check" style="opacity: 0.2;"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" onclick="approve({{$product->id}})"><i class="fa fa-check text-info mr-1"></i></a>
                                                @endif
                                                @if($status == 'denied')
                                                    <a href="javascript:void(0)"><i class="fa fa-times" style="opacity: 0.2;"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" onclick="deny({{$product->id}})"><i class="fa fa-times text-info mr-1"></i></a>
                                                @endif
                                                <a class="deleteadminproduct" data-toggle = "modal" data-target ="#deleteadminproduct" data-id ="{{ $product->id }}" data-name ="{{ $product->title }}"><i class="far fa-trash-alt text-danger"></i></a>
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
    @include('admin.actionmodals.products')
    <!-- end page-wrapper -->
    <!-- end page-wrapper -->
@endsection
