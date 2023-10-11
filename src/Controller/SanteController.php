<?php

namespace App\Controller;

use App\Entity\Sante;
use App\Form\SanteType;
use App\Repository\SanteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sante")
 */
class SanteController extends AbstractController
{
    /**
     * @Route("/", name="sante_index", methods={"GET"})
     */
    public function index(SanteRepository $santeRepository): Response
    {
        return $this->render('sante/index.html.twig', [
            'santes' => $santeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sante_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sante = new Sante();
        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sante);
            $entityManager->flush();

            return $this->redirectToRoute('sante_index');
        }

        return $this->render('sante/new.html.twig', [
            'sante' => $sante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sante_show", methods={"GET"})
     */
    public function show(Sante $sante): Response
    {
        return $this->render('sante/show.html.twig', [
            'sante' => $sante,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sante_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sante $sante): Response
    {
        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sante_index');
        }

        return $this->render('sante/edit.html.twig', [
            'sante' => $sante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sante_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sante $sante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sante->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sante_index');
    }
}
