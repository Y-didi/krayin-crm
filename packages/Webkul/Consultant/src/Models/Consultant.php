<?php

namespace Webkul\Consultant\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Activity\Models\ActivityProxy;
use Webkul\Activity\Traits\LogsActivity;
use Webkul\Attribute\Traits\CustomAttribute;
use Webkul\Consultant\Contracts\Consultant as ConsultantContract;
use Webkul\Tag\Models\TagProxy;



class Consultant extends Model implements ConsultantContract
{
    use CustomAttribute, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'email',
        'phone',
        'tjm',
        'cjm',
    ];


    /**
     * The tags that belong to the Products.
     */
    public function tags()
    {
        return $this->belongsToMany(TagProxy::modelClass(), 'consultant_tags');
    }

    /**
     * Get the activities.
     */
    public function activities()
    {
        return $this->belongsToMany(ActivityProxy::modelClass(), 'consultant_activities');
    }
}
