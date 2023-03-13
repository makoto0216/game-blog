<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'profile.body' => 'required|string|max:200',
        ];
    }
}