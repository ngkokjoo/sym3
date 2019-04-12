<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JsonController extends Controller
{
    /**
     * @Route("Json", name="Json")
     */

    public function indexAction(Request $request)
    {
        //$number = rand(0,100);
        //replace this example code with whatever you need
        $data = [
            'name'=>'Ng Kok Joo',
            'firstname'=>'Ng',
            'Lastname'=>'Kok Joo'
        ];

        $json = json_encode($data);
        return new Response($json);

        return $this->render('Json/Json.html.twig', [
            //'number' => $number,
            //'name' => $name,
        ]);
    }
}
