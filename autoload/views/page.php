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
		
		echo $template->render("buyer-form.html");
	}

	public static function buyerRegError($f3, $codeError, $textError)
	{
		$template = \Template::instance();
		$f3->set('codeError', $codeError);
		$f3->set('textError', $textError);
		
		echo $template->render("buyer-form.html");
	}

	public static function producerReg($f3)
	{
		$template = \Template::instance();
		
		echo $template->render("producer-form.html");
	}

	public static function producerRegError($f3, $codeError, $textError)
	{
		$template = \Template::instance();
		$f3->set('codeError', $codeError);
		$f3->set('textError', $textError);
		
		echo $template->render("producer-form.html");
	}

	public static function notFound($f3)
	{
		$template = \Template::instance();
		
		echo "Страница не найдена";
	}
}