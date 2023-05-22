<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(Request $request, 
                                User $user,
                                EntityManagerInterface $manager,
                                UserPasswordHasherInterface $hasher): Response

    {
        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);

        return $this->render('pages/user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
