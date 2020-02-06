<?php
function login($username, $password){
    

    $pdo = Database::getInstance()->getConnection();

    //Check Instance
    //TODOL finsih the following query to count how many users
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_user` WHERE user_name=:username';
    $user_set = $pdo->prepare($check_exist_query);

    if($user_set->fetchColumn()>0){
        //Check if match
        $check_match_query = 'SELECT COUNT(*) FROM `tbl_user` WHERE user_name="'.$username.'"';
        $check_match_query .=' AND user_pass="'.$password.'"';
        $user_match = $pdo->query($check_match_query);
        if($user_match->fetchColumn()>0){

            return 'You logged in successfully!';
        }else{

            return 'Wrong pass';
        }
    }else{

        return 'User does not exist!';
    }

}