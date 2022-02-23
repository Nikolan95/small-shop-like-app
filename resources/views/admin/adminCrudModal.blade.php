
<div class="modal fade createproductadmin" id="createproductadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('admin.create') }}" method="POST" id="createproductadminform">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">Category</label>
                                        <select class="form-control" name="category" id="category1">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text category_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname">Subcategory</label>
                                        <select class="form-control" name="subcategory" id="subcategory1">
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"> {{ $subcategory->name }} </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text subcategory_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jmbg">name</label>
                                        <input type="text" class="form-control" name="name" id="name1">
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="note">description</label>
                                        <textarea class="form-control" rows="5" name="description" id="description1"></textarea>
                                        <span class="text-danger error-text description_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="note">price</label>
                                        <input type="number" class="form-control" name="price" id="price1">
                                        <span class="text-danger error-text price_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">List new item for sale</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade editproductadmin" id="editproductadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('admin.update') }}" method="PUT"  id="updateproductadminform">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">Categoies</label>
                                        <input type="hidden" id="productid" name="productid" />
                                        <input type="hidden" id="userid" name="userid" />
                                        <select class="form-control" name="category" id="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text category_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="subcategory" id="subcategory">
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"> {{ $subcategory->name }} </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text subcategory_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" class="form-control" name="name" id="name" >
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <textarea class="form-control" rows="5" name="description" id="description" ></textarea>
                                        <span class="text-danger error-text description_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="text" class="form-control" name="price" id="price">
                                        <span class="text-danger error-text price_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Update product</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade deleteproductadmin" id="deleteproductadmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="/admin/productdelete" method="DELETE" id="deleteproductadminform">
                @csrf
                <input type="hidden" id="deleteproductadminId" value>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Delete product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
