<?php
    class User{

        private $user_id;
        private $user_name;
        private $first_name;
        private $last_name;

        function __construct(){
            $user_id = null;
            $user_name = null;
            $first_name = null;
            $last_name = null;
        }

        public function createUser($_userName,$_password,$_firstName,$_lastName){
            
            if(empty($_userName))
            {
                echo "Username is empty";
                return false;
            }
            else if(empty($_password)){
                echo "Password is empty";
                return false;
            }
            require_once("../MySQL-connect.php");
            
            $query = 'SELECT * from users where
            user_name="'.$_userName.'";';

            $response = @mysqli_query($dbc,$query);
            if($response){
                
                $row = mysqli_fetch_array($response);
                if($row['user_name']==$_userName){
                    echo "Username alredy taken";
                    return false;
                }
            }

            $query='INSERT INTO users value(null,"'.$_userName.'","'.$_firstName.'","'.$_lastName.'","'.hash("sha256",$_password).'")';

            $response = @mysqli_query($dbc,$query);

            mysqli_close($dbc);

            $this->login($_userName,$_password);
        }

        public function login($username, $password)
        {
            if(empty($username))
            {
                echo 'The username is empty';
                return false;
            }
            else if(empty($password))
            {
                echo  'The password is empty';
                return false;
            }

            require_once("../MySQL-connect.php");
            $password = hash('sha256',$password);

            echo "".$password."\n";
            $query = 'SELECT * from customers where
                    user_name="'.$username.'" and
                    user_password="'.$password.'"';
	
            $response = @mysqli_query($dbc,$query);
            if($response)
            {
                $row = mysqli_fetch_array($response);
                $user_name = $username;
                $first_name = $row['first_name'];
                $user_id = $row['user_id'];
                $last_name = $row['last_name'];
                echo 'Success!';
            }
            else{
                echo 'The username and password did not match';
                return false;
            }

            mysqli_close($dbc);
            return true;
        }

        function getID(){
            return  $this->user_id;
        }

        function getUserName(){
            return $user_name;
        }

        function getFirstName(){
            return  $firts_name;
        }

        function getLastName(){
            return $last_name;
        }
    }
?>