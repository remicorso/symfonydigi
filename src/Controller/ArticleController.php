<?php

namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @param ArticleCRUD $articleCRUD
     * @return Response
     * @Route("/blog/all", name="blog_show_all_articles")
     */
    public function showAllArticles(ArticleCRUD $articleCRUD)
    {
        $articles = $articleCRUD->getAll();
        return $this->render('blog/articles/all.html.twig', [
            'articles' => $articles
        ]);
    }


    /**
     * @return Response
     * @Route("/blog/article/new", name="blog_create_article")
     */
    public function createArticle()
    {
        return $this->render('blog/articles/create.html.twig');
    }

    /**
     * @param ArticleCRUD $articleCRUD
     * @param $id
     * @return Response
     * @Route("blog/article/edit/{id}", name="blog_edit_article")
     */
    public function editArticle(ArticleCRUD $articleCRUD, $id)
    {
        $article = $articleCRUD->getOneById($id);
        return $this->render('blog/articles/update.html.twig', ['article' => $article]);
    }

    /**
     * @param ArticleCRUD $articleCRUD
     * @param $id
     * @return Response
     * @Route("blog/article/delete/{id}", name="blog_delete_article")
     */
    public function deleteArticle(ArticleCRUD $articleCRUD, $id)
    {
        return $this->redirectToRoute('blog_show_all_articles');
    }


    /**
     * @param ArticleCRUD $articleCRUD
     * @param $id
     * @return Response
     * @Route("blog/article/{id}", name="blog_show_single_article")
     */
    public function showOneById(ArticleCRUD $articleCRUD, $id)
    {
        /**
         * @var Article $article
         */
        $article = $articleCRUD->getOneById($id);

        return $this->render('blog/articles/one.html.twig', ['article' => $article]);
    }


}
