<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orderslines
 *
 * @ORM\Table(name="orderslines", indexes={@ORM\Index(name="fk_orders_id", columns={"idOrder"}), @ORM\Index(name="FK_Article", columns={"idArticle"})})
 * @ORM\Entity
 */
class Orderslines
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArticle", referencedColumnName="idArticle")
     * })
     */
    private $idarticle;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOrder", referencedColumnName="idOrder")
     * })
     */
    private $idorder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getIdarticle(): ?Articles
    {
        return $this->idarticle;
    }

    public function setIdarticle(?Articles $idarticle): self
    {
        $this->idarticle = $idarticle;

        return $this;
    }

    public function getIdorder(): ?Orders
    {
        return $this->idorder;
    }

    public function setIdorder(?Orders $idorder): self
    {
        $this->idorder = $idorder;

        return $this;
    }


}
