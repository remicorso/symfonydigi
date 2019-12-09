<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @return Response
     * @Route("/blog/all", name="blog_show_all_articles")
     */
    public function showAllArticles(){
        return $this->render('blog/articles/all.html.twig');
    }


    /**
     * @return Response
     * @Route("/blog/article/new", name="blog_create_article")
     */
    public function createArticle(){
        return $this->render('blog/articles/create.html.twig');
    }

    /**
     * @param $id
     * @Route("blog/article/edit/{id}", name="blog_edit_article")
     * @return Response
     */
    public function editArticle($id){
        return $this->render('blog/articles/update.html.twig', ['id' => $id]);
    }

    /**
     * @param $id
     * @return Response
     * @Route("blog/article/delete/{id}", name="blog_delete_article")
     */
    public function deleteArticle($id){
        return $this->render('blog/articles/delete.html.twig', ['id' => $id]);
    }


    /**
     * @param $id
     * @Route("blog/article/{id}", name="blog_show_single_article")
     * @return Response
     */
    public function showOneById($id){
        return $this->render('blog/articles/one.html.twig', ['id' => $id]);
    }


}
