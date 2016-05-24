<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Campaign
 * @package App
 */
class Campaign extends Model
{
    /**
     * @var array
     */
    public $createRules = [
        'name' => 'required|unique:campaigns|max:30',
        'campaign_category_id' => 'required|int|max:50',
        'description' => 'required|max:140',
        'amount' => 'required|int',
    ];

    public $defaults = [
        'campaign_status_id' => CampaignStatus::PENDING_ID,
        'record_status_id' => RecordStatus::ACTIVE_ID
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campaigns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'campaign_category_id', 'description', 'amount', 'campaign_status_id', 'funding_status_id',
    ];

    /**
     * @return array
     */
    public static function validationArray(){
        return [
            'name' => 'required|unique:campaigns|max:30',
            'campaign_category_id' => 'required|int|max:50',
            'description' => 'required|max:140',
            'amount' => 'required|int',
        ];
    }

    /**
     * Usage example Campaign::ByUserId($userId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }

    /**
     * Usage example Campaign::ByCampaignCategoryId($categoryId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByCampaignCategoryId($query, $id)
    {
        return $query->where('campaign_category_id', $id);
    }

    /**
     *  Usage example Campaign::ByCampaignStatusId($campaignId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByCampaignStatusId($query, $id)
    {
        return $query->where('campaign_status_id', $id);
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByFundingStatusId($query, $id)
    {
        return $query->where('funding_status_id', $id);
    }

    /**
     * Get the campaign status related to this campaign.
     */
    public function campaignStatus()
    {
        return $this->belongsTo('App\CampaignStatus', 'campaign_status_id');
    }

    /**
     * Get the funding status related to this campaign.
     */
    public function fundingStatus()
    {
        return $this->belongsTo('App\FundingStatus', 'funding_status_id');
    }

    /**
     * Get the category related to this campaign.
     */
    public function category()
    {
        return $this->belongsTo('App\CampaignCategory', 'campaign_category_id');
    }
}
