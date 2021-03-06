<?php
//Accounts Controller

//Session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


//Database connection file
require_once '../functions_connect.php';
require_once '../functions.php';

//PHP Motors Model
require_once '../models/accounts-model.php';

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){
  case 'login':
    header("Location: /week7ta/login.php");
    break;

  case 'register':
    header("Location: /week7ta/registration.php");
    break;

  case 'registration':

    $clientUsername = filter_input(INPUT_POST, 'clientUsername', FILTER_SANITIZE_STRING);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    
    $checkPassword = checkPassword($clientPassword);

    if (empty($clientUsername) || empty($checkPassword)) {
      $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
      header("Location: /week7ta/registration.php");
      exit;
    }

    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    $regOutcome = registerClient($clientUsername, $hashedPassword);

    if($regOutcome === 1){
      setcookie('firstname', $clientUsername, strtotime('+1 year'), '/');
      $_SESSION['message'] = "<p>Thanks for registering, $clientFullname. Please use your email and password to login.</p>";
      header("Location: /week7ta/login.php");
      exit;
     } else {
      $_SESSION['message'] = "<p>Sorry $clientFulltname, but the registration failed. Please try again.</p>";
      header("Location: /week7ta/registration.php");
      exit;
     }

    break;

  case 'Logging':

    $loginUsername = filter_input(INPUT_POST, 'clientUsername', FILTER_SANITIZE_EMAIL);
    $loginPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

    $checkLoginPassword = checkPassword($loginPassword);

    if (empty($loginUsername) || empty($checkLoginPassword)) {
      $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
      header("Location: /week7ta/registration.php");
      exit;
    }

    //Get client data based on email email
    $clientData = getClient($loginUsername);

    if($checkLoginPassword) {
      $hashCheck = password_verify($loginPassword, $clientData['password']);
    }
    if(!$hashCheck) {
      $_SESSION['message'] = '<p>Incorrect password. Please check your password and try again.</p>';
      header("Location: /week7ta/login.php");
      exit;
    }

    if(isset($_COOKIE['username'])) {
      setcookie('username', "", time() -3600, '/');
    }

    setcookie('username', $clientData['username'], strtotime('+1 year'), '/');

    $_SESSION['loggedin'] = TRUE;

    //Remove password data from clientData
    array_pop($clientData);

    $_SESSION['clientData'] = $clientData;

    header("Location: /week7ta/home.php");
  
    break;

  // case 'accountUpdate':
  //   include '../view/client-update.php';
  //   break;

  // case 'updateAccount':
  //   $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  //   $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  //   $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
  //   $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  //   $clientEmail = checkEmail($clientEmail);
    
  //   $existingEmail = emailConfirmation($clientEmail);
    
  //   if ($clientEmail == $_SESSION['clientData']['clientEmail']) {
  //       $message = '<p>That email is taken. Please choose another.</p>';
  //         include '../view/client-update.php';
  //         exit;
  //   } elseif ($existingEmail) {
  //       $message = '<p>That email is taken. Please choose another.</p>';
  //         include '../view/client-update.php';
  //         exit;
  //   } else {
  //   }
    
    
    
  //   if(empty($clientEmail)){
  //       $message = '<p>Please provide an email address.</p>';
  //       include '../view/client-update.php';
  //       exit; 
  //   }
    
  //   $newInfo = updateAccount($clientFirstname, $clientLastname, $clientEmail, $clientId);
    
  //   $clientUpdatedData = getClientUpdate($clientId);
    
  //   $_SESSION['clientData'] = $clientUpdatedData;
    
  //   if($newInfo === 1){
  //       $message = "<p class='notice'>Account info successfully changed.</p>";
  //       include '../view/admin.php';
  //       exit;
  //   } else {
  //       $message = "<p>Sorry $clientId, but the update failed. Please try again.</p>";
  //       include '../view/admin.php';
  //       exit;
  //   }
    
  //   include '../view/admin.php';
  //   break;

  // case 'newPassword':
  //   $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
     
  //   $checkPassword = checkPassword($clientPassword);
  //   // If the password doesn't match, create an error
  //   if(!$checkPassword) {
  //       $message = '<p class="notice">Please check your password and try again.</p>';
  //       include '../view/client-update.php';
  //       exit;
  //   } else {
  //       $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
  //   }
    
  //   $passwordResults = passUpdate($hashedPassword, $_SESSION['clientData']['clientId']);
    
  //   if ($passwordResults) {
  //       $message = "<p>Password successfully changed</p>";
  //       include 'index.php';
  //       exit;
  //   } else {
  //       $message = "<p>Sorry $clientFirstname, but the update failed. Please try again.</p>";
  //       include 'index.php';
  //       exit;
  //   }
  //   break;

  case 'logout':
    session_destroy();
    setcookie('username', "", time() -3600, '/');
    header("Location: /week7ta/items.php");
    break;

  default:

    header("Location: /week7ta/items.php");
    break;

}

?>