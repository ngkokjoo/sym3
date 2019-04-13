<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\AppBundle\Entity\post;

// $event = new post();
// $event->setName("John");
// $event->setTime(new \Datetime);
// $event->setLocation("Kg Valdor");
// $event->setDetails("Hometown");
// $event->setNumber("1");

class LuckyController extends Controller
{
    /**
     * @Route("lucky/number/{name}/{count}", name="LuckyNumber")
     */

    public function indexAction(Request $request, $name, $count)
    {
        $number = rand(0,100);
        $arr = array('one','two','three','four'.'five');
        // $arr = ['one','two','three','four'.'five'];
        $workouts = array(
            array(
                'date'=> new \DateTime(),
                'activity'=> 'swimming',
                'hours'=> 1
            ), array(
                'date'=> new \DateTime(),
                'activity'=> 'walking',
                'hours'=> 2
            ), array(
                'date'=> new \DateTime(),
                'activity'=> 'running',
                'hours'=> 3
            )
        );



        //replace this example code with whatever you need
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
            'name' => $name,
            'count'=> $count,
            'arr'=> $arr,
            'workouts'=>$workouts,
        ]);
    }
}
