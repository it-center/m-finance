<?php
namespace controllers;

class formController{
    public function sendData($f3)
	{
        $secname = $f3->get('POST.second_name');
        $name = $f3->get('POST.first_name');
        $phone = $f3->get('POST.phone');
        $list = $f3->get('POST.list');
        $second_name_1 = $f3->get('POST.second_name_1');
        $first_name_1 = $f3->get('POST.first_name_1');
        $second_name_2 = $f3->get('POST.second_name_2');
        $first_name_2 = $f3->get('POST.first_name_2');
        $second_name_3 = $f3->get('POST.second_name_3');
        $first_name_3 = $f3->get('POST.first_name_3');
        $second_name_4 = $f3->get('POST.second_name_4');
        $first_name_4 = $f3->get('POST.first_name_4');

        $secname = trim(htmlspecialchars(stripslashes($secname)));
        $name = trim(htmlspecialchars(stripslashes($name)));
        $phone = trim(htmlspecialchars(stripslashes($phone)));
        $list = trim(htmlspecialchars(stripslashes($list)));
        $second_name_1 = trim(htmlspecialchars(stripslashes($second_name_1)));
        $first_name_1 = trim(htmlspecialchars(stripslashes($first_name_1)));
        $second_name_2 = trim(htmlspecialchars(stripslashes($second_name_2)));
        $first_name_2 = trim(htmlspecialchars(stripslashes($first_name_2)));
        $second_name_3 = trim(htmlspecialchars(stripslashes($second_name_3)));
        $first_name_3 = trim(htmlspecialchars(stripslashes($first_name_3)));
        $second_name_4 = trim(htmlspecialchars(stripslashes($second_name_4)));
        $first_name_4 = trim(htmlspecialchars(stripslashes($first_name_4)));

        $room_3 = $f3->get('DB')->exec('SELECT COUNT(`id`) FROM `booking` WHERE `list`=2');
        $room_4 = $f3->get('DB')->exec('SELECT COUNT(`id`) FROM `booking` WHERE `list`=3');
        $room_5 = $f3->get('DB')->exec('SELECT COUNT(`id`) FROM `booking` WHERE `list`=4');

        $room_3 = $room_3[0]["COUNT(`id`)"];
        $room_4 = $room_4[0]["COUNT(`id`)"];
        $room_5 = $room_5[0]["COUNT(`id`)"];

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
        }
	}
}
?>