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
            $statement = $pdo->prepare("SELECT titel, vraag FROM stellingen");
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
            if (password_verify($password, $user['wachtwoord'])) 
            {
                return true;
            } 
            else 
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function REGISTREREN($user_name, $email, $wachtwoord){
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
            return "Something went wrong: ". $exception->getMessage();
        }
    }


}
