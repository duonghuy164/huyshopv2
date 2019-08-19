<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //

    // ten trong bang ko cung ten class dmmm
    protected $table='categories';
    // dat lam khoa chinh . neu khong no tu hieu la id
    protected $primaryKey ='cate_id';
    protected $guarded =[];
}
