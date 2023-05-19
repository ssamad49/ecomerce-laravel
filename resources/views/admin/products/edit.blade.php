@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
           {{session('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="p-2">Update Product
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
                <form action="{{url('admin/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Product Name</label>
                         <input type="text" name="name" value="{{$product->name}}" class="form-control">
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Product Slug</label>
                         <input type="text" name="slug" value="{{$product->slug}}"  class="form-control">
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Select Brand</label>
                        <select name="brand" class="form-control">
                            @foreach ($Brands as $Brand )
                            <option value="{{$Brand->name}}" {{$Brand->name == $product->brand ? 'selected' :''}}>
                                {{$Brand->name}}
                            </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="mt-3">
                        <label class="mb-2">Small Description (500 Words)</label>
                         <textarea type="text" name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                      </div>
                      <div class="mt-3">
                        <label class="mb-2"> Description </label>
                         <textarea type="text" name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                      </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                        <div class="mt-3">
                            <label class="mb-2">Meta Title</label>
                             <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label class="mb-2">Meta Description </label>
                             <textarea type="text" name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                          </div> <div class="mt-3">
                            <label class="mb-2"> Meta Keyword </label>
                             <textarea type="text" name="meta_keyword" class="form-control" rows="4">
                              {{$product->meta_keyword}}</textarea>
                          </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                       <div class="row">
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Original Price</label>
                                 <input type="text" value="{{$product->original_price}}" name="original_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Selling Price</label>
                                 <input type="text" value="{{$product->selling_price}}" name="selling_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Quantity</label>
                                 <input type="number" value="{{$product->quantity}}" name="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Trending</label>
                                 <input type="checkbox" name="trending" {{$product->trending == '1' ?'checked':''}} style="width: 20px; height:20px;"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mt-3">
                                <label class="mb-2">Status</label>
                                 <input type="checkbox" name="Status" {{$product->status == '1' ?'checked':''}} style="width:20px; height:20px;"/>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                     <div class="mt-3">
                        <label class="mb-3">Upload Product Images</label>
                        <input type="file" name="image[]" multiple class="form-control">
                     </div>
                     <div>
                        @if ($product->productImages)
                        <div class="row">
                            @foreach ($product->productImages as $image )
                            <div class="col-md-2 text-center">
                            <img src="{{asset($image->image)}}" class="rounded-top my-3 border" style="width: 80px;"  alt="">
                            <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-flex justify-content-center text-decoration-none text-danger">delete</a>

                             </div>
                            @endforeach
                        </div>
                        @else
                        <h4>No image Added</h4>
                        @endif
                     </div>
                    </div>
                    <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                        <div class="mt-3">
                            <h4 class="mb-3 p-2">Select Color</h4>
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
                        <div class=" table-responsive">
                            <h4 class="p-2">Color Product</h4>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($product->productColors as $prodColor )

                                    <tr class="prod-color-tr">
                                        <td>
                                            @if ($prodColor->color)
                                            {{$prodColor->color->name}}
                                            @else
                                            No Color fund forthis product
                                            @endif
                                        </td>
                                        <td>
                                            <div class=" input-group mb-3" style="width:150px ">
                                            <input type="text" name="" value="{{$prodColor->quantity}}" class="productColorQuantity form-control form-control-sm">
                                            <button type="button" value="{{$prodColor->id}}" class=" updateproductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$prodColor->id}}" class="deleteproductColorBtn btn btn-sm btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary float-end">update</button>

                  </div>
                </form>
            </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $(document).on('click', '.updateproductColorBtn' , function () {

            var product_id = "{{$product->id}}"
            var prod_color_id =$(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

            if(qty <= 0 ){
                alert('Qunatity is required');
                return false;
            }

            var data = {
                'product_id' : product_id,
                'qty': qty
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+prod_color_id,
                data: data,
                success: function (response) {
                   alert(response.message)
                }
            });

         });
         $(document).on('click', '.deleteproductColorBtn' , function () {

            var prod_color_id =$(this).val();
            var thisClick= $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product-color/"+prod_color_id+"/delete",
                success: function (response) {
                   thisClick.closest('.prod-color-tr').remove();

                   alert(response.message);
                }
            });
         });
    });
</script>
@endsection
