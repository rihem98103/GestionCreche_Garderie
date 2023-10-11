<?php

namespace App\Controller;

use App\Entity\Bebe;
use App\Form\BebeType;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\BebeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BebeController extends AbstractController
{    
   
    
    /**
    * @Route("/home",name="bebe_list")
    */
    public function home (Request $request)
    {
      $propertySearch = new PropertySearch();
      $form = $this->createForm(PropertySearchType::class,$propertySearch);
      $form->handleRequest($request);
     //initialement le tableau des articles est vide, 
     //c.a.d on affiche les articles que lorsque l'utilisateur clique sur le bouton rechercher
      $bebes= [];
      
     if($form->isSubmitted() && $form->isValid()) {
     //on récupère le nom d'article tapé dans le formulaire
      $nom = $propertySearch->getNom();   
      if ($nom!="") 
        //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
        $bebes= $this->getDoctrine()->getRepository(Bebe::class)->findBy(['nom' => $nom] );
      else   
        //si si aucun nom n'est fourni on affiche tous les articles
        $bebes= $this->getDoctrine()->getRepository(Bebe::class)->findAll();
     }
      return  $this->render('bebe/test.html.twig',[
        'bebeForm' => $form->createView(),

       'bebes' => $bebes
    ]);  
    }


    /**
    * @Route("/creer",name="create")
    */
    public function createbebe(Request $request , EntityManagerInterface $entityManager)
      {
        $repo =$this->getDoctrine()->getRepository(Bebe::class);
        $bebes=$repo->findAll();

        $bebe = new Bebe ();
        $form = $this->createForm(BebeType::class, $bebe);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
       
         $entityManager->persist($bebe);
         $entityManager->flush();
         
         //return $this->redirectToRoute('bebe_list');  
       
        }
        return $this->render('bebe/create.html.twig',[
            'bebeForm' =>$form->createView(),
            'bebes'=>$bebes,
            'editMode' =>$bebe->getNom() !== null
        ]);
      }

      /**
      * @Route("/editt/{id}",name="edit_bebe")
      */
      public function edit(Bebe $bebes  ,Request $request , EntityManagerInterface $entityManager){

        $form = $this->createForm(BebeType::class, $bebes);
                                      
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            //symfony sait l'objet a traiter l'objet est déja dans la base de donnee
            //$entityManager->persist($bebes);
            $entityManager->flush();
            //return new Response('bebe/test.html.twig'); 
            // return new Response()('event moudifiéééé!!!'); 
            return $this->redirectToRoute('cherch');
        }
        return $this->render('bebe/recherche.html.twig', [
            'bebes' => $bebes,
            'bebeForm' => $form->createView(),
            'editMode' =>$bebes->getNom() !== null
         
        ]);
      }

      /**
      * @Route("/bebe/delete/{id}")
      * @Method({"DELETE"})
      */
      public function delete(Request $request, Bebe $bebes,EntityManagerInterface $entityManager) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($bebes);
        $entityManager->flush();
        $response = new Response();
        $response->send();
        return $this->redirectToRoute('bebe_list');
       
      }
       
      /**
      * @Route("/", name="cherch")
      */
      public function save() {
       return $this->redirectToRoute('bebe_list');
      
      }
    
    
    
     





    
    
}