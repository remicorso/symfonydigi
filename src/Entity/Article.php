<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 * @ORM\Entity(repositoryClass="App\Repository\Blog\ArticleRepository")
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $date;
}