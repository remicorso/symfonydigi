<?php
namespace App\Tests\CRUD\Blog;

use App\CRUD\Blog\ArticleCRUD;
use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleCRUDTest extends WebTestCase
{
    /**
     * @var ArticleCRUD
     */
    private $articleCRUD;

    /**
     * @var AuteurCRUD
     */
    private $auteurCRUD;
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;

        $this->articleCRUD = $container->get(ArticleCRUD::class);

        $this->auteurCRUD = $container->get(AuteurCRUD::class);
    }

    /**
     * Test the Add Article method
     * @test
     */
    public function testAddArticleSuccessful()
    {
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];

        $article = new Article();
        $article->setTitle("test title");
        $article->setContent("test content");
        $article->setDate(new \DateTime('now'));
        $article->setAuteur($auteur);

        $this->articleCRUD->add($article);

        $articleFromDb = $this->articleCRUD->getOneById($article->getId());

        $this->assertEquals(
            $article->getTitle(),
            $articleFromDb->getTitle()
        );
    }

    /**
     * Test the Update Article method
     * @test
     */
    public function testUpdateArticleSuccessful()
    {
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];

        $articles = $this->articleCRUD->getAll();
        $article = $articles[0];
        $articleFromDb = $articles[0];
        $article->setTitle("updated title");
        $article->setContent("updated content");
        $article->setDate(new \DateTime('now'));
        $article->setAuteur($auteur);

        $this->articleCRUD->update($article);

        

        $this->assertTrue(
            $article->getTitle() == $articleFromDb->getTitle()
        );
    }

    /**
     * Test the Delete Article method
     * @test
     */
    public function testDeleteArticleSuccessful()
    {
        $articles = $this->articleCRUD->getAll();
        $article = $articles[0];

        $this->articleCRUD->delete($article);
      

        $this->assertTrue(
            $article->getId() == null
        );
    }

}