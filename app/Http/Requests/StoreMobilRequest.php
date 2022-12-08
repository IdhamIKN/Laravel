<?php

namespace App\Http\Requests;

use App\Mobil;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMobilRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mobil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'mobil' => [
                'required',
            ],
            'nopol' => [
                'required',
            ],
        ];
    }
}
