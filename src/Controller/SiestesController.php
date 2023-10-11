<?php

namespace App\Controller;

use App\Entity\Siestes;
use App\Form\SiestesType;
use App\Repository\SiestesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/siestes")
 */
class SiestesController extends AbstractController
{
    /**
     * @Route("/", name="siestes_index", methods={"GET"})
     */
    public function index(SiestesRepository $siestesRepository): Response
    {
        return $this->render('siestes/index.html.twig', [
            'siestes' => $siestesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="siestes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sieste = new Siestes();
        $form = $this->createForm(SiestesType::class, $sieste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sieste);
            $entityManager->flush();

            return $this->redirectToRoute('siestes_index');
        }

        return $this->render('siestes/new.html.twig', [
            'sieste' => $sieste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="siestes_show", methods={"GET"})
     */
    public function show(Siestes $sieste): Response
    {
        return $this->render('siestes/show.html.twig', [
            'sieste' => $sieste,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="siestes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Siestes $sieste): Response
    {
        $form = $this->createForm(SiestesType::class, $sieste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('siestes_index');
        }

        return $this->render('siestes/edit.html.twig', [
            'sieste' => $sieste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="siestes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Siestes $sieste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sieste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sieste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('siestes_index');
    }
}
