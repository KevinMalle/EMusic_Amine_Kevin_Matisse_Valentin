<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Eleve;

class EleveController extends AbstractController
{


    public function listerEleve(): Response
    {
        // initialise une variable qui sera exploitée dans la vue

        $repository = $this->getDoctrine()->getRepository(Eleve::class);
		$eleves = $repository->findAll();
		return $this->render('Eleve/listerEleve.html.twig' , ['pEleves' => $eleves,]);  
    }
    
    
}




