<?php
class User
{
    private ?int $id = null;
    private ?string $email = null;
    private ?string $password= null;
    private ?string $name= null;
    private ?bool $state= null;
    private ?int $rol_id = null;


    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM users");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function insert()
    {
        try {
            $query = "INSERT INTO users (email,password,name,state,rol_id) VALUES (?,?,?,?,?);";
            $this->connection->prepare($query)
                ->execute(
                    array(
                        $this->email,
                        $this->password,
                        $this->name,
                        $this->state,
                        $this->rol_id,
                    )
                );

            $this->id = $this->connection->lastInsertId();
            return $this;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function login($email,$password)
    {
        $query = $this->connection->prepare("SELECT * FROM users WHERE email=?
        AND state =?;");
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array(
                            $email,
                            1
                            ));
        if($query->rowCount())
        {
            $result = $query->fetch();//Objeto tipo User
            $result->connection = null;
    
            if(password_verify($password,$result->getPassword()))
            {
                $_SESSION['user'] = $result;
                return true;
            }else{
                session_destroy();
                return false;
    
            }
        }else{
            return false;
        }
        
    }

    function getById($id)
    {
        try {
            $query = "SELECT * FROM users WHERE id=?;";
            $query = $this->connection->prepare($query);
            $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $query->execute(array($id));
            return $query->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function updateState()
    {
        try{
            $query ="UPDATE users SET 
                                state=?,
                                rol_id=?
                                WHERE id=?;";
             $this->connection->prepare($query)
                                ->execute(array(
                                    $this->state,
                                    $this->rol_id,
                                    $this->id
                                ));
            return $this;
        }catch (Exception $e) {
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

    function getEmail(): ?string
    {
        return $this->email;
    }

    function setEmail(string $email)
    {
        $this->email = $email;
    }

    
    function getPassword(): ?string
    {
        return $this->password;
    }

    function setPassword(string $password)
    {
        $this->password = $password;
    }

    function getName(): ?string
    {
        return $this->name;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

     function getState(): ?bool
    {
        return $this->state;
    }

    function setState(bool $state)
    {
        $this->state = $state;
    }

    function getRolId(): ?int
    {
        return $this->rol_id;
    }

    function setRolId(int $rol_id)
    {
        $this->rol_id = $rol_id;
    }


    
}
