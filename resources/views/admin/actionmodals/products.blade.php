<div class="modal fade approveproduct" id="approveproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{route('approve')}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <p id="category"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Subcategory</label>
                                        <p id="subcategory"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">title</label>
                                        <p id="title"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <p id="description"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <p id="price"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <p id="phone"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <p id="location"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <p id="status"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img id="image" width="350" height="200"></img>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Approve application</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade denyproduct" id="denyproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{route('deny')}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <p id="denycategory"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Subcategory</label>
                                        <p id="denysubcategory"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">title</label>
                                        <p id="denytitle"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <p id="denydescription"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <p id="denyprice"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <p id="denyphone"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <p id="denylocation"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <p id="denystatus"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img id="denyimage" width="350" height="200"></img>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="denyid" name="id">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Deny application</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade deleteadminproduct" id="deleteadminproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="/admin/product/delete" method="post" id="deleteproductadminform">
                @method('delete')
                @csrf
                <input type="hidden" id="deleteproductadminId">
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
