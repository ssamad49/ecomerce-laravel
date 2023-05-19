<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
                 <div class="card">
                   <div class="card-header">
                      <h4>Brand</h4>
                   </div>
                   <div class="card-body">
                   @foreach ($category->brands as $brandItem )
                   <label  class="d-block">
                       <input type="checkbox" wire:model="brandInputs" value="{{$brandItem->name}}">{{$brandItem->name}}
                   </label>
                   @endforeach
                    </div>
                 </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                 <label  class="d-block">
                     <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low">High to Low
                 </label>
                 <label  class="d-block">
                     <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high">Low to High
                 </label>
                </div>
             </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products  as $prod)
                <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($prod->quantity > 0)
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-danger">Out of Stock</label>
                        @endif
                        @if ($prod->productImages->count() > 0)
                        <a href="{{url('/collections/'.$prod->category->slug.'/'.$prod->slug)}}">
                        <img src="{{asset($prod->productImages[0]->image)}}" alt="{{$prod->name}}">
                       </a>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$prod->brand}}</p>
                        <h5 class="product-name">
                           <a href="{{url('/collections/'.$prod->category->slug.'/'.$prod->slug)}}">
                            {{$prod->name}}
                           </a>
                        </h5>
                        <div>
                            <span class="selling-price">{{$prod->selling_price}}MAD</span>
                            <span class="original-price">{{$prod->original_price}}MAD</span>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
                        </div>
                    </div>
                </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>There is no product available for {{$category->name}} </h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
   </div>

</div>
