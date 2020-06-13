
<?require_once("coded-project3/include/session.php");?>
<?require_once("coded-project3/include/server.php");?>
<?php



//redirect function if a user violates our terms while signing up.
function redirect_to($violation){
    header("location:". $violation);
    exit;
}


function encryption($password){
    $blowfish_hash_format ="$2y$15$";
    $salt_lenght ="50";
    $salt = generate_salt($salt_lenght);
    $formating_blowfish_with_salt = $blowfish_hash_format .$salt;
    $hash = crypt($password, $formating_blowfish_with_salt);
    return $hash;
    
}



function generate_salt($salt_lenght){
    $unique_random_string =md5(uniqid(mt_rand(), true));
    $base64_string =base64_encode($unique_random_string);
    $modified_base64_string = str_replace('+', '.', $base64_string);
    $salt= substr($modified_base64_string, 0, $salt_lenght);
    return $salt;
}




function password_check($password,$existing_hash){
    $hash =crypt($password, $existing_hash);
    if ($hash===$existing_hash){
        return true;

    }else{
        return false;
    }
}

function checkemail($email){
    global $conn;
    $query="SELECT * FROM user_reg where email='$email'";//01
    $inject =mysqli_query($conn,$query);//02
    if(mysqli_num_rows($inject) >0){ //03
        return true;
    }else{
        return false;
    }
}


function checkusername($username){
    global $conn;
    $query="SELECT * FROM user_reg where username='$username'"; //01
    $inject=mysqli_query($conn, $query);
    if(mysqli_num_rows($inject) >0){
        return true;
    }else{
        return false;
    }
}
function loginatempt($email,$password){
    global $conn;
    $query="SELECT * FROM user_reg where email='$email'";
    $execute=mysqli_query($conn,$query);
    if($admin=mysqli_fetch_assoc($execute)){
        if(password_check($password,$admin['password'])){
            return $admin;
        }else{return null;}
    }
}
function check_active_email(){
    global $conn;
    $query="SELECT * FROM user_reg where active='on'"; //01
    $inject=mysqli_query($conn, $query);
    if(mysqli_num_rows($inject) >0){
        return true;
    }else{
        return false;
    }
}



















?>