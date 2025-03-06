<?php

namespace Webkul\Consultant\Providers;

use Webkul\Core\Providers\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \Webkul\Consultant\Models\Consultant::class,
    ];
}
