<?php

namespace Caencamp\ConfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Caencamp\ConfBundle\Entity\Talk;
use Caencamp\ConfBundle\Form\TalkType;

class TalkController extends Controller
{
	public function addTalkAction()
	{
		$em = $this->getDoctrine()->getManager();
		$talk = new Talk();
		$form = $this->createForm(new TalkType, $talk);

		//$request = $this->get('request');
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){
			var_dump($form->isSubmitted());
			 $form->handleRequest($request);
			 var_dump($form->isSubmitted());
			 var_dump($form->getErrorsAsString());
			if ($form->isValid()){
				$em->persist($talk);
				$em->flush();
				return $this->redirect($this->generateUrl('caencamp_conf_homepage'));
			}
		}
		return $this->render('CaencampConfBundle:Talk:addTalk.html.twig', array(
			"form" => $form->createView()));
	}

	public function modifyTalkAction(Talk $talk)
		{
			$em = $this->getDoctrine()->getManager();
			$form = $this->createForm(new TalkType, $talk);

			$request = $this->get('request');
			if ($request->getMethod() == 'POST'){
				$form->bind($request);
				if ($form->isValid()){
					$em->persist($talk);
					$em->flush();
					return $this->redirect($this->generateUrl('caencamp_conf_homepage'));
				}
			}
			return $this->render('CaencampConfBundle:Talk:modifyTalk.html.twig', array(
				"form" => $form->createView()));
		}
}
