<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'project_id', 'amount', 'payment_status_id',
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
    public function scopeByProjectId($query, $id)
    {
        return $query->where('project_id', $id);
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
