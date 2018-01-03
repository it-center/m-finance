<?php
namespace controllers;

class formController{
    public function buyerSendData($f3)
	{
        $arrayData = $f3->get('POST');

        foreach ($arrayData as &$value) {
            $value = trim(htmlspecialchars(stripslashes($value)));
        }
        unset($value);

        echo "<pre>";
        print_r($arrayData);
        echo "</pre>";

        /*
		if ((mb_strlen($secname) < 1)||(mb_strlen($secname) > 255)||
            (mb_strlen($name) < 1)||(mb_strlen($name) > 255)||
            (mb_strlen($phone) < 1)||(mb_strlen($phone) > 255)||
            ($list < 2)||($list > 4))
        {
            \models\formAction::errorSend($f3, 1, "Вы не заполнили все поля");
        } elseif (($list==2)&&
                 ((mb_strlen($second_name_1) < 1)||(mb_strlen($second_name_1) > 255)||
                  (mb_strlen($first_name_1) < 1)||(mb_strlen($first_name_1) > 255)||
                  (mb_strlen($second_name_2) < 1)||(mb_strlen($second_name_2) > 255)||
                  (mb_strlen($first_name_2) < 1)||(mb_strlen($first_name_2) > 255)||
                  ($room_3 >= 12)))
        {
            \models\formAction::errorSend($f3, 1, "Вы не заполнили данные гостей");
        } elseif (($list==3)&&
                 ((mb_strlen($second_name_1) < 1)||(mb_strlen($second_name_1) > 255)||
                  (mb_strlen($first_name_1) < 1)||(mb_strlen($first_name_1) > 255)||
                  (mb_strlen($second_name_2) < 1)||(mb_strlen($second_name_2) > 255)||
                  (mb_strlen($first_name_2) < 1)||(mb_strlen($first_name_2) > 255)||
                  (mb_strlen($second_name_3) < 1)||(mb_strlen($second_name_3) > 255)||
                  (mb_strlen($first_name_3) < 1)||(mb_strlen($first_name_3) > 255)||
                  ($room_4 >= 38)))
        {
            \models\formAction::errorSend($f3, 1, "Вы не заполнили данные гостей");
        } elseif (($list==4)&&
                 ((mb_strlen($second_name_1) < 1)||(mb_strlen($second_name_1) > 255)||
                  (mb_strlen($first_name_1) < 1)||(mb_strlen($first_name_1) > 255)||
                  (mb_strlen($second_name_2) < 1)||(mb_strlen($second_name_2) > 255)||
                  (mb_strlen($first_name_2) < 1)||(mb_strlen($first_name_2) > 255)||
                  (mb_strlen($second_name_3) < 1)||(mb_strlen($second_name_3) > 255)||
                  (mb_strlen($first_name_3) < 1)||(mb_strlen($first_name_3) > 255)||
                  (mb_strlen($second_name_4) < 1)||(mb_strlen($second_name_4) > 255)||
                  (mb_strlen($first_name_4) < 1)||(mb_strlen($first_name_4) > 255)||
                  ($room_5 >= 20)))
        {
            \models\formAction::errorSend($f3, 1, "Вы не заполнили данные гостей");
        } else {
            if ($list == 2) {
                $list_visitors = array(
                    1=> $second_name_1.' '.$first_name_1,
                    2=> $second_name_2.' '.$first_name_2,
                );
            } elseif ($list == 3) {
                $list_visitors = array(
                    1=> $second_name_1.' '.$first_name_1,
                    2=> $second_name_2.' '.$first_name_2,
                    3=> $second_name_3.' '.$first_name_3,
                );
            } elseif ($list == 4) {
                $list_visitors = array(
                    1=> $second_name_1.' '.$first_name_1,
                    2=> $second_name_2.' '.$first_name_2,
                    3=> $second_name_3.' '.$first_name_3,
                    4=> $second_name_4.' '.$first_name_4,
                );
            }

            \models\formAction::doneSend($f3, $secname, $name, $phone, $list, $list_visitors);
        }*/
	}
}
?>