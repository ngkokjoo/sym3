<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends Controller
{
    /**
     * @Route("lucky/number/{name}", name="LuckyNumber")
     */

    public function indexAction(Request $request, $name)
    {
        $number = rand(0,100);
        //replace this example code with whatever you need
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
            'name' => $name,
        ]);
    }
}
