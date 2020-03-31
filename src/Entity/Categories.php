<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCategory", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameCategory", type="string", length=40, nullable=true)
     */
    private $namecategory;

    public function getIdcategory(): ?int
    {
        return $this->idcategory;
    }

    public function getNamecategory(): ?string
    {
        return $this->namecategory;
    }

    public function setNamecategory(?string $namecategory): self
    {
        $this->namecategory = $namecategory;

        return $this;
    }


}
