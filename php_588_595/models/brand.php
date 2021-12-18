<?php
class Brand
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description= null;


    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM brands");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function insert()
    {
        try {
            $query = "INSERT INTO brands (name,description) VALUES (?,?);";
            $this->connection->prepare($query)
                ->execute(
                    array(
                        $this->name,
                        $this->description,
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
            $query ="UPDATE brands SET 
                                name=?,
                                description=?
                                WHERE id=?;";
             $this->connection->prepare($query)
                                ->execute(array(
                                    $this->name,
                                    $this->description,
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
            $query = "SELECT * FROM brands WHERE id=?;";
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
            $this->connection->prepare("DELETE FROM brands WHERE id=?;")
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

    function getDescription(): ?string
    {
        return $this->description;
    }

    function setDescription(string $description)
    {
        $this->description = $description;
    }
    
}
