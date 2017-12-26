<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;
    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @var Category;
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", onDelete="CASCADE")
     */
    private $category;
    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default" :false})
     */
    private $isTop;
    /**
     * @return mixed
     */
     public function __construct()
     {
       return  $this->isTop;
     }

    /**
     * @return bool
     */
    public function isTop(): bool
    {
        return $this->isTop;
    }

    /**
     * @param bool $isTop
     * @return Product
     */
    public function setIsTop(bool $isTop): Product
    {
        $this->isTop = $isTop;
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Product
     */
    public function setCategory(Category $category): Product
    {
        $this->category = $category;
        return $this;
    }
    // add your own fields

}
