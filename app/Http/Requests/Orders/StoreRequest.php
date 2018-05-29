<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if (!empty($this->amount)) {
            $this->amount = str_replace('.', '', $this->amount);
            $this->amount = str_replace(',', '.', $this->amount);
        }
        
        $this->merge(['amount' => $this->amount]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comments' => 'required',
            'lead_id' => 'required',
        ];
    }
}
