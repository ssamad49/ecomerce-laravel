<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
     public $category,$product,$prodColorSelectQuantity;

    public function mount($category, $product)
    {
       $this->category = $category;
       $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',
        [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }

    public function colorSelcted($productColorId)
    {

        $productColor = $this->product->productColors()->where('id',$productColorId)->first();

        $this->prodColorSelectQuantity = $productColor->quantity;

        if($this->prodColorSelectQuantity == 0){

            $this->prodColorSelectQuantity = 'outOfStock';
        }



    }
    public function addToWishList($productId)
    {
         if(Auth::check())
         {
            if(wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Already added to wishlist');
                return false;
            }

            else
            {
                $wishlist =wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,

                ]);

                session()->flash('message','wishlist Added succesfully');
            }


         }
         else
         {
            session()->flash('message','please Login to continue');
            return false;
         }
    }
}
