<?php  namespace App\Modules;

/**
 * Class FormModule
 */
class FormModule {

    /**
     * Renders the basic form tags with csrf token and OpenFund html structure.
     *
     * @param $postTo
     * @param $heading
     * @return mixed
     */
    public static function open($heading, $postTo = ''){
        return view('form.open', ['postTo' => $postTo, 'heading' => $heading]);
    }

    /**
     * Renders a basic form field with OpenFund html structure.
     *
     * @param $name
     * @param $type
     * @param null $id
     * @param null $placeholder
     * @return mixed
     */
    public static function field($type, $name, $id = null, $placeholder = null){
        if(empty($id)){
            $id = $name;
        }

        return view('form.field', ['name' => $name, 'type' => $type, 'id' => $id, 'placeholder' => $placeholder]);
    }

    public static function text(){
        return view('form.field', ['name' => $name,'id' => $id, 'placeholder' => $placeholder]);
    }

    /**
     * Renders the form close tag with submit button and OpenFund html structure.
     *
     * @param string $submitButtonText
     * @return mixed
     */
    public static function close($submitButtonText = 'Next'){
        return view('form.close', ['submitButtonText' => $submitButtonText]);
    }
}