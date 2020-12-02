<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'name'     =>'required',
            'idCat'    =>'not_in:0',
            'area'     =>'required|numeric',
            'address'  =>'required',
            'cost'     =>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn phải nhập tên tin tức',
            'idCat.not_in'    =>'Vui lòng chọn danh mục truyện ', 
            'area.required'=>'Bạn phải nhập diện tích', 
            'area.numeric' =>'Diện tích bạn nhập không đúng',
            'address.required' =>'Bạn phải nhập địa chỉ',
            'cost.required'    =>'Bạn phải nhập giá tiền',
            'cost.integer'     =>'Bạn nhập số tiền không đúng'
        ];
    }
}
