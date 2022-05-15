<div class="modal fade createproduct" id="createproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('product.create') }}" method="POST" id="createproductform">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="selects">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Category</label>
                                            <select class="form-control" name="category[0]" data-id="1" onchange="getComboA(this)">
                                                <option></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text category.0_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="text" class="form-control" name="title">
                                        <span class="text-danger error-text title_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <textarea class="form-control" rows="5" name="description" ></textarea>
                                        <span class="text-danger error-text description_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="number" class="form-control" name="price" >
                                        <span class="text-danger error-text price_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input type="number" class="form-control" name="phone" >
                                        <span class="text-danger error-text phone_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <input type="text" class="form-control" name="location" >
                                        <span class="text-danger error-text location_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Product status</label>
                                        <select class="form-control" name="status"  data-id="1">
                                            <option value="New">New </option>
                                            <option value="Used">Used</option>
                                        </select>
                                        <span class="text-danger error-text status_error"></span>
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

<div class="modal fade editproduct" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('product.update') }}" method="post" id="updateproductform">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="hidden" class="form-control" name="productId" id="productId">
                                        <input type="text" class="form-control" name="title" id="title">
                                        <span class="text-danger error-text title_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                                        <span class="text-danger error-text description_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input type="number" class="form-control" name="price" id="price">
                                        <span class="text-danger error-text price_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input type="number" class="form-control" name="phone" id="phone">
                                        <span class="text-danger error-text phone_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <input type="text" class="form-control" name="location" id="location">
                                        <span class="text-danger error-text location_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Product status</label>
                                        <select class="form-control" name="status" id="status" data-id="1">
                                            <option value="New">New </option>
                                            <option value="Used">Used</option>
                                        </select>
                                        <span class="text-danger error-text status_error"></span>
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

<div class="modal fade deleteproduct" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="/productdelete" method="post" id="deleteproductform">
                @method('delete')
                @csrf
                <input type="hidden" id="deleteproductId" value>
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
