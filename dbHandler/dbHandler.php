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
        } catch (PDOException $exception) {
        }
    }
    public function createPartij(string $partij_naam, string $partij_site, string $partij_volldignaam)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("INSERT INTO partijen(partij_naam, partij_site, partij_volldignaam) 
                                        VALUES(:partij_naam, :partij_site, :partij_volldignaam)");
            $statement->bindParam("partij_naam", $partij_naam, PDO::PARAM_STR);
            $statement->bindParam("partij_site", $partij_site, PDO::PARAM_STR);
            $statement->bindParam("partij_volldignaam", $partij_volldignaam, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $exception) {
            var_dump($exception);
        }
    }
    public function editPartij(int $partij_id, string $partij_naam, string $partij_site, string $partij_volldignaam)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("UPDATE partijen SET partij_naam=:partij_naam, partij_site=:partij_site, partij_volldignaam=:partij_volldignaam WHERE partij_id = :partij_id");
        $statement->bindParam("partij_naam", $partij_naam, PDO::PARAM_STR);
        $statement->bindParam("partij_site", $partij_site, PDO::PARAM_STR);
        $statement->bindParam("partij_volldignaam", $partij_volldignaam, PDO::PARAM_STR);
        $statement->bindParam("partij_id", $partij_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deletePartij(int $partij_id)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("DELETE FROM partijen WHERE partij_id = :partij_id");
            $statement->bindParam("partij_id", $partij_id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $exception) {
        } catch (PDOException $exception) {
        }
    }

    public function createStelling(string $titel, string $vraag){
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("INSERT INTO stellingen(titel, vraag) VALUES (:titel, :vraag)");
            $statement->bindParam("titel", $titel, PDO::PARAM_STR);
            $statement->bindParam("vraag", $vraag, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $exception){

        }
    }
    public function editStelling(int $vraag_id, string $titel, string $vraag){
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("UPDATE stellingen SET titel=:titel, vraag=:vraag WHERE vraag_id = :vraag_id");
        $statement->bindParam("titel", $titel, PDO::PARAM_STR);
        $statement->bindParam("vraag", $vraag, PDO::PARAM_STR);
        $statement->bindParam("vraag_id", $vraag_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deleteStelling(int $vraag_id){
        try{
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("DELETE FROM stellingen WHERE vraag_id = :vraag_id");
        $statement->bindParam("vraag_id", $vraag_id, PDO::PARAM_INT);
        $statement->execute();
        }
        catch(PDOException $exception){
            
        } catch (PDOException $exception) {
        }
    }
    public function createNieuws(string $nieuws_titel, string $nieuws_desc, string $nieuws_text, string $nieuws_datum){
        try{
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("INSERT INTO nieuwsberichten(nieuws_titel, nieuws_desc, nieuws_text, nieuws_datum) 
                                        VALUES (:nieuws_titel, :nieuws_desc, :nieuws_text, :nieuws_datum)");
            $statement->bindParam("nieuws_titel", $nieuws_titel, PDO::PARAM_STR);
            $statement->bindParam("nieuws_desc", $nieuws_desc, PDO::PARAM_STR);
            $statement->bindParam("nieuws_text", $nieuws_text, PDO::PARAM_STR);
            $statement->bindParam("nieuws_datum", $nieuws_datum, PDO::PARAM_STR);
            $statement->execute();
        }
        catch(PDOException $exception){

        }
    }
    public function editNieuws(int $nieuws_id, string $nieuws_titel, string $nieuws_desc, string $nieuws_text, string $nieuws_datum){
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("UPDATE nieuwsberichten SET nieuws_titel=:nieuws_titel, nieuws_desc=:nieuws_desc, nieuws_text=:nieuws_text, nieuws_datum=:nieuws_datum 
                                                           WHERE nieuws_id = :nieuws_id");
        $statement->bindParam("nieuws_titel", $nieuws_titel, PDO::PARAM_STR);
        $statement->bindParam("nieuws_desc", $nieuws_desc, PDO::PARAM_STR);
        $statement->bindParam("nieuws_text", $nieuws_text, PDO::PARAM_STR);
        $statement->bindParam("nieuws_datum", $nieuws_datum, PDO::PARAM_STR);
        $statement->bindParam("nieuws_id", $nieuws_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deleteNieuws(int $nieuws_id){
        try{
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("DELETE FROM nieuwsberichten WHERE nieuws_id = :nieuws_id");
        $statement->bindParam("nieuws_id", $nieuws_id, PDO::PARAM_INT);
        $statement->execute();
        }
        catch(PDOException $exception){
            
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
        $statement = $pdo->prepare('SELECT * FROM users WHERE user_mail = ?');
        $statement->execute([$email]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['wachtwoord'])) {
            return [
                'username' => $user['user_naam'],
                'role' => $user['role']
            ];
        }

        return false;
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

    public function saveComment($articleId, $username, $text, $parentId = null)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $query = "INSERT INTO comments (article_id, comment_naam, comment_text, parent_id, comment_datum) VALUES (:article_id, :comment_naam, :comment_text, :parent_id, NOW())";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':article_id', $articleId, PDO::PARAM_INT);
        $statement->bindParam(':comment_naam', $username, PDO::PARAM_STR);
        $statement->bindParam(':comment_text', $text, PDO::PARAM_STR);
        if ($parentId !== null) {
            $statement->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        } else {
            $statement->bindValue(':parent_id', null, PDO::PARAM_NULL);
        }
        $statement->execute();
    }


    public function getCommentsByArticleId($articleId)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("SELECT * FROM comments WHERE article_id = ? ORDER BY parent_id, id");
        $statement->execute([$articleId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function editComment($commentId, $username, $newText)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("UPDATE comments SET comment_text = ? WHERE id = ? AND comment_naam = ?");
        $statement->execute([$newText, $commentId, $username]);
    }
    public function deleteComment($commentId, $username)
    {
        $pdo = new PDO($this->dataSource, $this->username, $this->password);
        $statement = $pdo->prepare("DELETE FROM comments WHERE id = ? AND comment_naam = ?");
        $statement->execute([$commentId, $username]);
    }

    public function mijn_profiel($user_id, $user_name, $email, $wachtwoord) {
        try {
            $password_hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("UPDATE `users` SET `user_naam` = :user_name, `user_mail` = :email, `wachtwoord` = :wachtwoord WHERE `user_id` = :user_id");
            $statement->bindParam(':user_id', $user_id);
            $statement->bindParam(':user_name', $user_name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':wachtwoord', $password_hash);
            $statement->execute();
            return true;
        } catch (PDOException $exception) {
            return "Something went wrong: " . $exception->getMessage();
        }
    }

    public function getUserById($user_id) {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM users WHERE user_id = :id");
            $statement->execute([':id' => $user_id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function getUserByUsername($username)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);
            $statement = $pdo->prepare("SELECT * FROM users WHERE user_naam = :username");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function updateUserProfile($username, $new_user_name, $new_email, $new_password)
    {
        try {
            $pdo = new PDO($this->dataSource, $this->username, $this->password);

            // Check of er een nieuw wachtwoord is opgegeven
            if (!empty($new_password)) {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $statement = $pdo->prepare("UPDATE users SET user_naam = :new_user_name, user_mail = :new_email, wachtwoord = :password_hash WHERE user_naam = :username");
                $statement->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
            } else {
                $statement = $pdo->prepare("UPDATE users SET user_naam = :new_user_name, user_mail = :new_email WHERE user_naam = :username");
            }

            $statement->bindParam(':new_user_name', $new_user_name, PDO::PARAM_STR);
            $statement->bindParam(':new_email', $new_email, PDO::PARAM_STR);
            $statement->bindParam(':username', $username, PDO::PARAM_STR);

            $statement->execute();
            return true;
        } catch (PDOException $exception) {
            return "Something went wrong: " . $exception->getMessage();
        }
    }
    
    
    
    
    
}
