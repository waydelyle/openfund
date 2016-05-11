<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordStatus
 * @package App
 */
class RecordStatus extends Model
{
    const ACTIVE_ID = 1;
    const NOT_ACTIVE_ID = 2;

    const ACTIVE_SLUG = 'active';
    const NOT_ACTIVE_SLUG = 'not-active';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'record_statuses';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'label', 'description',
    ];

    /**
     * @param $query
     * @param $slug
     * @return mixed
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
