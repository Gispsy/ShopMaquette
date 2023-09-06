<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FactureController extends AbstractController
{
    #[Route('/facture/{id}', name: 'app_facture')]
    public function facture(
        Facture $facture,
        Commande $commande): Response
    {
        // Obtenir l'utilisateur connecté
        $user = $this->getUser();

        //Condition si l'utilisateur n'est plus connecter
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        //Vas sur la vue de facture.html.twig
        return $this->render('facture/index.html.twig', [
            'facture' => $facture,
            'commande' => $commande
        ]);
    }
}
