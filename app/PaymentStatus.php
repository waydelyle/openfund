<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentStatus
 * @package App
 */
class PaymentStatus extends Model
{
    const PENDING_ID = 1;
    const SUCCESSFUL_ID = 2;
    const FAILED_ID = 3;

    const PENDING_SLUG = 'pending';
    const SUCCESSFUL_SLUG = 'successful';
    const FAILED_SLUG = 'failed';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_statuses';
    
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
