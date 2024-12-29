<?php

namespace App\Controller;

use App\Entity\Faculites;
use App\Form\FaculitesType;
use App\Repository\FaculitesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/faculites')]
final class FaculitesController extends AbstractController
{
    #[Route('/faculites', name: 'app_faculites_index')]
    public function index(FaculitesRepository $faculitesRepository): Response
    {
        return $this->render('faculites/index.html.twig', [
            'faculites' => $faculitesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_faculites_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $faculite = new Faculites();
        $form = $this->createForm(FaculitesType::class, $faculite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($faculite);
            $entityManager->flush();

            return $this->redirectToRoute('app_faculites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('faculites/new.html.twig', [
            'faculite' => $faculite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_faculites_show', methods: ['GET'])]
    public function show(Faculites $faculite): Response
    {
        return $this->render('faculites/show.html.twig', [
            'faculite' => $faculite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_faculites_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Faculites $faculite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FaculitesType::class, $faculite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_faculites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('faculites/edit.html.twig', [
            'faculite' => $faculite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_faculites_delete', methods: ['POST'])]
    public function delete(Request $request, Faculites $faculite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $faculite->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($faculite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_faculites_index', [], Response::HTTP_SEE_OTHER);
    }
}
