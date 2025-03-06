<?php

namespace Webkul\Consultant\Repositories;

use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeValueRepository;
use Webkul\Core\Eloquent\Repository;
use Webkul\Consultant\Contracts\Consultant;

class ConsultantRepository extends Repository
{
    /**
     * Searchable fields.
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'title',
        'email',
        'phone',
    ];

    /**
     * Specify model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Consultant::class;
    }
}
