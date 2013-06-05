<?php

namespace Videl\DetailsBundle\Twig;

class PagesExtension extends \Twig_Extension
{

    protected $var;

    public function __construct(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        $this->var = $doctrine->getManager()->getRepository('VidelDetailsBundle:Menu')->findAllOrderedByPosition();
    }

    public function getName()
    {
        return 'pages_extension';
    }

    public function getGlobals()
    {
        return array(
            'all_pages' => $this->var,
            );
    }
}