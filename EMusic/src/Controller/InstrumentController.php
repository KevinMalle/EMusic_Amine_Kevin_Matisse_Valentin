<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentController extends AbstractController
{

    public function listerInstrument(): Response
    {
        // initialise une variable qui sera exploitée dans la vue

        $repository = $this->getDoctrine()->getRepository(Instrument::class);
		$etudiants = $repository->findAll();
		return $this->render('Instrument/lister.html.twig', ['pInstruments' => $instruments,]);
    }
    
    
}

