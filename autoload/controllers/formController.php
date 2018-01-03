<?php
namespace controllers;

class formController{
    public function buyerSendData($f3)
	{
        $arrayData = $f3->get('POST');

        // Чистка данных
        foreach ($arrayData as &$value) {
            $value = preg_replace('/\s\s+/', ' ', trim(htmlspecialchars(stripslashes($value))));
        }
        unset($value);

		if (mb_strlen($arrayData[login]) < 1)             { echo "Вы не заполнили поле Логин"; }
        elseif (mb_strlen($arrayData[login]) > 255)       { echo "Вы ввели больше 255 символов в поле Логин"; }
        elseif (mb_strlen($arrayData[email]) < 1)         { echo "Вы не заполнили поле Электронная почта"; }
        elseif (mb_strlen($arrayData[email]) > 255)       { echo "Вы ввели больше 255 символов в поле Электронная почта"; }
        elseif (mb_strlen($arrayData[password]) < 1)      { echo "Вы не заполнили поле Пароль"; }
        elseif (mb_strlen($arrayData[password]) > 255)    { echo "Вы ввели больше 255 символов в поле Пароль"; }
        elseif (mb_strlen($arrayData[name]) < 1)          { echo "Вы не заполнили поле ФИО"; }
        elseif (mb_strlen($arrayData[name]) > 255)        { echo "Вы ввели больше 255 символов в поле ФИО"; }
        elseif (mb_strlen($arrayData[phone]) < 1)         { echo "Вы не заполнили поле Телефон"; }
        elseif (mb_strlen($arrayData[phone]) > 255)       { echo "Вы ввели больше 255 символов в поле Телефон"; }
        elseif (($arrayData[country]!='ru')&&($arrayData[country]!='es')&&
                ($arrayData[country]!='gb')&&($arrayData[country]!='us')) { echo "Вы не заполнили поле Страна"; }
        elseif (mb_strlen($arrayData[mark]) < 1)          { echo "Вы не заполнили поле Маркировка"; }
        elseif (mb_strlen($arrayData[mark]) > 255)        { echo "Вы ввели больше 255 символов в поле Маркировка"; }
        elseif (mb_strlen($arrayData[ship]) > 255)        { echo "Вы ввели больше 255 символов в поле Транспортная компания"; }
        elseif (mb_strlen($arrayData[shipphone]) > 255)   { echo "Вы ввели больше 255 символов в поле Телефон транспортной компании"; }
        elseif (mb_strlen($arrayData[company]) > 255)     { echo "Вы ввели больше 255 символов в поле Название компании"; }
        elseif (mb_strlen($arrayData[taxid]) > 255)       { echo "Вы ввели больше 255 символов в поле ИНН"; }
        elseif (mb_strlen($arrayData[site]) > 255)        { echo "Вы ввели больше 255 символов в поле Сайт"; }
        elseif (mb_strlen($arrayData[companyinfo]) > 255) { echo "Вы ввели больше 255 символов в поле Информация о компании"; }
        elseif (mb_strlen($arrayData[bankdetail]) > 255)  { echo "Вы ввели больше 255 символов в поле Банковские данные"; }
        elseif (($arrayData[person]!='individual')&&($arrayData[person]!='legal'))
                                                          { echo "Вы не выбрали тип субъекта Гражданского Права"; }
        elseif (mb_strlen($arrayData[refcode]) > 255)     { echo "Вы ввели больше 255 символов в поле Реферальный код"; }
        elseif ($arrayData[check]!=1)                     { echo "Вы не приняли Условия использования и заявление о конфиденциальности"; }
        else                                              { echo "Всё ок!"; }

        echo "<pre>";
        foreach ($arrayData as $key => $value) {
            echo "$key $value\n";
        }
        echo "</pre>";
        /*{
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