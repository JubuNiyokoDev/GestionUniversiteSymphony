<?php

// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EtudiantsRepository;
use App\Repository\FaculitesRepository;
use App\Repository\DepartementsRepository;
use App\Repository\ClasseRepository;
use App\Repository\InscriptionsRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        EtudiantsRepository $etudiantsRepository,
        FaculitesRepository $faculitesRepository,
        DepartementsRepository $departementsRepository,
        ClasseRepository $classesRepository,
        InscriptionsRepository $inscriptionsRepository
    ): Response {
        return $this->render('home/index.html.twig', [
            'etudiants' => $etudiantsRepository->findAll(),
            'faculites' => $faculitesRepository->findAll(),
            'departements' => $departementsRepository->findAll(),
            'classes' => $classesRepository->findAll(),
            'inscriptions' => $inscriptionsRepository->findAll(),
        ]);
    }
}
