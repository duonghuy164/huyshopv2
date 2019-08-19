<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function getAddCart($id){
    	$product = Product::find($id);
    	Cart::add(array(
		    'id' => $id,
		    'name' => $product->prod_name,
		    'price' => $product->prod_price,
		    'quantity' => 1,
		    'attributes' => array(
		    	'img'=>$product->prod_img

		    )
        ));

        return redirect('cart/show');

    }

    public function getShowCart(){
    	$data['items']=Cart::getContent();
    	$data['total']=Cart::getTotal();
    	//dd($data['items']);
    	
    	return view('frontend.cart',$data);
    }

    public function getDeleteCart($id){
    	// neu id =all xoa het gio hang 
    	// neu id la prod_id xoa san pham do
    	if($id=='all'){
    		Cart::clear();
    	}else{
    		Cart::remove($id);
    	}
    	return back();

    }
    public function getUpDateCart( Request $request){
    	$qty = $request->qty;
    	$id = $request->id;
    	Cart::update($id, array(
        'quantity' => array(
        'relative' => false,
         'value' => $qty
         ),
));

        return back();  

    }
}
