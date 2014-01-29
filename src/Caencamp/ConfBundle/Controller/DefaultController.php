<?php

namespace Caencamp\ConfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$name = "Sylvain";
        return $this->render('CaencampConfBundle:Default:index.html.twig', array('name' => $name));
    }
}
