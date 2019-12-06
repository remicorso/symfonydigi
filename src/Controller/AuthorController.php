<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("blog/author/all", name="author_show_all")
     * @return Response
     */
    public function showAllAuthors(Request $request){
        return new Response("Liste de tous les auteurs", 200);

    }


    /**
     * @param Request $request
     * @return Response
     * @Route("blog/author/new", name="author_create")
     */
    public function createAuthor(Request $request)
    {
        return new Response("Création d'un nouvel auteur !", 200);
    }

    /**
     * @param $id
     * @param Request $request
     * @Route("blog/author/edit/{id}", name="author_edit")
     * @return Response
     */
    public function editAuthor($id, Request $request)
    {
        return new Response("Edition de l'auteur : $id", 200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     * @Route("blog/author/delete/{id}", name="author_delete")
     */
    public function deleteAuthor($id, Request $request)
    {
        return new Response("Suppression de l'auteur $id");
    }


    /**
     * @param $id
     * @param Request $request
     * @Route("blog/author/show/{id}", name="author_show_single")
     * @return Response
     */
    public function showOneAuthorById($id, Request $request){
       return new Response("Profil de l'auteur : $id", 200);
    }
}
