<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     *
     */
    public function index(): Response
    {

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'hello_world'=> 'Voici un message d\'hello world !!!!'
        ]);
    }


    /**
     * @Route("/templating")
     */
    public function templating()
    {

        $demain=new \DateTime('+1day');


        return $this->render('index/templating.html.twig',[
            'date_demain'=>$demain
        ] );

    }



        
    
  
  }