<?php

namespace App\Http\Requests;

class BingoRequest extends CustomFormRequest
{
    protected $store = [
        'name' => 'required',
        'password' => 'required',
    ];

    protected $register = [
        'name' => 'required|unique:users',
        'password' => 'required',
    ];

    public function rules(): array
    {
        return $this->{$this->route()->getActionMethod()};
    }
}
