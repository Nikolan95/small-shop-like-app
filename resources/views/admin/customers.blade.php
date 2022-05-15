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
                                    <li class="breadcrumb-item active">Customers</li>
                                </ol>
                            </div>
                            <h4 class="page-title">All customers list</h4><br>
                            <button class="btn btn-primary btn-sm add-file ml-3" data-toggle = "modal" data-target ="#createuser">Create new customer</button>
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">All customers list</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr id="row{{ $user->id }}">
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->city }}</td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="editCustomer({{$user->id}})"><i class="far fa-edit text-info mr-1"></i></a>
                                                <a class="deletecustomer" data-toggle = "modal" data-target ="#deletecustomer" data-id ="{{ $user->id }}" data-name ="{{ $user->username }}"><i class="far fa-trash-alt text-danger"></i></a>
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
    @include('admin.actionmodals.customers')
    <!-- end page-wrapper -->
    <!-- end page-wrapper -->
@endsection
