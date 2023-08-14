<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorieCRUD')]
class CategorieController extends AbstractController
{
    #[Route('/', name: 'categorie_index', methods: ['GET'])]
    public function indexCrudCategorie(CategorieRepository $categorieRepository): Response
    {
        return $this->render('pages/categorie/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'categorie_new', methods: ['GET', 'POST'])]
    public function createNewCategorie(
        Request $request,
        CategorieRepository $categorieRepository): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieRepository->save($categorie, true);

            return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/categorie/new.html.twig', [
            'categorie' => $categorie,
            'form' => $form,
        ]);
    }
    

    #[Route('/{id}', name: 'categorie_show', methods: ['GET'])]
    public function showCategorie(Categorie $categorie): Response
    {
        return $this->render('pages/categorie/show.html.twig', [
            'categorie' => $categorie,
        ]);
    }

    #[Route('/{id}/edit', name: 'categorie_edit', methods: ['GET', 'POST'])]
    public function editCategorie(
        Request $request,
        Categorie $categorie, 
        CategorieRepository $categorieRepository): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieRepository->save($categorie, true);

            return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/categorie/edit.html.twig', [
            'categorie' => $categorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'categorie_delete', methods: ['POST'])]
    public function deleteCategorie(
        Request $request, 
        Categorie $categorie, 
        CategorieRepository $categorieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorie->getId(), $request->request->get('_token'))) {
            $categorieRepository->remove($categorie, true);
        }

        return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
    }


}
