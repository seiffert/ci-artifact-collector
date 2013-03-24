<?php

namespace Seiffert\CiCollectorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SeiffertCiCollectorBundle:Default:index.html.twig');
    }
}
