<?php
class Validation{
    public function checkValidation($validateItem){
        $error = [];
        
            foreach ($validateItem as $key => $value) {
                if (empty($value)) {
                $error[$key] = $key.' is required';
                }
            }
        return $error;
    }
}
?>