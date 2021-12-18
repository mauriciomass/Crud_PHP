<?php
class Product
{
    private ?int $id = null;
    private ?string $name = null;
    private ?float $cost = null;
    private ?float $price = null;
    private ?int $quantity = null;
    private ?int $brand_id = null;
    private ?string $image_url=null;

    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM products");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function insert()
    {
        try {
            $query = "INSERT INTO products (name,cost,price,quantity,brand_id,image_url) VALUES (?,?,?,?,?,?);";
            $this->connection->prepare($query)
                ->execute(
                    array(
                        $this->name,
                        $this->cost,
                        $this->price,
                        $this->quantity,
                        $this->brand_id,
                        $this->image_url,
                    )
                );

            $this->id = $this->connection->lastInsertId();
            return $this;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function update()
    {
        try{
            $query ="UPDATE products SET 
                                name=?,
                                cost=?,
                                price=?,
                                quantity=?,
                                brand_id=?,
                                image_url=?
                                WHERE id=?;";
             $this->connection->prepare($query)
                                ->execute(array(
                                    $this->name,
                                    $this->cost,
                                    $this->price,
                                    $this->quantity,
                                    $this->brand_id,
                                    $this->image_url,
                                    $this->id
                                ));
            return $this;
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function getById($id)
    {
        try {
            $query = "SELECT * FROM products WHERE id=?;";
            $query = $this->connection->prepare($query);
            $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $query->execute(array($id));
            return $query->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function delete()
    {
        try {
            $this->connection->prepare("DELETE FROM products WHERE id=?;")
                ->execute(array($this->id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    function getId(): ?int
    {
        return $this->id;
    }

    function setId(int $id)
    {
        $this->id = $id;
    }

    function getName(): ?string
    {
        return $this->name;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function getCost(): ?float
    {
        return $this->cost;
    }

    function setCost(float $cost)
    {
        $this->cost = $cost;
    }

    function getPrice(): ?float
    {
        return $this->price;
    }

    function setPrice(float $price)
    {
        $this->price = $price;
    }

    function getQuantity(): ?int
    {
        return $this->quantity;
    }

    function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    function getBrandId(): ?int
    {
        return $this->brand_id;
    }

    function setBrandId(int $brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function getImage_url()
    {
        return $this->image_url;
    }

    public function setImage_url($image_url)
    {
        $this->image_url = $image_url;
    }
}
