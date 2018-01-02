<?php
namespace views;

class page
{
	public static function main($f3)
	{
		$template = \Template::instance();
		
		echo $template->render("index.html");
    }

    public static function buyer($f3)
	{
		$template = \Template::instance();
		
		echo $template->render("buyer.html");
    }
	
	public static function producer($f3)
	{
		$template = \Template::instance();
		
		echo $template->render("producer.html");
	}
    
    public static function buyerReg($f3)
	{
		$template = \Template::instance();
		
		echo "Регистрация покупателя";
	}

	public static function producerReg($f3)
	{
		$template = \Template::instance();
		
		echo "Регистрация производителя";
	}

	public static function notFound($f3)
	{
		$template = \Template::instance();
		
		echo "Страница не найдена";
	}
}