<?php 
    class User {
        protected $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function checkInput($var) {
            $var = htmlspecialchars($var);
            $var = trim($var);
            $var = stripcslashes($var);
            return $var;
        }

        public function login($email, $password) {
            $stmt = $this->pdo->prepare("SELECT * FROM `user` WHERE `email` = :email AND `password` = :passwords");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", $password, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            // var_dump($user->approve);
            // exit();
            $count = $stmt->rowCount();

           if($count > 0) {
                if($user->approve == 1) {
                    $_SESSION['id'] = $user->id;
                    return 'approve';
                } else {
                    return 'inapprove';
                }
            } else {
                return false;
            }
        }
        

        public function logout() {
            $_SESSION = array();
            session_destroy();
            header('Location: '.BASE_URL.'login');
        }
        
        // to check/verify whether something is existing in a table with 1 conditions
        public function check_exist_one_col($table, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT `$column` FROM `$table` WHERE `$column` = :keyword");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }
        
        // to check/verify whether something is existing in a table with 2 conditions
        public function check_exist_two_col($table, $column, $first_column, $first_keyword, $second_column, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT `$column` FROM `$table` WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }
        

        // selecting all columns and values from table
        public function select_all_val_table($table) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$table`");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // selecting just a value from table with a condition
        public function select_one_val($table, $column, $value, $keyword) {
            $stmt = $this->pdo->prepare("SELECT `$column` FROM `$table` WHERE `$value` = :keyword");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        // selecting just a value from table with 2 conditions
        public function select_one_val_two_conds($table, $column, $first_value, $first_keyword, $second_value, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT `$column` FROM `$table` WHERE `$first_value` = :first_keyword AND `$second_value` = :second_keyword");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        // selecting all columns and values from table with a condition in ascending order
        public function select_all_one_cond($table, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :keyword");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        // selecting all columns and values from table with a condition in descending order
        public function select_all_one_cond_desc($table, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = :keyword ORDER BY `id` DESC");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }


        // fetching with inner join with no condition
        public function fetch_innerjoin($first_table, $second_table, $initial_id, $order_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON `$initial_id` = b.id ORDER BY `$order_id` ASC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        // fetching with inner join of 1 conditions
        public function fetch_innerjoin_one_cond($first_table, $second_table, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON a.id = b.id WHERE `$column` = :keyword ORDER BY a.id ASC");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        
        // fetching of unanswered questions with inner join of 1 conditions
        public function fetch_questions_innerjoin_one_cond($first_table, $second_table, $first_column, $first_keyword, $second_column, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON a.lecturer_id = b.id WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword ORDER BY a.id DESC");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        // fetching with inner join of 2 conditions using default id
        public function fetch_innerjoin_two_cond($first_table, $second_table, $first_column, $first_keyword, $second_column, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON a.id = b.id WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword ORDER BY a.id ASC");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }


        // fetching with inner join of 2 conditions and 2 deafult On conditions
        public function fetch_innerjoin_two_cond_two_on($first_table, $second_table, $first_column, $first_keyword, $second_column, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON a.level = b.semester AND a.dept = b.department WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword ORDER BY a.id ASC");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        
        // fetching with inner join of 3 conditions and 2 deafult On conditions
        public function fetch_innerjoin_three_cond_two_on($first_table, $second_table, $first_column, $first_keyword, $second_column, $second_keyword, $third_column, $third_keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON a.level = b.semester AND a.dept = b.department WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword AND `$third_column` = :third_keyword ORDER BY a.id ASC");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":third_keyword", $third_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        // fetching with inner join of 3 conditions and 3 deafult On conditions
        public function fetch_innerjoin_three_cond_three_on($first_table, $second_table, $first_keyword, $second_keyword, $third_keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM `$first_table` AS a INNER JOIN `$second_table` AS b ON a.level = b.level AND a.dept = b.dept AND a.question_id = b.id WHERE a.level = :first_keyword AND a.dept = :second_keyword AND a.question_id = :third_keyword ORDER BY a.id ASC");
            // SELECT * FROM `answers` AS a INNER JOIN `questions` AS b ON a.level = b.level AND a.dept = b.dept AND a.question_id = b.id WHERE a.level = 3 AND a.dept = 2 AND a.question_id = 8 ORDER BY a.id ASC
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":third_keyword", $third_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }



        // counting all from database in a table
        public function count_all_col($table, $column) {
            $stmt = $this->pdo->prepare("SELECT COUNT('".$column."') FROM `$table`");
            $stmt->execute();
            return $stmt->fetchcolumn();
        }


        // counting from database with 1 condition
        public function count_one_cond($table, $actual_column, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT COUNT('".$actual_column."') FROM `$table` WHERE `$column` = :keyword");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchcolumn();
        }


        // counting from database with 2 conditions
        public function count_two_cond($table, $column, $first_column, $first_keyword, $second_column, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT COUNT('".$column."') FROM `$table` WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchcolumn();
        }


        
        //sum of all columns
        public function sum_all_column($table, $column) {
            $stmt = $this->pdo->prepare("SELECT SUM($column) FROM `$table`");
            $stmt->execute();
            return $stmt->fetchcolumn();
        }

        
        //sum of columns with two conditions
        public function sum_column_one_cond($table, $actual_column, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT SUM($actual_column) FROM `$table` WHERE `$column` = :keyword");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchcolumn();
        }



        //sum of a column using two conditions
        public function sum_two_cond($table, $column, $first_column, $first_keyword, $second_column, $second_keyword) {
            $stmt = $this->pdo->prepare("SELECT SUM('".$column."') FROM `$table` WHERE `$first_column` = :first_keyword AND `$second_column` = :second_keyword");
            $stmt->bindParam(":first_keyword", $first_keyword, PDO::PARAM_STR);
            $stmt->bindParam(":second_keyword", $second_keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchcolumn();
        }



        // counting from database with no condition
        public function count_ono_cond($table, $count_column, $column, $keyword) {
            $stmt = $this->pdo->prepare("SELECT COUNT('".$count_column."') FROM `$table` WHERE `$column` = :keyword");
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchcolumn();
        }

        
        public function uploadImage($file) {
            $filename = basename($file['name']);
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $folderName = '../profileImage/';
            $newName = mt_rand(1111, 9999).mt_rand(1111, 9999).".png";
            $joinFile = $folderName.$newName;
            $myTime = date("D j F, Y; h:i a");
            $array_allow = array('jpg', 'png', 'jpeg', 'bmp', 'gif');
            $file_ext = strtolower(pathinfo($filename)['extension']);

            if($fileSize > 3485760) {
                return $_SESSION['ErrorMessage'] = "The Image is more than 3mb";
            } elseif(!in_array($file_ext, $array_allow)) {
                return $_SESSION['ErrorMessage'] = "The File extension of this Image is not allowed";
            } else {
                if(move_uploaded_file($fileTmp, $joinFile)) {
                    return $newName;
                }
            }
        }

        public function query($stmt) {
            $stmt = $this->pdo->prepare ($stmt);
            $stmt->execute();
            return $stmt;
        }

        public function userData($user_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `user` WHERE `id` = :id");
            $stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function create($table, $fields = array()) {
            // remove the , from the key values in the fields(i.e the values input into databse)
            $columns = implode(',', array_keys($fields));
            $values = ':'.implode(', :', array_keys($fields));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $data) {
                    $stmt->bindValue(`:`.$key, $data);
                }
                $stmt->execute();
                return $this->pdo->lastInsertId();
            }
        }

    
        public function update($table, $id, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                if($i == 1)$columns .= "`$name` = '$value'";
                else $columns .= ", `$name` = '$value'";
                $i++;
            }

            $sql = "UPDATE $table SET $columns WHERE `id` = {$id}";
            // var_dump($sql);
            $stmt = $this->pdo->prepare($sql);
            return $stmt -> execute();
        }


        
        public function loggedIn() {
            return (isset($_SESSION['id'])) ? true : false;
        }

    }
?>
