<?php

namespace Videl\DetailsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

    	$pages = $em->getRepository('VidelDetailsBundle:Page')->findAll();
        $menus = $em->getRepository('VidelDetailsBundle:Menu')->findAll();

    	return $this->render('VidelDetailsBundle:Admin:index.html.twig', array(
    		'pages' => $pages,
            'menus' => $menus
    		));
    }
}
