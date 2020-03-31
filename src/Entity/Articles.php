<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="IDX_BFDD316855EF339A", columns={"idCategory"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameArticle", type="string", length=80, nullable=true)
     */
    private $namearticle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=40, nullable=true)
     */
    private $image;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategory", referencedColumnName="idCategory")
     * })
     */
    private $idcategory;



    public function getIdarticle(): ?int
    {
        return $this->idarticle;
    }

    public function getNamearticle(): ?string
    {
        return $this->namearticle;
    }

    public function setNamearticle(?string $namearticle): self
    {
        $this->namearticle = $namearticle;

        return $this;
    }

    public function getImage() 
    {
        return $this->image;
    }

    public function setImage( $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIdcategory(): ?Categories
    {
        return $this->idcategory;
    }

    public function setIdcategory(?Categories $idcategory): self
    {
        $this->idcategory = $idcategory;

        return $this;
    }


}
