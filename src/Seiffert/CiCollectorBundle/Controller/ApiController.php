<?php

namespace Seiffert\CiCollectorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function indexAction(Request $request)
    {
        file_put_contents('/tmp/request-' . microtime(), $request->getContent());

        return $this->render('SeiffertCiCollectorBundle:Api:index.html.twig');
    }
}
