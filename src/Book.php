<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Books")
 */
class Book
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue
     */
    private $BookID;

    /** @ORM\Column(type="string") */
    private $Title;

    /** @ORM\Column(type="string") */
    private $Author;

    /** @ORM\Column(type="string", nullable=true) */
    private $Genre;

    /** @ORM\Column(type="integer", nullable=true) */
    private $PublicationYear;

    /** @ORM\Column(type="string", unique=true) */
    private $ISBN;

    /** @ORM\Column(type="integer", nullable=true) */
    private $Pages;

    /** @ORM\Column(type="string", nullable=true) */
    private $Publisher;

    /** @ORM\Column(type="text", nullable=true) */
    private $Description;

    // Getters and setters...
    // Getter for BookID
    public function getBookID()
    {
        return $this->BookID;
    }

    // Getter for Title
    public function getTitle()
    {
        return $this->Title;
    }

    // Setter for Title
    public function setTitle($title)
    {
        $this->Title = $title;
    }

    // Getter for Author
    public function getAuthor()
    {
        return $this->Author;
    }

    // Setter for Author
    public function setAuthor($author)
    {
        $this->Author = $author;
    }

    // Getter for Genre
    public function getGenre()
    {
        return $this->Genre;
    }

    // Setter for Genre
    public function setGenre($genre)
    {
        $this->Genre = $genre;
    }

    // Getter for PublicationYear
    public function getPublicationYear()
    {
        return $this->PublicationYear;
    }

    // Setter for PublicationYear
    public function setPublicationYear($year)
    {
        $this->PublicationYear = $year;
    }

    // Getter for ISBN
    public function getISBN()
    {
        return $this->ISBN;
    }

    // Setter for ISBN
    public function setISBN($isbn)
    {
        $this->ISBN = $isbn;
    }

    // Getter for Pages
    public function getPages()
    {
        return $this->Pages;
    }

    // Setter for Pages
    public function setPages($pages)
    {
        $this->Pages = $pages;
    }

    // Getter for Publisher
    public function getPublisher()
    {
        return $this->Publisher;
    }

    // Setter for Publisher
    public function setPublisher($publisher)
    {
        $this->Publisher = $publisher;
    }

    // Getter for Description
    public function getDescription()
    {
        return $this->Description;
    }

    // Setter for Description
    public function setDescription($description)
    {
        $this->Description = $description;
    }

}