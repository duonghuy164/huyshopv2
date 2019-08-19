<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
class FrontendController extends Controller
{
    //
    public function getHome(){
    	// lay san pham noi bat
    	$data['featured']=Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
    	// lay san pham moi
    	$data['newproduct'] = Product::orderBy('prod_id','desc')->take(8)->get();
    	
    	return view('frontend.home',$data);
    }
    public function getDeltail($id){
        $data['item']= Product::find($id);
        $data['comments']=Comment::where('com_product',$id)->get();

    	return view('frontend.details',$data);
    }
    public function getCategory($id){
        // click vao danh muc san pham hien ra cac san pham thuoc danh muc
        $data['item']= Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        $data['catename']=Category::find($id);

        return view('frontend.category',$data);
    }
    // comment san pham cua nguoi dung
    public function postComment($id,Request $request){
        $comment = new Comment;
        $comment ->com_name =$request->name;
        $comment->com_email = $request->email;
        $comment ->com_content =$request->content;
        $comment->com_product=$id;

        $comment->save();

        return back();

    }
    public function getSearch(Request $request){
        $result=$request->result;
         $data['keysearch']=$result;
        // thay khoang trang bang sau %
        $result =str_replace(' ', '%', $result);

      
        $data['item'] =Product::where('prod_name','like','%'.$result.'%')->get();

        return view('frontend.search',$data);


    }

}
