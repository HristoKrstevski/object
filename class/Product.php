<?php
namespace App;
use Carbon\Carbon;

class Product extends DB implements Rules
{

    use Helper;

    private $id;
    private $name;
    private $price;
    private $type;
    private $created_at;
    private $description;
    private $user_id;

    private $category;

    private $quantity;

    private $image;

    const table = "products";

    public function __construct()
    {
        parent::__construct(self::table);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        $carbon = new Carbon($this->created_at);
        return $carbon->format('Y-m-d h:i:s');
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }


    public function getCategroy()
    {
        return $this->category;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }


    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function save()
    {
        $data = [
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description,
            "quantity" => $this->quantity,
            "type" => $this->type,
            "user_id" => $this->user_id,
            "category_id" => $this->category,
            "image" => $this->image
        ];

        return $this->insertRow($data);
    }

    public function delete()
    {
        return $this->deleteRow($this->id);
    }

    public function update()
    {
        $data = [
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description,
            "quantity" => $this->quantity,
            "type" => $this->type,
            "user_id" => $this->user_id,
            "category_id" => $this->category,
            "image" => $this->image
        ];

        return $this->updateRow($data, $this->id);
    }

    public function all()
    {
        $products = $this->selectAll();
        $results = [];

        foreach ($products as $product) {
            $p = new self();
            $p->setId($product->id);
            $p->get();
            $results[] = $p;
        }

        return $results;
    }

    public function get()
    {
        $product = $this->selectOne($this->id);

        $this->id = $product->id;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->type = $product->type;
        $this->description = $product->description;
        $this->created_at = $product->created_at;
        $this->user_id = $product->user_id;
        $this->category = $product->category_id;
        $this->image = $product->image;


        return $this;
    }


}