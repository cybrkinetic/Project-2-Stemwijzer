<?php
final class dbHandler
{
    private $dataSource = "mysql:dbname=stemwijzer;host=localhost;";
    private $username = "root";
    private $password = "";

    public function selectStelling()
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM stellingen");
            $statement->execute();
            return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
        }
    }

    public function selectPartijen()
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM partijen");
            $statement->execute();
            return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return "Something went wrong: " . $exception->getMessage();
        }
    }
    public function selectNieuws()
    {
        try {
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
            
        } catch (PDOException $exception) {
        }
    }
    public function getNieuwsById($id)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare('SELECT * FROM nieuwsberichten WHERE nieuws_id = ?');
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyUser($email, $password)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare('SELECT * FROM users WHERE user_mail = :email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['wachtwoord'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function REGISTREREN($user_name, $email, $wachtwoord)
    {
        try {

            $password_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("INSERT INTO `users`(`user_naam`, `user_mail`, `wachtwoord`) VALUES (:user_name, :email, :wachtwoord)");
            $statement->bindParam(':user_name', $user_name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':wachtwoord', $password_hash);
            $statement->execute();
            return true;
        } catch (PDOException $exception) {
            return "Something went wrong: " . $exception->getMessage();
        }
    }
     public function saveComment($articleId, $name, $text) {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("INSERT INTO comments (article_id, comment_naam, comment_text) VALUES (:article_id, :comment_naam, :comment_text)");
        $statement->bindParam(':article_id', $articleId, PDO::PARAM_INT);
        $statement->bindParam(':comment_naam', $name, PDO::PARAM_STR);
        $statement->bindParam(':comment_text', $text, PDO::PARAM_STR);
        $statement->execute();
       
    }

     public function getCommentsByArticleId($articleId) {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $stmt = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id ORDER BY comment_datum DESC");
        $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
