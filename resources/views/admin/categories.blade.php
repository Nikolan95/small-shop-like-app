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
                                    <li class="breadcrumb-item active">Categories</li>
                                </ol>
                            </div>
                            <h4 class="page-title">All categories list</h4><br>
                            <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createtopcategory">Add top level category</button>
                            <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createsubcategory">Add subcategory</button>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                @include('admin.status.message')
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="mt-0 header-title">Category Tree Preview</h4>
                                <div id="jstree">
                                    <!-- in this example the tree is populated from inline HTML -->
                                    <ul>
                                        @foreach($categories as $category)
                                            <x-category-item :category="$category" />
                                        @endforeach
                                    </ul>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!-- end row -->

            </div>

            <footer class="footer text-center text-sm-left">
                &copy; 2022 Nikola </span>
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    @include('admin.actionmodals.categories')
@endsection
