<?php
namespace App\Tests\CRUD\Blog;

use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorCRUDTest extends WebTestCase
{

    /**
     * @var AuteurCRUD
     */
    private $auteurCRUD;
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;
        $this->auteurCRUD = $container->get(AuteurCRUD::class);
    }

    /**
     * Test the Add Author method
     * @test
     */
    public function testAddAuthorSuccessful()
    {
        $auteur = new Auteur();
        $auteur->setFirstname("newfirstname");
        $auteur->setLastname("newname");

        $this->auteurCRUD->add($auteur);

        $auteurFromDb = $this->auteurCRUD->getOneById($auteur->getId());

        $this->assertEquals(
            $auteur->getFirstname(),
            $auteurFromDb->getFirstname()
        );
    }

    /**
     * Test the Update Author method
     * @test
     */
    public function testUpdateAuthorSuccessful()
    {

        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[9];

        $oldFirstname = $auteur->getFirstname();

        $auteur->setFirstname("firstname");
        $auteur->setLastname("lastname");

        $this->auteurCRUD->update($auteur);
        

        $this->assertTrue(
            $oldFirstname != $auteur->getFirstname()
            );
    }

        /**
     * Test the Delete Author method
     * @test
     */
    public function testDeleteAuthorSuccessful()
    {
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[6];

        $this->auteurCRUD->delete($auteur);


        $this->assertTrue(
            $auteur->getId() == null
        );
    }


    
    

}