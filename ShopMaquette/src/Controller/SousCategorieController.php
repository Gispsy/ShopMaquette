<?php

namespace App\Controller;

use App\Entity\SousCategorie;
use App\Form\SousCategorieType;
use App\Repository\SousCategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/souscategorieCRUD')]
class SousCategorieController extends AbstractController
{
    #[Route('/', name: 'sous_categorie_index', methods: ['GET'])]
    public function indexSousCategorie(SousCategorieRepository $sousCategorieRepository): Response
    {
        return $this->render('pages/sous_categorie/index.html.twig', [
            'sous_categories' => $sousCategorieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'sous_categorie_new', methods: ['GET', 'POST'])]
    public function newSousCategorie(Request $request, SousCategorieRepository $sousCategorieRepository): Response
    {
        $sousCategorie = new SousCategorie();
        $form = $this->createForm(SousCategorieType::class, $sousCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sousCategorieRepository->save($sousCategorie, true);

            return $this->redirectToRoute('sous_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/sous_categorie/new.html.twig', [
            'sous_categorie' => $sousCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'sous_categorie_show', methods: ['GET'])]
    public function show(SousCategorie $sousCategorie): Response
    {
        return $this->render('pages/sous_categorie/show.html.twig', [
            'sous_categorie' => $sousCategorie,
        ]);
    }

    #[Route('/{id}/edit', name: 'sous_categorie_edit', methods: ['GET', 'POST'])]
    public function editSousCategorie(Request $request, SousCategorie $sousCategorie,
                                    SousCategorieRepository $sousCategorieRepository,
                                    ): Response
    {
        //dd($sousCategorie);
        $form = $this->createForm(SousCategorieType::class, $sousCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sousCategorieRepository->save($sousCategorie, true);

            return $this->redirectToRoute('sous_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pages/sous_categorie/edit.html.twig', [
            'sous_categorie' => $sousCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'sous_categorie_delete', methods: ['POST'])]
    public function deleteSousCategorie(Request $request, SousCategorie $sousCategorie, SousCategorieRepository $sousCategorieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sousCategorie->getId(), $request->request->get('_token'))) {
            $sousCategorieRepository->remove($sousCategorie, true);
        }

        return $this->redirectToRoute('sous_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
