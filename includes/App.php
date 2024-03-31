<?php define("APPURL", "http://localhost/saman"); ?>
<?php

define("HOST", "localhost");
define("DBNAME", "saman");
define("USER", "root");
define("PASS", "");


// class App 


class App
{

    public $host = HOST;
    public $dbname = DBNAME;
    public $user = USER;
    public $pass = PASS;


    public $link;

    // create a constructor 

    public function __construct()
    {
        $this->Connect();
    }

    public function connect()
    {
        $this->link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);

        try {
            if ($this->link) {
            }
        } catch (PDOException $error) {
            echo "connection failed " . $error;
        }
    }




    // select All 

    public function selectAll($query)
    {

        $rows = $this->link->query($query);
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

        if ($allRows) {
            return $allRows;
        } else {
            return false;
        }
    }

    // select one

    public function selectOne($query)
    {

        $rows = $this->link->query($query);
        $rows->execute();

        $singleRow = $rows->fetch(PDO::FETCH_OBJ);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    }

    // insert query 

    public function insert($query, $arr, $path)
    {
        try {
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);
        } catch (PDOException $error) {
            echo "Error executing insert query: " . $error->getMessage();
        }
    }

    // delete query 


    public function delete($query, $arr)
    {


        $delete_record = $this->link->prepare($query);
        $delete = $delete_record->execute($arr);
        return $delete;
    }

    // login 


    public function login($query, $creds, $path)
    {

        $login_user = $this->link->query($query);
        $login_user->execute();

        $fetch = $login_user->fetch(PDO::FETCH_ASSOC);

        if ($login_user->rowCount() > 0) {

            if (password_verify($creds['login_password'], $fetch['user_password'])) {

                // start session variable 

                $_SESSION['userId'] = $fetch['user_id'];
                $_SESSION['userEmail'] = $fetch['user_email'];

                header("location: " . $path . "");
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // starts the session 


    public function startingSession()
    {
        session_start();
    }


    // validate the session

    public function validateLoginSession()
    {
        if (isset($_SESSION['userId'])) {
            echo "<script> window.location.href='" . APPURL . "'</script>";
        }
    }
}
