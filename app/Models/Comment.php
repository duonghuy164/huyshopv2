<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    // ten trong bang ko cung ten class dmmm
    protected $table='comment';
    // dat lam khoa chinh . neu khong no tu hieu la id
    protected $primaryKey ='com_id';
    protected $guarded =[];
}
