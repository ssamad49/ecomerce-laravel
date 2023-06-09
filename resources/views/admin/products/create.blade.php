@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3 class="p-2">Add Product
                    <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>

                @endif
                <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Home
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                        SEO Tags
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                        Details
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                          Image
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                          Color
                        </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade border p-3 tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      <div class="mt-3">
                        <label class="mb-2">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Product Name</label>
                         <input type="text" name="name" class="form-control">
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Product Slug</label>
                         <input type="text" name="slug" class="form-control">
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Select Brand</label>
                        <select name="brand" class="form-control">
                            @foreach ($Brands as $Brand )
                            <option value="{{$Brand->name}}">{{$Brand->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Small Description (500 Words)</label>
                         <textarea type="text" name="small_description" class="form-control" rows="4"></textarea>
                      </div>
                      <div class="mt-3">
                        <label class="mb-2"> Description </label>
                         <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                      </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                        <div class="mt-3">
                            <label class="mb-2">Meta Title</label>
                             <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label class="mb-2">Meta Description </label>
                             <textarea type="text" name="meta_description" class="form-control" rows="4"></textarea>
                          </div> <div class="mt-3">
                            <label class="mb-2"> Meta Keyword </label>
                             <textarea type="text" name="meta_keyword" class="form-control" rows="4"></textarea>
                          </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                       <div class="row">
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Original Price</label>
                                 <input type="text" name="original_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Selling Price</label>
                                 <input type="text" name="selling_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Quantity</label>
                                 <input type="number" name="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Trending</label>
                                 <input type="checkbox" name="trending" style="width: 20px; height:20px;"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Status</label>
                                 <input type="checkbox" name="Status" style="width:20px; height:20px;"/>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                     <div class="mt-3">
                        <label class="mb-3">Upload Product Images</label>
                        <input type="file" name="image[]" multiple class="form-control">
                     </div>
                    </div>

                    <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel"     aria-labelledby="color-tab" tabindex="0">
                        <div class="my-4">
                            <label class="mb-3">Select Color</label>
                            <div class="row">
                                @forelse ($colors as $coloritem )
                                <div class="col-md-3">
                                <div class="p-3 border mb-3">
                                 Color: <input class="mb-3" type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}" style="height: 13px; width:13px;"/> {{$coloritem->name}} <br>
                                 Quntity: <input type="number" name="colorquantity[{{$coloritem->id}}]" style="width:60px; border:1px solid">
                                </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h2>No colors found for this product</h2>
                                </div>
                                @endforelse

                            </div>
                        </div>
                       
                    </div>

                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>

                  </div>
                </form>
            </div>

@endsection
