<div class="modal fade createtopcategory" id="createtopcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('topcategory.create') }}" method="POST" id="createtopcategoryform">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="selects">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Category</label>
                                            <input type="text" class="form-control"  name="name" value="{{old('name')}}">
                                            <span class="text-danger error-text category_error">
                                                @error('name')
                                                {{$message}}
                                                @enderror()
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Add category</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade createsubcategory" id="createsubcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('subcategory.create') }}" method="POST" id="createsubcategoryform">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="selects">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Category</label>
                                            <select class="form-control" name="category">
                                                <option></option>
                                                @foreach($allCategories as $category)
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
                                            <label for="firstname">New Subcategory</label>
                                           <input type="text" class="form-control" name="newsubcategory">
                                            <span class="text-danger error-text newsubcategory_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-primary btn-sm add-file ml-3" type="submit">Add category</button>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </form>
        </div>
    </div>
</div>

