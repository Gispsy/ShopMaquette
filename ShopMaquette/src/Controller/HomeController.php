<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ImageRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProduitRepository $pro): Response
    {
        return $this->render('home/index.html.twig', [
                'produits' => $pro->findAll(),
        ]);
    }
}
