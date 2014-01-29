<?php

namespace Caencamp\ConfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$name = "Sylvain";
    	$em = $this->getDoctrine()->getManager();
    	$talk_list = $em->getRepository("CaencampConfBundle:Talk")->findAll();
        return $this->render('CaencampConfBundle:Default:index.html.twig', array(
        	'name' => $name,
        	'talk_list' => $talk_list));
    }
}
