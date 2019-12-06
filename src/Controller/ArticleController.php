<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @param Request $request
     * @Route("/blog", name="blog_show_all_articles")
     * @return Response
     */
    public function showAllArticles(Request $request){
        $response = new Response() ;

        $content = "<html><body>Liste de tous les Articles</body></html></body>";

        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;

    }


    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article/new", name="blog_create_article")
     */
    public function createArticle(Request $request){
        $response = new Response() ;

        $content = "<html><body>Création d'un nouvel article !</body></html></body>";

        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;

    }

    /**
     * @param $id
     * @param Request $request
     * @Route("blog/article/edit/{id}", name="blog_edit_article")
     * @return Response
     */
    public function editArticle($id, Request $request){
        $response = new Response() ;

        $content = "<html><body>Article en édition : $id</body></html></body>";

        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;

    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     * @Route("blog/article/delete/{id}", name="blog_delete_article")
     */
    public function deleteArticle($id, Request $request){
        $response = new Response() ;

        $content = "<html><body>Supression de l'article numéro $id !</body></html></body>";

        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;

    }


    /**
     * @param $id
     * @param Request $request
     * @Route("blog/article/{id}", name="blog_show_single_article")
     * @return Response
     */
    public function showOneById($id, Request $request){
        $response = new Response() ;

        $content = "<html><body>Article lu : $id</body></html></body>";

        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;

    }


}
