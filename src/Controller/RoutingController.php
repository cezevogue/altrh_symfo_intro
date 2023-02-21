<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * class Routing
 *
 * L'annotation de route mise au dessus de la classe défini un préfixe pour les urls des routes définies dans la classe
 *
 * @Route("/routing")
 */
class RoutingController extends AbstractController
{
    /**
     *
     *
     * Avec le préfixe de route, l'url est /routing ou /routing/
     *
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('routing/index.html.twig', [
            'controller_name' => 'RoutingController',
        ]);
    }

    /**
     * {qui} est une partie variable de l'url:
     * l'url peut être /routing/bonjour/cesaire
     *  qui vaudra Cesaire
     *
     *
     * @Route("/bonjour/{qui}")
     */
    public function bonjour($qui)
    {
        // $qui vaut cesaire


        return $this->render('routing/bonjour.html.twig', [

            'prenom' => $qui

        ]);
    }

    /**
     * L'url peut être: /routing/salut ,
     * /routing/salut/  , /routing/salut/cesaire
     *
     * Si il n'y a rien derriere le salut, $ vaut "à toi"
     *
     *
     * @Route("/salut/{qui}", defaults={"qui":"à toi"})
     */
    public function salut($qui)
    {


        return $this->render('routing/salut.html.twig', [
            'qui' => $qui

        ]);
    }

    /**
     *Une route avec 2 partie variables dont une optionnelle
     *
     * @Route("/coucou/{prenom}-{nom}", defaults={"nom":""})
     */
    public function coucou($prenom, $nom)
    {

        $nomComplet = $prenom . ' ' . $nom;

        return $this->render('routing/coucou.html.twig', [

            'qui' => $nomComplet
        ]);
    }

    /**
     *id doit être un entier (cf les expressions régulières)
     *
     * @Route("/user/{id}", requirements={"id":"\d+"})
     */
    public function user($id)
    {


        return $this->render('routing/user.html.twig', [
           'id'=>$id

        ]);
    }


}
