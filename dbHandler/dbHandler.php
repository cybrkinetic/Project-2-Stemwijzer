<?php
final class dbHandler
{
    private $dataSource = "mysql:dbname=stemwijzer;host=localhost;";
    private $username = "root";
    private $password = "";

    public function selectStelling()
    {
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT titel, vraag FROM stellingen");
            $statement->execute();
            return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $exception){

        }
    }

    public function selectPartijen($partij_id){
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT partij_naam, partij_site, partij_logo FROM partijen WHERE partij_id = :partij_id");
            $statement->execute(array('partij_id' => $partij_id));
            return true;
        }
        catch(PDOException $exception){
            return "Something went wrong: ". $exception->getMessage();
        }
    }
}
?>