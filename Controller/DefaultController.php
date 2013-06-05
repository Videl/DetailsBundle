<?php

namespace Videl\DetailsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

    	$entities = $em->getRepository('VidelDetailsBundle:Page')->findOneById(1);

    	if(!$entities)
    		throw $this->createNotFoundException('Write a page!');

    	return $this->render('VidelDetailsBundle:Default:page.html.twig', array(
    		'page' => $entities
    		));
    }

    public function pageAction($page)
    {
    	if(is_string($page))
    	{
    		$em = $this->getDoctrine()->getManager();

        	$entities = $em->getRepository('VidelDetailsBundle:Page')->findOneBySlug($page);

        	if(!$entities)
        		throw $this->createNotFoundException('404 Page Not Found.');

        	return $this->render('VidelDetailsBundle:Default:page.html.twig', array(
        		'page' => $entities
        		));
    	}
    	else
    		throw $this->createNotFoundException('Please insert a slugged title name.');
    }
}
