<?php
ob_start();
session_start();
     $localhost = '';
     $username = 'root';
     $password = '';
     $dbname = 'controla';
     $user_tb ='user';
     $course_tb = "course";


class library{
    var $localhost = '';
    var $username = 'root';
    var $password = '';
    var $dbname = 'controla';
    var $user_tb ='user';
    var $course_tb = "course";
    
    public function connect(){
        $link = mysqli_connect($this->localhost,$this->username,$this->password,$this->dbname);
         if(mysqli_select_db($link,$this->dbname)){
             return($link);        
         }else{
             print 'Not Connected';
         }
     }
     public function sql_query($sql){
         $result = $this->connect();
         $query = mysqli_query($result,$sql);
         if($query){
             return($query);
         }else{
             print 'Database Errorrrr'. " ". mysqli_connect_error();
         }   
 
     }

     public function validatePassword($pass,$cpass){
        if($pass==$cpass){
            return(1);            
        }else{
            return(0);
        }    
    }

    public function hashpassword($pass){
        $hashp = md5($pass);
       return($hashp);
    }

    public function register($fullname,$username,$email,$dob,$pass,$cpass){
        $checkP = $this->validatePassword($pass,$cpass);
        $hashp = $this->hashpassword($pass);
          if(!empty($fullname)&&!empty($email)&&!empty($username)&&!empty($dob)&&!empty($pass)&&!empty($cpass)){

                if($checkP==1){                    
                    if(strlen($pass)< 8 || (strlen($pass))>36){
                        return("password must be between 8-36 character");
                    }else{
                        //insert into the database  
                     $insert = $this->sql_query("INSERT INTO $this->user_tb 
                     VALUES(null,'".$fullname."','".$username."','".$email."','".$hashp."','".$dob."')");
                        if($insert){
                            //before sending to this  success page run your email activation function
                            header("location:lib/success.php?name=".$fullname);
                            
                        }else{
                            return("registration fail");
                        }
                    }
                }else{
                    return("password and the confirm password does not match!!!");
                }
        }else{
            return("Please Fill All The Fields");
        }
    }

            public function login($username,$pass){
                  $hashp = $this->hashpassword($pass);
                   $check = $this->sql_query("SELECT * FROM $this->user_tb WHERE `email`='".$username."' AND `password`='".$hashp."'");
                   if(mysqli_num_rows($check)>0){
                       $row = mysqli_fetch_assoc($check);

                    setcookie("user_id",$row['email'],time()+129000,"/");
                    header("location:dashboard.php"); 
                            }else {
                            return("INCORRECT USERNAME/PASSWORD COMBINATION");
                            }
                      }
    public function setUserLoggedin(){
    if(isset($_COOKIE['user_id'])&&!empty($_COOKIE['user_id'])){
        $_SESSION['logged_in']=$_COOKIE['user_id'];
    }else{
        if(isset($_SESSION['user_logged'])&&!empty($_SESSION['user_logged'])){
            $_SESSION['logged_in']=$_SESSION['user_logged'];
        } 
    }
        }

        public function CheckLoggedin($page){
            if(isset($_SESSION['logged_in'])&&!empty($_SESSION['logged_in'])){
                //his means that the admin is already logged in
            }else{
                header("location:".$page);
            }
        }


        public function addcourse($email,$coursen,$courset){
            if(!empty($coursen)&&!empty($courset)&&!empty($email)){
                $unit = 2;
                $insert = $this->sql_query("INSERT INTO $this->course_tb VALUES (null,'".$email."', '".$coursen."','".$courset."','".$unit."') ");
                if($insert){
                    return "SUCCESSFULLY ADDED COURSE";
                }else{
                    return "COURSE ADD FAILED";
                }

            }else{
                return "Fill All Fields!!!";
            }

        }

        public function deleteCourse($courseid){
            $deleteQuery = $this->sql_query("DELETE FROM $this->course_tb WHERE `id`='".$courseid."'  ");
            if($deleteQuery){
                return("Deleted Successfully!!!");
            }else{
                return("Failed To Delete!!!");
            }
        }

        public function getCourseDets($courseid,$value){
            $get = $this->sql_query("SELECT * FROM $this->course_tb WHERE `id`='".$courseid."' ");
               $row = mysqli_fetch_assoc($get);
               return($row[$value]);
           }

           public function updateCourse($courseid,$coursen,$courset){
            $update = $this->sql_query("UPDATE $this->course_tb SET `name`='".$coursen."',`title`='".$courset."' WHERE `id`='".$courseid."' ");
            if($update){
                return("COURSE UPDATED SUCCESSFULLY!!!!");
            }else{
                return("COURSE UPDATE FAILED!!!");
            }
    
        }

        public function resetPassword($email , $pass , $cpass){
            $checkP = $this->validatePassword($pass,$cpass);
            if($checkP == 1){
                if(strlen($pass)<8 || (strlen($pass))>36){
                    return("password must be between 8-36 character");
                }else{
                    $hashp = $this->hashpassword($pass);
                    $update = $this->sql_query("UPDATE $this->user_tb SET `password`='".$hashp."' WHERE `email`='".$email."' ");
                    if($update){
                        return("Password was Update Successfully");
                   }else{
                       return("Password Update Failed!!");
                   }
            }
        }else{
            return "Password and Confirm Password must be same!!!";
        }
           
            
        }


}
$call = new library;
$call -> setUserLoggedin();
?>