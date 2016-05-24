<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * @package App
 */
class Payment extends Model
{
    /**
     * @var array
     */
    public $createRules = [
        'user_id' => 'required|max:30',
        'campaign_id' => 'required|int|max:50',
        'reward_id' => 'required|int',
        'amount' => 'required|int',
        'payment_status_id' => 'required|int',
    ];

    /**
     * @var array
     */
    public $updateRules = [
        'user_id' => 'required|max:30',
        'campaign_id' => 'required|int|max:50',
        'reward_id' => 'required|int',
        'amount' => 'required|int',
        'payment_status_id' => 'required|int',
    ];

    /**
     * @var array
     */
    public $defaults = [
        'payment_status_id' => PaymentStatus::PENDING_ID,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'campaign_id', 'amount', 'payment_status_id',
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

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByPaymentStatusId($query, $id)
    {
        return $query->where('payment_status_id', $id);
    }
}
