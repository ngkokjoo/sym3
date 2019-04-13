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
        // JSON example STARTED
        $data = [
            'name'=>'Ng Kok Joo',
            'firstname'=>'Ng',
            'Lastname'=>'Kok Joo'
        ];

        $json = json_encode($data);
        $response = new Response($json);
        $response->headers->set('content-type','application/json');

        return $response;
        // JSON example ENDED
    }
}
