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
            $statement = $pdo->prepare("SELECT * FROM stellingen");
            $statement->execute();
            return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $exception){

        }
    }

    public function selectPartijen(){
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM partijen");
            $statement->execute();
            return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $exception){
            return "Something went wrong: ". $exception->getMessage();
        }
    }
    public function selectNieuws(){
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM nieuwsberichten");
            $statement->execute();
            return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $exception){
            
        }
    }
    public function createPartij(string $partij_naam, string $partij_site, string $partij_volldignaam){
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("INSERT INTO partijen(partij_naam, partij_site, partij_volldignaam) 
                                        VALUES(:partij_naam, :partij_site, :partij_volldignaam)");
            $statement->bindParam("partij_naam", $partij_naam, PDO::PARAM_STR);
            $statement->bindParam("partij_site", $partij_site, PDO::PARAM_STR);
            $statement->bindParam("partij_volldignaam", $partij_volldignaam, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $exception){
            var_dump($exception);
        }
    }
    public function editPartij(int $partij_id, string $partij_naam, string $partij_site, string $partij_volldignaam){
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("UPDATE partijen SET partij_naam=:partij_naam, partij_site=:partij_site, partij_volldignaam=:partij_volldignaam WHERE partij_id = :partij_id");
        $statement->bindParam("partij_naam", $partij_naam, PDO::PARAM_STR);
        $statement->bindParam("partij_site", $partij_site, PDO::PARAM_STR);
        $statement->bindParam("partij_volldignaam", $partij_volldignaam, PDO::PARAM_STR);
        $statement->bindParam("partij_id", $partij_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deletePartij(int $partij_id){
        try{
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("DELETE FROM partijen WHERE partij_id = :partij_id");
        $statement->bindParam("partij_id", $partij_id, PDO::PARAM_INT);
        $statement->execute();
        }
        catch(PDOException $exception){
            
        }
    }
}
?>