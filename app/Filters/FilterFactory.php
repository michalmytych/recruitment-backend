<?php

namespace App\Filters;

use Illuminate\Http\Request;

final class FilterFactory
{
    public function makeFromRequest(Request $request): Filter
    {
        return new Filter(
            column: $request->get('column'),
            operatorAlias: $request->get('operator'),
            value: $request->get('value'),
        );
    }
}
