<?php
//Accounts Model

//Site Registration Function
function regClient($clientFullname, $clientUsername, $clientEmail, $clientPassword) {
    //Database Connection
    $db = soapStoreConnect();

    //SQL statement
    $sql = 'INSERT INTO users (fullname, username, email, password, permissions)
    VALUES (:clientFullname, :clientUsername, :clientEmail, :clientPassword, 1)';

    //Prepare Statement
    $stmt = $db->prepare($sql);

    //Replace placeholders with variables
    $stmt->bindValue(':clientFullname', $clientFullname, PDO::PARAM_STR);
    $stmt->bindValue(':clientUsername', $clientUsername, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);

    //Execute statement
    $stmt->execute();

    //Verify results
    $rowsChanged = $stmt->rowCount();

    //Close connection
    $stmt->closeCursor();

    //Return rows changed
    return $rowsChanged;
}

//check for existing email address
function emailConfirmation($clientEmail) {  
    $db = soapStoreConnect(); 
    $sql = 'SELECT email FROM users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }
   }

   // Get client data based on an email address
function getClient($clientEmail){
    $db = soapStoreConnect();
    $sql = 'SELECT userid, fullname, username, email, permissions, password FROM users WHERE email = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }

   //Update Account
function updateAccount($clientFirstname, $clientLastname, $clientEmail, $clientId) {
    $db = soapStoreConnect();
    $sql = 'UPDATE users SET fullname = :clientFirstname, username = :clientLastname, '
            . 'email = :clientEmail WHERE userid = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
     $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//Get updated data
function getClientUpdate($clientId){
 $db = soapStoreConnect();
 $sql = 'SELECT userd, fullname, username, email, permissions, password 
         FROM users
         WHERE userd = :clientId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
 $stmt->execute();
 $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $clientData;
}

//Update Password
function passUpdate($hashedPassword, $clientId) {
    $db = soapStoreConnect();
    $sql = 'UPDATE users SET password = :hashedPassword WHERE userid = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
    $stmt->execute();
     $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

?>