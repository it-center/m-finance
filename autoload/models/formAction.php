<?php
namespace models;

class formAction{
    public static function buyerErrorSend($f3, $textError)
	{
		\views\page::buyerRegError($f3, 1, $textError);
	}

	public static function buyerDoneSend($f3, $arrayData)
	{
        /*
        $f3->get('DB')->exec(
            'INSERT INTO `booking`(`id`, `name`, `phone`, `list`, `list_visitors`) VALUES (?,?,?,?,?)',
            array (
                1=> NULL,
                2=> $secname.' '.$name,
                3=> $phone,
                4=> intval($list),
                5=> json_encode($list_visitors)
            )
        );

        //
		//	Отправляем на мыло
		//

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