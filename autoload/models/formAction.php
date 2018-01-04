<?php
namespace models;

class formAction{
    public static function buyerErrorSend($f3, $textError)
	{
		\views\page::buyerRegError($f3, 1, $textError);
	}

	public static function buyerDoneSend($f3, $arrayData)
	{   
        $f3->get('DB')->exec(
            'INSERT INTO `buyers`(`id`, `login`, `email`, `password`, `name`, `phone`, `country`, `mark`, `ship`, `shipphone`, `company`, `taxid`, `site`, `companyinfo`, `bankdetail`, `person`, `refcode`) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            array (
                1=> $arrayData[login],
                2=> $arrayData[email],
                3=> sha1($arrayData[password]),
                4=> $arrayData[name],
                5=> $arrayData[phone],
                6=> $arrayData[country],
                7=> $arrayData[mark],
                8=> $arrayData[ship],
                9=> $arrayData[shipphone],
                10=> $arrayData[company],
                11=> $arrayData[taxid],
                12=> $arrayData[site],
                13=> $arrayData[companyinfo],
                14=> $arrayData[bankdetail],
                15=> $arrayData[person],
                16=> $arrayData[refcode]
            )
        );

        //
		//	Отправляем на мыло
		//

		$to  = "finance@m-flowers.com";
		$subject = "M-Flowers | Покупатель - $arrayData[name]";
		$message = "<html><body>
                    <p>Логин: $arrayData[login]</p>
                    <p>Электронная почта: $arrayData[email]</p>
                    <p>ФИО: $arrayData[name]</p>
                    <p>Телефон: $arrayData[phone]</p>
                    <p>Категория суб. ГП: $arrayData[person]</p>
                    <hr>
                    <p>Страна: $arrayData[country]</p>
                    <p>Маркировка: $arrayData[mark]</p>
                    <p>Транспортная компания: $arrayData[ship]</p>
                    <p>Телефон транспортной компании: $arrayData[shipphone]</p>
                    <hr>
                    <p>Название компании: $arrayData[company]</p>
                    <p>ИНН: $arrayData[taxid]</p>
                    <p>Сайт: $arrayData[site]</p>
                    <p>Информация о компании: $arrayData[companyinfo]</p>
                    <p>Банковские данные: $arrayData[bankdetail]</p>
                    <hr>
                    <p>Реферальный код: $arrayData[refcode]</p>
					</body></html>";
      	
        $header = "From: M-Flowers <no-reply@m-flowers.com>\r\n"; 
		$header .= "Reply-To: no-reply@m-flowers.com\r\n"; 
        $header .= "Content-Type: text/html; charset=utf-8\r\n";
        
        if(mail($to,$subject,$message,$header)) {
            $textError = 'Регистрация прошла успешно!';
            formAction::buyerErrorSend($f3, $textError);
        } else {
            $textError = 'При отправке данных произошла ошибка.\nПопробуйте снова.';
            formAction::buyerErrorSend($f3, $textError);
        }
    }
    
    public static function producerErrorSend($f3, $textError)
	{
		\views\page::producerRegError($f3, 1, $textError);
	}

	public static function producerDoneSend($f3, $arrayData)
	{   
        $f3->get('DB')->exec(
            'INSERT INTO `producers`(`id`, `login`, `email`, `password`, `name`, `phone`, `country`, `company`, `taxid`, `site`, `companyinfo`, `bankdetail`) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?)',
            array (
                1=> $arrayData[login],
                2=> $arrayData[email],
                3=> sha1($arrayData[password]),
                4=> $arrayData[name],
                5=> $arrayData[phone],
                6=> $arrayData[country],
                7=> $arrayData[company],
                8=> $arrayData[taxid],
                9=> $arrayData[site],
                10=> $arrayData[companyinfo],
                11=> $arrayData[bankdetail]
            )
        );

        //
		//	Отправляем на мыло
		//

		$to  = "finance@m-flowers.com";
		$subject = "M-Flowers | Производитель - $arrayData[name]";
		$message = "<html><body>
                    <p>Логин: $arrayData[login]</p>
                    <p>Электронная почта: $arrayData[email]</p>
                    <p>ФИО: $arrayData[name]</p>
                    <p>Телефон: $arrayData[phone]</p>
                    <hr>
                    <p>Страна: $arrayData[country]</p>
                    <p>Название компании: $arrayData[company]</p>
                    <p>ИНН: $arrayData[taxid]</p>
                    <p>Сайт: $arrayData[site]</p>
                    <p>Информация о компании: $arrayData[companyinfo]</p>
                    <p>Банковские данные: $arrayData[bankdetail]</p>
					</body></html>";
      	
        $header = "From: M-Flowers <no-reply@m-flowers.com>\r\n"; 
		$header .= "Reply-To: no-reply@m-flowers.com\r\n"; 
        $header .= "Content-Type: text/html; charset=utf-8\r\n";
        
        if(mail($to,$subject,$message,$header)) {
            $textError = 'Регистрация прошла успешно!';
            formAction::producerErrorSend($f3, $textError);
        } else {
            $textError = 'При отправке данных произошла ошибка.\nПопробуйте снова.';
            formAction::producerErrorSend($f3, $textError);
        }
	}
}
?>