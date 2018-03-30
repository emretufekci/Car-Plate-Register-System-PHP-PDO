<?php

/**
 * Created by PhpStorm.
 * User: Windows10
 * Date: 3/28/2018
 * Time: 9:31 AM
 */
class DataInputControl
{
    public static function input_control($data)
    {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
}

?>