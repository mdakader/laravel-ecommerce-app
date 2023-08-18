<div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.popular-category-section')}}" method="POST">
                @csrf
                @method('PUT')
                <h4>Category 01</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Child category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>Category 02</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Child category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>Category 03</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Child category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>Category 04</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sub category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Child category</label>
                            <select name="currency_name" id="" class="form-control select2">
                                <option value="">Select</option>
                                <option  value="">Test</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
