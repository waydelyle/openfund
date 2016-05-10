<?php namespace App\Repositories;

use Validator;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /** @var Model $model */
    public $model;

    /**
     * @param array $data
     * @return mixed
     */
    public function validateAndCreate($data = []){
        if( ! is_array($this->model->rules)){
            die('You have requested to validate but have not added validation rules to the model.');
        }

        if(is_array($this->model->defaults)){
            $data = array_merge($data, $this->model->defaults);
        }

        $validator = Validator::make($data, $this->model->rules);

        if( ! $validator->fails()){
            $autoIncrementedId = $this->model->create($data)->id;
        } else {
            //todo wayde flash errors from session for forms.
            var_dump($validator->errors());
            die('failed to create');
        }

        return $autoIncrementedId;
    }
}