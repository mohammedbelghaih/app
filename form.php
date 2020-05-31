<?php
    class form{
        public function inputs($type,$name,$class,$id){
            return '<input type='.$type.' name='.$name.' class="'.$class.'" id='.$id.'>';
        }
        public function label($name,$action){
            return '<label for='.$name.' class="label">'.$action.'</label>';
        }
        public function button($name,$class,$action){
            return '<button type="submit" name='.$name.' class="'.$class.'">'.$action.'</button>';
        }
    }
 
?>