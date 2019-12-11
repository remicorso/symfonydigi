<?php

namespace App\Controller;

use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use App\Form\Blog\AuteurFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("blog/author/all", name="author_show_all")
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    public function showAllAuthors(AuteurCRUD $auteurCRUD){
        $auteurs = $auteurCRUD->getAll();
        return $this->render('blog/authors/all.html.twig', [
            'auteurs' => $auteurs
        ]);
    }


    /**
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     * @Route("blog/author/new", name="author_create")
     */
    public function createAuthor(
        Request $request,
        AuteurCRUD $auteurCRUD
    )
    {
        //create empty auteur

        $auteur = new Auteur();

        //create form

        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        // Handle form = submit
        $form->handleRequest($request);

        // Treat submitted form
        if($form->isSubmitted() && $form->isValid())
        {
            // Persist
            $auteurCRUD->add($auteur);

            // Redirect
            return $this->redirectToRoute('author_show_all');
        }

        // create and return template

        return $this->render('blog/authors/create.html.twig', [
            'auteurForm' => $form->createView()
        ]);
    }

    /**
     * @param AuteurCRUD $auteurCRUD
     * @param Request $request
     * @param $id
     * @return Response
     * @Route("blog/author/edit/{id}", name="author_edit")
     */
    public function editAuthor(AuteurCRUD $auteurCRUD, Request $request, $id)
    {

        //get auteur

        $auteur = $auteurCRUD->getOneById($id);

        //create form

        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        // Handle form = submit
        $form->handleRequest($request);

        // Treat submitted form
        if($form->isSubmitted() && $form->isValid())
        {
            // Persist
            $auteurCRUD->update($auteur);

            // Redirect
            return $this->redirectToRoute('author_show_single', [
                'id'=>$id
            ]);
        }

        // create and return template

        return $this->render('blog/authors/update.html.twig', [
            'auteurForm' => $form->createView(),
            'auteur'=> $auteur
        ]);

    }

    /**
     * @param AuteurCRUD $auteurCRUD
     * @param $id
     * @return Response
     * @Route("blog/author/delete/{id}", name="author_delete")
     */
    public function deleteAuthor(AuteurCRUD $auteurCRUD, $id)
    {
        $auteur =  $auteurCRUD->getOneById($id);
        $auteurCRUD->delete($auteur);
        return $this->redirectToRoute('author_show_all');
    }


    /**
     * @param AuteurCRUD $authorCRUD
     * @param $id
     * @return Response
     * @Route("blog/author/show/{id}", name="author_show_single")
     */
    public function showOneAuthorById(AuteurCRUD $authorCRUD, $id){
        $auteur = $authorCRUD->getOneById($id);
        dump($auteur);
        return $this->render('blog/authors/one.html.twig', ['auteur'=>$auteur]);
    }
}
