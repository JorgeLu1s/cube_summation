<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CubeController extends Controller
{
    /**
     * @Route("/cube")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $content = $request->get('content');

        $cs = $this->get('cube.summation');
        $summa = $cs->cubeSummation($content);

        $data = [
            "data" => $summa,
        ];

        return new JsonResponse($data);
    }
}
