<?php

namespace Seiffert\CiCollectorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    public function indexAction()
    {
        return $this->render('SeiffertCiCollectorBundle:Api:index.html.twig');
    }
}
