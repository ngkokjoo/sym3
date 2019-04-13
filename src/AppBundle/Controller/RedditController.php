<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Reddit;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Doctrine\DBAL\Exception\DatabaseObjectNotFoundException;

date_default_timezone_set("Asia/Kuala_Lumpur");

class RedditController extends Controller
{
    /**
     * @Route("/reddit", name="list")
     */
    public function listAction(Request $request)
    {
        
        $redposts = $this->getDoctrine()->getRepository('AppBundle:Reddit')->findAll();
        // $redposts = $this->getDoctrine()->getRepository('AppBundle:Reddit')->findBy([
        //     'id'=> [1]
        // ]);

        //$post = this->getDoctrine()->getRepository('AppBundle:RedditRepository')->findAll();
        //dump($redpost);die;

        return $this->render('reddit/index.html.twig', [
            'redposts'=>$redposts
        ]);
    }

    /**
     * @route("/reddit/create/{text}", name = "create")
     */
    public function createAction($text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = new Reddit();
        $post->setTitle('create'.' '.$text);
        $post->setDescription('testing for creation');
        $post->setCreatedTime(new \Datetime);

        $em->persist($post);
        $em->flush();

        // var_dump($post);die;

        return $this->redirectToRoute('list');

    }

    /**
     * @route("/reddit/update/{id}/{text}", name = "update")
     */
    public function updateAction($id, $text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Reddit')->find($id);
        /** @var $post Reddit */
        if(!$post){
            throw $this->createNotFoundException("Data Not Found for Update");
        }

        $post->setTitle('update'.' '.$text);

        $em->flush();

        return $this->redirectToRoute('list');

    }

    /**
     * @route("reddit/delete/{id}", name = "delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Reddit')->find($id);

        if(!$post){
            throw $this->createNotFoundException("Data Not Found for Delete");
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('list');

    }
}