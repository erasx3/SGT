<?php

namespace Pepe\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ThemeBundle:Default:index.html.twig', array('name' => $name));
    }
}
