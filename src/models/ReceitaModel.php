<?php

class ReceitaModel
{
    private $db;
    private Receitas $receitas;

    public function __construct(Connection $connection, Receitas $receitas) {
        $receitaModel = new ReceitaModel($connection, $receitas);
        $this->db = $connection;
        $this->receitas = $receitas;
    }

    public function save()
    {        
        $sql = "INSERT INTO receitas (id, valor, data, descricao, categoria) VALUES (:id, :valor, :data, :descricao, :categoria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->receitas->getId());
        $stmt->bindParam(':valor', $this->receitas->getValor());
        $stmt->bindParam(':data', $this->receitas->getData()->format('Y-m-d'));
        $stmt->bindParam(':descricao', $this->receitas->getDescricao());
        $stmt->bindParam(':categoria', $this->receitas->getCategoria());
        
     // Log the SQL query
     error_log($sql);

     if ($stmt->execute()) {
         return true;
     } else {
         // Enable error reporting
         error_reporting(E_ALL);
         echo "Erro ao salvar receita: " . $stmt->errorInfo()[2];
         return false;
     }
 }
}

class Connection {
    private $pdo;

    public function __construct($dsn, $username = null, $password = null) {
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }
}

class Login
{
    private $connection;
    private $username;
    private $password;

    function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    function setLogin($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $sql = "SELECT username, password FROM admin WHERE username = :username AND password = :password";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header('location: hello.php');
        }
    }
}

$connection = new Connection('sqlite:'. __DIR__. '/../database/financas.db');

$receitas = new Receitas( (int)$_POST['id'],
                            (float)$_POST['valor'],
                            new DateTimeImmutable($_POST['data']),
                            $_POST['descricao'],
                            $_POST['categoria']);


$receitaModel = new ReceitaModel($connection, $receitas);


$receitaModel->save();