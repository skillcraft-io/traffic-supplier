<?php

return [
    [
        'name' => 'Traffic suppliers',
        'flag' => 'traffic-supplier.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'traffic-supplier.create',
        'parent_flag' => 'traffic-supplier.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'traffic-supplier.edit',
        'parent_flag' => 'traffic-supplier.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'traffic-supplier.destroy',
        'parent_flag' => 'traffic-supplier.index',
    ],
];
