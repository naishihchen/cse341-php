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
    header("Location: /project1/login.php");
    break;

  case 'register':
    header("Location: /project1/registration.php");
    break;

  case 'registration':

    $clientFullname = filter_input(INPUT_POST, 'clientFullname', FILTER_SANITIZE_STRING);
    $clientUsername = filter_input(INPUT_POST, 'clientUsername', FILTER_SANITIZE_STRING);
    $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    //check for existing email address
    $uniqueEmail = emailConfirmation($clientEmail);

    if($uniqueEmail) {
      $_SESSION['message'] = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
      header("Location: /project1/login.php");
      exit;
    }

    if (empty($clientFullname) || empty($clientUsername) || empty($clientEmail) || empty($checkPassword)) {
      $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
      header("Location: /project1/registration.php");
      exit;
    }

    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    $regOutcome = regClient($clientFullname, $clientUsername, $clientEmail, $hashedPassword);

    if($regOutcome === 1){
      setcookie('firstname', $clientFullname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "<p>Thanks for registering, $clientFullname. Please use your email and password to login.</p>";
      header("Location: /project1/login.php");
      exit;
     } else {
      $_SESSION['message'] = "<p>Sorry $clientFulltname, but the registration failed. Please try again.</p>";
      header("Location: /project1/registration.php");
      exit;
     }

    break;

  case 'Logging':

    $loginEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    $loginPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

    $loginEmail = checkEmail($loginEmail);
    $checkLoginPassword = checkPassword($loginPassword);

    if (empty($loginEmail) || empty($checkLoginPassword)) {
      $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
      header("Location: /project1/login.php");
      exit;
    }

    //Get client data based on email email
    $clientData = getClient($loginEmail);

    if($checkLoginPassword) {
      $hashCheck = password_verify($loginPassword, $clientData['password']);
    }
    if(!$hashCheck) {
      $_SESSION['message'] = '<p>Incorrect password. Please check your password and try again.</p>';
      header("Location: /project1/login.php");
      exit;
    }

    if(isset($_COOKIE['fullname'])) {
      setcookie('fullname', "", time() -3600, '/');
    }

    setcookie('username', $clientData['clientFullname'], strtotime('+1 year'), '/');

    $_SESSION['loggedin'] = TRUE;

    //Remove password data from clientData
    array_pop($clientData);

    $_SESSION['clientData'] = $clientData;

    header("Location: /project1/accountInfo.php");
  
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
    header("Location: /project1/items.php");
    break;

  default:

    header("Location: /project1/items.php");
    break;

}

?>