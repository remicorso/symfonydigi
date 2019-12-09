<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("blog/author/all", name="author_show_all")
     * @return Response
     */
    public function showAllAuthors(){
        return $this->render('blog/authors/all.html.twig');
    }


    /**
     * @return Response
     * @Route("blog/author/new", name="author_create")
     */
    public function createAuthor()
    {
        return $this->render('blog/authors/create.html.twig');
    }

    /**
     * @param $id
     * @Route("blog/author/edit/{id}", name="author_edit")
     * @return Response
     */
    public function editAuthor($id)
    {
        return $this->render('blog/authors/update.html.twig', ['id'=>$id]);
    }

    /**
     * @param $id
     * @return Response
     * @Route("blog/author/delete/{id}", name="author_delete")
     */
    public function deleteAuthor($id)
    {
        return $this->render('blog/authors/delete.html.twig', ['id'=>$id]);
    }


    /**
     * @param $id
     * @Route("blog/author/show/{id}", name="author_show_single")
     * @return Response
     */
    public function showOneAuthorById($id){
        return $this->render('blog/authors/one.html.twig', ['id'=>$id]);
    }
}
