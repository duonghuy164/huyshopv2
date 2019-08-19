<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditCateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // so sanh du lieu trong bang tru cai dang sua
            'name'=>'unique:categories,cate_name,'.$this->segment(4).',cate_id'
        ];
    }
    public function messages(){
        return[
            'name.unique'=>'Danh mục sản phẩm đã tồn tại'


        ];
    }
}
