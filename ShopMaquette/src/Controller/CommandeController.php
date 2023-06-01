<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Produit;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session,
                            ClientRepository $clientRepository): Response
    {


        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
            'client' => $clientRepository
        ]);
    }
}
