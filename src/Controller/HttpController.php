<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/http")
 */
class HttpController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('http/index.html.twig', [
            'controller_name' => 'HttpController',
        ]);
    }

    /**
     *On peut utiliser un objet Request grâce à Request $request en
     * paramètre de la méthode, on parle d'injection de dépendance
     *
     * @Route("/requete")
     */
    public function requete(Request $request)
    {
        // l'objet permet de traiter les données de la majeure partie de nos superglobales (principalement pour $_GET et $_POST)

        // http://127.0.0.1:8000/http/requete?nom=desaulle&prenom=cesaire
        // dump()  var_dump() de symfony
        dump($_GET);

        //  $request->query contient un objet qui est une surcouche à $_GET.
        // sa methode all() retourne tout le contenu de $_GET
        dump($request->query->all());

        // echo $_GET['prenom']
        echo $request->query->get('prenom');

        // undefined array key
        //echo $_GET['surnom'];

        // pas d'erreur si la clé n'existe pas
        echo $request->query->get('surnom');


        // valeur par defaut si la clé n'existe pas
        echo '<br>'.$request->query->get('surnom', 'John Doe');

        // isset$_GET['surnom'])
        dump($request->query->has('surnom'));

        echo '<br>'.$request->getMethod(); // GET ou POST

        if ($request->isMethod('POST')){

        // $request->request contient un objet qui est une surcouche à $_POST, et qui possède les mêmes méthodes que $request->query
            dump($request->request->all());
        }




        return $this->render('http/requete.html.twig', [


        ]);
    }


}
