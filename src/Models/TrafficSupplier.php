<?php

namespace WTroiano\TrafficSupplier\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;
use Botble\Revision\RevisionableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrafficSupplier extends BaseModel
{
    use SoftDeletes;
    use RevisionableTrait;

    protected $table = 'sc_traffic_suppliers';

    protected $fillable = [
        'name',
        'url',
        'login',
        'password',
        'credits',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'url' => SafeContent::class,
        'login' => SafeContent::class,
        'password' => SafeContent::class,
        'name' => SafeContent::class,
    ];
}
