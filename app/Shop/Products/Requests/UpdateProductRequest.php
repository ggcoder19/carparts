<?php

namespace App\Shop\Products\Requests;

use App\Shop\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_number' => ['required', Rule::unique('products')->ignore($this->segment(3))],
            'sku' => ['required'],
            'name' => ['required'],
            'quantity' => ['required', 'integer'],
            'price' => ['required']
        ];
    }
}
