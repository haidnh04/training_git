<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //trả về true nếu muốn phần validate hoạt động
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    // các rule lỗi cần bắt validate
    public function rules()
    {
        return [
            'product-name' => 'required|min:6',
            'product-price' => 'required|integer'
        ];
    }

    //lời nhắn khi gặp lỗi
    public function messages()
    {

        return [
            //Lỗi cần nhập thì hiện lời nhắn => ...
            'product-name.required' => 'Bạn cần nhập :attribute',
            //Lỗi tối thiếu cần 6 ký tự thì hiện lời nhắn => ...
            'product-name.min' => 'Bạn cần nhập :attribute đủ 6 ký tự',
            'product-price.required' => 'Bạn cần nhập :attribute',
            //Lỗi bắt buộc phải nhập số => ......
            'product-price.integer' => 'Bạn cần nhập :attribute là số'
        ];
    }

    //Đổi attribute thành tên khác
    public function attributes()
    {
        return [
            'product-name' => 'tên sản phẩm',
            'product-price' => 'giá sản phẩm'
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Có lỗi xảy ra vui lòng kiểm tra lại');
            }
        });
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'create_at' => date('Y-m-d H:i:s')
        ]);
    }
}
