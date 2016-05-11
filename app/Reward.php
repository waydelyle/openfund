<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reward
 * @package App
 */
class Reward extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rewards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'campaign_id', 'label', 'description', 'amount', 'reward_limit',
    ];

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByCampaignId($query, $id)
    {
        return $query->where('campaign_id', $id);
    }
}
