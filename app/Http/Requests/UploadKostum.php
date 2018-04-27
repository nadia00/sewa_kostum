<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadKostum extends FormRequest
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
        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ];
        $photos = count($this->input('gambar'));
        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }

        return $rules;
    }
}
