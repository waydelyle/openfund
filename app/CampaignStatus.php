<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CampaignStatus
 * @package App
 */
class CampaignStatus extends Model
{
    const PENDING_ID = 1;
    const ACCEPTED_ID = 2;
    const REJECTED_ID = 3;
    const FUNDED_ID = 4;
    const NOT_FUNDED_ID = 5;
    const FEATURED_ID = 6;

    const PENDING_SLUG = 'pending';
    const ACCEPTED_SLUG = 'accepted';
    const REJECTED_SLUG = 'rejected';
    const FUNDED_SLUG = 'funded';
    const NOT_FUNDED_SLUG = 'not-funded';
    const FEATURED_SLUG = 'featured';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaign_statuses';
    
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
