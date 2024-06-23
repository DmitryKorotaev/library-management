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

    /** @ORM\Column(type="integer", nullable=true) */
    private $PublicationYear;

    /** @ORM\Column(type="string", nullable=true) */
    private $availability;


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

    // Getter for Publisher
    public function getAvailability()
    {
        return $this->availability;
    }

    // Setter for Publisher
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

     public function toArray()
    {
        return [
            "id" => $this-> getId(),
            'title' => $this->getTitle(),
            'author' => $this->getAuthor(),
            'publication_year' => $this->getPublicationYear(),
            'availability' => $this->getAvailability(),
        ];
    }

}