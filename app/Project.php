<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'project_category_id', 'description', 'amount', 'project_status_id', 'funding_status_id',
    ];

    /**
     * @return array
     */
    public static function validationArray(){
        return [
            'name' => 'required|unique:projects|max:30',
            'project_category_id' => 'required|int|max:2',
            'description' => 'required|max:140',
            'amount' => 'required|int',
        ];
    }

    /**
     * Usage example Project::ByUserId($userId)->get();
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
     * Usage example Project::ByProjectCategoryId($categoryId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByProjectCategoryId($query, $id)
    {
        return $query->where('project_category_id', $id);
    }

    /**
     *  Usage example Project::ByProjectStatusId($projectId)->get();
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeByProjectStatusId($query, $id)
    {
        return $query->where('project_status_id', $id);
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
     * Get the project status related to this project.
     */
    public function projectStatus()
    {
        return $this->belongsTo('App\ProjectStatus', 'project_status_id');
    }

    /**
     * Get the funding status related to this project.
     */
    public function fundingStatus()
    {
        return $this->belongsTo('App\FundingStatus', 'funding_status_id');
    }

    /**
     * Get the category related to this project.
     */
    public function category()
    {
        return $this->belongsTo('App\ProjectCategory', 'project_category_id');
    }
}
