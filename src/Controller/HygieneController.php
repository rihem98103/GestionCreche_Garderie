<?php

namespace App\Controller;

use App\Entity\Hygiene;
use App\Form\HygieneType;
use App\Repository\HygieneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hygiene")
 */
class HygieneController extends AbstractController
{
    /**
     * @Route("/", name="hygiene_index", methods={"GET"})
     */
    public function index(HygieneRepository $hygieneRepository): Response
    {
        return $this->render('hygiene/index.html.twig', [
            'hygienes' => $hygieneRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hygiene_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hygiene = new Hygiene();
        $form = $this->createForm(HygieneType::class, $hygiene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hygiene);
            $entityManager->flush();

            return $this->redirectToRoute('hygiene_index');
        }

        return $this->render('hygiene/new.html.twig', [
            'hygiene' => $hygiene,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hygiene_show", methods={"GET"})
     */
    public function show(Hygiene $hygiene): Response
    {
        return $this->render('hygiene/show.html.twig', [
            'hygiene' => $hygiene,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hygiene_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hygiene $hygiene): Response
    {
        $form = $this->createForm(HygieneType::class, $hygiene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hygiene_index');
        }

        return $this->render('hygiene/edit.html.twig', [
            'hygiene' => $hygiene,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hygiene_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Hygiene $hygiene): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hygiene->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hygiene);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hygiene_index');
    }
}
