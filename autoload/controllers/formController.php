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

		if (mb_strlen($arrayData[login]) < 1)             { $textError = "Вы не заполнили поле Логин"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[login]) > 255)       { $textError = "Вы ввели больше 255 символов в поле Логин"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[email]) < 1)         { $textError = "Вы не заполнили поле Электронная почта"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[email]) > 255)       { $textError = "Вы ввели больше 255 символов в поле Электронная почта"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[password]) < 1)      { $textError = "Вы не заполнили поле Пароль"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[password]) > 255)    { $textError = "Вы ввели больше 255 символов в поле Пароль"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[name]) < 1)          { $textError = "Вы не заполнили поле ФИО"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[name]) > 255)        { $textError = "Вы ввели больше 255 символов в поле ФИО"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[phone]) < 1)         { $textError = "Вы не заполнили поле Телефон"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[phone]) > 255)       { $textError = "Вы ввели больше 255 символов в поле Телефон"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (($arrayData[country]!='ru')&&($arrayData[country]!='es')&&
                ($arrayData[country]!='gb')&&($arrayData[country]!='us')) { $textError = "Вы не заполнили поле Страна"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[mark]) < 1)          { $textError = "Вы не заполнили поле Маркировка"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[mark]) > 255)        { $textError = "Вы ввели больше 255 символов в поле Маркировка"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[ship]) > 255)        { $textError = "Вы ввели больше 255 символов в поле Транспортная компания"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[shipphone]) > 255)   { $textError = "Вы ввели больше 255 символов в поле Телефон транспортной компании"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[company]) > 255)     { $textError = "Вы ввели больше 255 символов в поле Название компании"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[taxid]) > 255)       { $textError = "Вы ввели больше 255 символов в поле ИНН"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[site]) > 255)        { $textError = "Вы ввели больше 255 символов в поле Сайт"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[companyinfo]) > 255) { $textError = "Вы ввели больше 255 символов в поле Информация о компании"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[bankdetail]) > 255)  { $textError = "Вы ввели больше 255 символов в поле Банковские данные"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (($arrayData[person]!='individual')&&($arrayData[person]!='legal'))
                                                          { $textError = "Вы не выбрали категорию субъектов Гражданского Права"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[refcode]) > 255)     { $textError = "Вы ввели больше 255 символов в поле Реферальный код"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif ($arrayData[check]!=1)                     { $textError = "Вы не приняли Условия использования и заявление о конфиденциальности"; \models\formAction::buyerErrorSend($f3, $textError); }
        else                                              { \models\formAction::buyerDoneSend($f3, $arrayData); }
    }
    
    public function producerSendData($f3)
	{
        $arrayData = $f3->get('POST');

        // Чистка данных
        foreach ($arrayData as &$value) {
            $value = preg_replace('/\s\s+/', ' ', trim(htmlspecialchars(stripslashes($value))));
        }
        unset($value);

        echo "<pre>";
        print_r($arrayData);
        echo "</pre>";

        /*
		if (mb_strlen($arrayData[login]) < 1)             { $textError = "Вы не заполнили поле Логин"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[login]) > 255)       { $textError = "Вы ввели больше 255 символов в поле Логин"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[email]) < 1)         { $textError = "Вы не заполнили поле Электронная почта"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[email]) > 255)       { $textError = "Вы ввели больше 255 символов в поле Электронная почта"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[password]) < 1)      { $textError = "Вы не заполнили поле Пароль"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[password]) > 255)    { $textError = "Вы ввели больше 255 символов в поле Пароль"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[name]) < 1)          { $textError = "Вы не заполнили поле ФИО"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[name]) > 255)        { $textError = "Вы ввели больше 255 символов в поле ФИО"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[phone]) < 1)         { $textError = "Вы не заполнили поле Телефон"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[phone]) > 255)       { $textError = "Вы ввели больше 255 символов в поле Телефон"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (($arrayData[country]!='ru')&&($arrayData[country]!='es')&&
                ($arrayData[country]!='gb')&&($arrayData[country]!='us')) { $textError = "Вы не заполнили поле Страна"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[mark]) < 1)          { $textError = "Вы не заполнили поле Маркировка"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[mark]) > 255)        { $textError = "Вы ввели больше 255 символов в поле Маркировка"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[ship]) > 255)        { $textError = "Вы ввели больше 255 символов в поле Транспортная компания"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[shipphone]) > 255)   { $textError = "Вы ввели больше 255 символов в поле Телефон транспортной компании"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[company]) > 255)     { $textError = "Вы ввели больше 255 символов в поле Название компании"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[taxid]) > 255)       { $textError = "Вы ввели больше 255 символов в поле ИНН"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[site]) > 255)        { $textError = "Вы ввели больше 255 символов в поле Сайт"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[companyinfo]) > 255) { $textError = "Вы ввели больше 255 символов в поле Информация о компании"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[bankdetail]) > 255)  { $textError = "Вы ввели больше 255 символов в поле Банковские данные"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (($arrayData[person]!='individual')&&($arrayData[person]!='legal'))
                                                          { $textError = "Вы не выбрали категорию субъектов Гражданского Права"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif (mb_strlen($arrayData[refcode]) > 255)     { $textError = "Вы ввели больше 255 символов в поле Реферальный код"; \models\formAction::buyerErrorSend($f3, $textError); }
        elseif ($arrayData[check]!=1)                     { $textError = "Вы не приняли Условия использования и заявление о конфиденциальности"; \models\formAction::buyerErrorSend($f3, $textError); }
        else                                              { \models\formAction::buyerDoneSend($f3, $arrayData); }
        */
	}
}