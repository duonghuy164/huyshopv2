<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
    protected $primaryKey ='prod_id';
    protected $guarded =[];

    public function Category(){
    	return $this->belongsTo('App\Category','cate_id','prod_cate');
    }
}
