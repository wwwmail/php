<?php


class HtmlHelper
{
    public static function getSelect(array $array, array $params=[], $isMulti=false)
    {

        $param = '';

        foreach ($params as $key=>$val)
        {
            $param .= " ".$key."=". $val ;
        }

        $muli = '';
        if($isMulti){
            $multi = 'multiple name=name[]';
        }

        if(count($array) >0 ){
            $str = "<select $multi $param>";


            foreach ($array as $value){
                $str.= "<option value = '$value'>".ucfirst($value)."</option>";
            }

            $str.="</select>";

            return $str;
        }else{
            return EMPTY_VAL;   
        }
       
    }




    public static function getTable(array $data, array $params=[])
    {
        $param = '';

        foreach ($params as $key=>$val)
        {
            $param .= " ".$key."=". $val ;
        }     

        if(count($data) > 0){ 
            $str = "<table $param>";

            for($i = 0; $i < count($data); $i++){

                $str.='<tr>';
                for($k=0; $k <count($data[$i]); $k++){

                    $str.='<td>'.$data[$i][$k].'</td>';

                }

                $str.='</tr>';

            }

            $str .= '</table>';
            return $str;

        }else{

            return EMPTY_VAL;
        }
    }

    public static function getListSimple(array $data, $params=[])
    {
        $param = '';

        foreach ($params as $key=>$val)
        {
            $param .= " ".$key."=". $val ;
        }
        if(count($data) > 0){
            $str = "<ul $param>";
            foreach($data as $item){
                $str .= '<li>'.$item.'</li>';
            }    

            $str .= '</ul>';

            return $str; 
        }else{

            return EMPTY_VAL;
        }
    }


    public static function getListNum(array $data, $params=[])
    {
        $param = '';

        foreach ($params as $key=>$val)
        {
            $param .= " ".$key."=". $val ;
        }

        if(count($data) > 0){
            $str = "<ol $param>";
            foreach($data as $item){
                $str .= '<li>'.$item.'</li>';
            }    

            $str .= '</ol>';

            return $str;
        }else{

            return EMPTY_VAL;
        }

    }

    public static function getDl(array $data, $params=[])
    {
        $param = '';

        foreach ($params as $key => $val)
        {
            $param .= " ".$key."=". $val ;
        }
        if(count($data) > 0){
            $str = "<dl $param>";
            foreach($data as $key=>$value){
                $str .= '<dt>'.$key.'</dt>';
                $str .='<dd>'.$value.'</dd>';
            }    

            $str .= '</dl>';

            return $str;
        }else{
            return EMPTY_VAL;
        }
    }


    public static function getRadio(array $data, $group, $params =[])
    {
        $param = '';

        foreach ($params as $key => $val)
        {
            $param .= " ".$key."=". $val ;
        }

        if(count($data) > 0 && !empty($group)){
            $str = '';
            foreach ($data as $value){

                $str .= "<input type='radio' name=$group value=$value   $param>".$value."<br>";

            }

            return $str;

        }else{
            return EMPTY_VAL;
        }

    }


    public static function getCheckbox(array $data,  $params =[])
    {
        $param = '';

        foreach ($params as $key => $val)
        {
            $param .= " ".$key."=". $val ;
        }


        if(count($data) > 0){

            $str = ''; 

            foreach ($data as $key => $value){

                $str .= "<input type='checkbox' name=$key value=$value   $param>".$value."<br>";

            }

            return $str;
        }else{
            return EMPTY_VAL;
        }
    }


}

