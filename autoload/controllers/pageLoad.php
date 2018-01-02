<?php
namespace controllers;

class pageLoad
{
	public function mainPage($f3)
	{        
        \views\page::main($f3);
    }
    
    public function buyerPage($f3)
    {
        \views\page::buyer($f3);
    }

    public function producerPage($f3)
    {
        \views\page::producer($f3);
    }

    public function buyerRegPage($f3)
    {
        \views\page::buyerReg($f3);
    }

    public function producerRegPage($f3)
    {
        \views\page::producerReg($f3);
    }

    public function notFoundPage($f3)
	{
		\views\page::notFound($f3);
	}
}