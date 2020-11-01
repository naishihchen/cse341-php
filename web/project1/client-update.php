<?php
    session_start();

    include 'database_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Soap Store</title>
        <link rel="stylesheet" type="text/css" href="/styles/storeStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeHeader.php'; ?>
        <main>  
            <h1>
                Update Account
            </h1>
            
            
            <div id="client-update">
                
                <h2>Account Info</h2>
                
            <div id="updateAccount">
                <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                ?>
                
                <form method="post" action="accounts/index.php">
                    <label for="clientFullname">Full Name: </label><input type="text" name="clientFullname" id="clientFullname" value="<?php if(isset($clientFullname)){echo $clientFullname;} 
                            elseif(isset($_SESSION['clientData']['fullname'])) {echo $_SESSION['clientData']['fullname']; } ?>" required><br>
                    <label for="clientUsername">User Name: </label><input type="text" name="clientUsername" id="clientUsername" value="<?php if(isset($clientUsername)){echo $clientUsername;} 
                            elseif(isset($_SESSION['clientData']['username'])) {echo $_SESSION['clientData']['username']; } ?>" required><br>
                    <label for="clientEmail">Email address: </label><input type="email" name="clientEmail" id="clientEmail" value="<?php if(isset($clientEmail)){echo $clientEmail;} 
                            elseif(isset($_SESSION['clientData']['email'])) {echo $_SESSION['clientData']['email']; } ?>" required>                
                <!-- Add the action name - value pair -->
                <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} 
                        elseif(isset($clientId)){ echo $clientId; } ?>">
                <input type="hidden" name="action" value="updateAccount"> 
                <input type="submit" value="Update Account">
            </form>
            </div>
            
            
            <h2>New Password</h2>
            <div id="password">
                <?php
                    if (isset($message)) {
                    echo $message;
                    }
                ?>
                
                <form method="post" action="accounts/index.php">
                    <span>Entering a password here will change the current password. Password must not be the same as the old password. Password must be 8 characters long, contain one uppercase letter, one number and one special character.</span>
                    <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
                <input type="submit" value="Update Password"><!--
                
                 Add the action name - value pair 
-->                <input type="hidden" name="action" value="newPassword">
                <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} 
                        elseif(isset($clientId)){ echo $clientId; } ?>"> 
            </form>
            </div>
            </div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
        </main>
    </body>
</html>