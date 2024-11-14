<?php

namespace WTroiano\TrafficSupplier\Http\Requests;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;

class TrafficSupplierRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:220'],
            'url' => ['nullable', 'string', 'max:220'],
            'login' => ['nullable', 'string', 'max:220'],
            'password' => ['nullable', 'string', 'max:220'],
            'credits' => ['numeric', 'min:0'],
            'status' => [new OnOffRule()]
        ];
    }
}
