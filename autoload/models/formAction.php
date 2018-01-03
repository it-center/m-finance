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
        /*
		$to  = "prefecture-ar@yandex.ru";
		$subject = "PREFECTVRA - ".$secname." ".$name;
		$message = "<html><body>
					<p>ФИО: ".$secname." ".$name."</p>
					<p>Телефон: ".$phone."</p>
                    <p>Мест в номере: ".($list+1)."</p>
                    <p>Гости: ".implode(', ', $list_visitors)."</p>
					</body></html>";
      	
        $header_v = "From: PREFECTVRA <no-reply@prefectvra.ru>\r\n"; 
		$header_v .= "Reply-To: no-reply@prefectvra.ru\r\n"; 
        $header_v .= "Content-Type: text/html; charset=utf-8\r\n";
        
        mail($to,$subject,$message,$header_v);

        \views\page::done($f3);
        */
	}
}
?>