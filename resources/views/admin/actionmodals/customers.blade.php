<div class="modal fade createuser" id="createuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('admin.create.user') }}" method="POST" id="createuserform">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">firstname</label>
                                        <input type="text" class="form-control" name="firstname">
                                        <span class="text-danger error-text firstname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">lastname</label>
                                        <input type="text" class="form-control" name="lastname">
                                        <span class="text-danger error-text lastname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="username">username</label>
                                        <input type="text" class="form-control" name="username">
                                        <span class="text-danger error-text username_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" name="email">
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">address</label>
                                        <input type="text" class="form-control" name="address">
                                        <span class="text-danger error-text address_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="city">city</label>
                                        <input type="text" class="form-control" name="city">
                                        <span class="text-danger error-text city_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">password</label>
                                        <input type="password" class="form-control" name="password">
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="confirm_password">confirm_password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                        <span class="text-danger error-text confirm_password_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Create Customer</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade updateuser" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('admin.update.user') }}" method="POST" id="updateuserform">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">firstname</label>
                                        <input type="hidden" id="userId" name="userId">
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                        <span class="text-danger error-text firstname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                        <span class="text-danger error-text lastname_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="username">username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                        <span class="text-danger error-text username_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                        <span class="text-danger error-text address_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="city">city</label>
                                        <input type="text" class="form-control" id="city" name="city">
                                        <span class="text-danger error-text city_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Update Customer</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade deletecustomer" id="deletecustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="/admin/customers/delete" method="post" id="deletecustomerform">
                @method('delete')
                @csrf
                <input type="hidden" id="deletecustomerId" value>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Delete Customer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
