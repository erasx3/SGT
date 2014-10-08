<?php

namespace Pepe\SistemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SistemBundle:Default:index.html.twig');
    }
}
