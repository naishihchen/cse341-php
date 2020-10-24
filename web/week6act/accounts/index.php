<?php
//Accounts Controller

//Session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


//Database connection file
require_once '../database_connect.php';
//require_once '../library/functions.php';

//PHP Motors Model
//require_once '../model/accounts-model.php';

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){
  case 'login':
    include '../login.php';
    break;

  case 'register':
    include '../registration.php';
    break;

  // case 'registration':

  //   $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  //   $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  //   $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  //   $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    
  //   $clientEmail = checkEmail($clientEmail);
  //   $checkPassword = checkPassword($clientPassword);

  //   //check for existing email address
  //   $uniqueEmail = emailConfirmation($clientEmail);

  //   if($uniqueEmail) {
  //     $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
  //     include '../view/login.php';
  //     exit;
  //   }

  //   if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
  //     $message = '<p>Please provide information for all empty form fields.</p>';
  //     include '../view/registration.php';
  //     exit;
  //   }

  //   $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

  //   $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

  //   if($regOutcome === 1){
  //     setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
  //     $_SESSION['message'] = "<p>Thanks for registering, $clientFirstname. Please use your email and password to login.</p>";
  //     header('Location: /phpmotors/accounts/?action=login');
  //     exit;
  //    } else {
  //     $_SESSION['message'] = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  //     include '../view/registration.php';
  //     exit;
  //    }

  //   break;

  // case 'Logging':

  //   $loginEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  //   $loginPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

  //   $loginEmail = checkEmail($loginEmail);
  //   $checkLoginPassword = checkPassword($loginPassword);

  //   if (empty($loginEmail) || empty($checkLoginPassword)) {
  //     $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
  //     include '../view/login.php';
  //     exit;
  //   }

  //   //Get client data based on email email
  //   $clientData = getClient($loginEmail);

  //   if($checkLoginPassword) {
  //     $hashCheck = password_verify($loginPassword, $clientData['clientPassword']);
  //   }
  //   if(!$hashCheck) {
  //     $_SESSION['message'] = '<p>Incorrect password. Please check your password and try again.</p>';
  //     include '../view/login.php';
  //     exit;
  //   }

  //   if(isset($_COOKIE['firstname'])) {
  //     setcookie('firstname', "", time() -3600, '/');
  //   }

  //   setcookie('username', $clientData['clientFirstname'], strtotime('+1 year'), '/');

  //   $_SESSION['loggedin'] = TRUE;

  //   //Remove password data from clientData
  //   array_pop($clientData);

  //   $_SESSION['clientData'] = $clientData;

  //   $reviews = getReviewByAccount($clientData['clientId']);

  //   $clientReviewDisplay = buildClientReviews($reviews);

  //   include '../view/admin.php';
  
  //   break;

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
  //       include '/phpmotors/accounts/index.php';
  //       exit;
  //   } else {
  //       $message = "<p>Sorry $clientFirstname, but the update failed. Please try again.</p>";
  //       include '/phpmotors/accounts/index.php';
  //       exit;
  //   }
  //   break;

  // case 'logout':
  //   session_destroy();
  //   setcookie('username', "", time() -3600, '/');
  //   header('Location: /phpmotors/');
  //   break;

  default:

    include '../items.php';
    break;

}

?>