<?php
class Rol
{
    private ?int $id = null;
    private ?string $role = null;

    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM roles");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function insert()
    {
        try {
            $query = "INSERT INTO roles (role) VALUES (?);";
            $this->connection->prepare($query)
                ->execute(
                    array(
                        $this->role,
     
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
            $query ="UPDATE roles SET 
                                role=?
                                WHERE id=?;";
             $this->connection->prepare($query)
                                ->execute(array(
                                    $this->role,
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
            $query = "SELECT * FROM roles WHERE id=?;";
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
            $this->connection->prepare("DELETE FROM roles WHERE id=?;")
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

    function getRole(): ?string
    {
        return $this->role;
    }

    function setRole(string $role)
    {
        $this->role = $role;
    }

        
}
