<?php namespace App\Repositories;

use Validator;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /** @var Model $model */
    public $model;

    /** @var array $modelRules */
    public $modelRules;

    /** @var array $customRules */
    public $customRules;

    /** @var array $modelDefaults */
    public $modelDefaults;

    public function __construct(){
        if( ! is_array($this->modelRules)){
            die('You have requested to validate but have not added validation rules to the model.');
        }

        $this->modelRules = $this->model->rules;
        $this->modelDefaults = $this->model->defaults;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function validateAndCreate($data = []){
        if(is_array($this->modelDefaults)){
            $data = array_merge($data, $this->modelDefaults);
        }

        if(is_array($this->customRules) && !empty($this->customRules)){
            foreach($this->customRules as $column => $rule){
                $this->modelRules[$column] = $rule;
            }
        }

        if(!empty($this->modelRules)){
            $validator = Validator::make($data, $this->modelRules);

            if($validator->fails()){
                //todo wayde flash errors from session for forms.
                var_dump($validator->errors());
                die('failed to create');
            } else {
                $autoIncrementedId = $this->model->create($data)->id;
            }
        } else {
            $autoIncrementedId = $this->model->create($data)->id;
        }

        return $autoIncrementedId;
    }

    public function validateAndUpdate($record, $data = []){
        if(is_array($this->modelDefaults)){
            $data = array_merge($data, $this->modelDefaults);
        }

        if(is_array($this->customRules) && !empty($this->customRules)){
            foreach($this->customRules as $column => $rule){
                $this->modelRules[$column] = $rule;
            }
        }

        if(!empty($this->modelRules)){
            $validator = Validator::make($data, $this->modelRules);

            if($validator->fails()){
                //todo wayde flash errors from session for forms.
                var_dump($validator->errors());
                die('failed to update');
            } else {
                $updatedRecord = $record->update($data);
            }
        } else {
            $updatedRecord = $record->update($data);
        }

        return $updatedRecord;
    }
}