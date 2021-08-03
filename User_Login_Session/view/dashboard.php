<?php
//Get logged-in user profile data to display a welcome message
namespace Jerome;

use \Jerome\User;

if(! empty($_SESSION["userId"])) {
    require_once __DIR__ . "./../class/User.php";
    $user = new User();
    $userResult = $user->getUserById($_SESSION["userID"]);
    if(! empty($userResult[0]["display_name"])) {
        $displayName = ucwords($userResult[0]["user_name"]);
    } else{
        $displayName = $userResult[0]["user_name"];
    }
}
?>
<html>
    <head>
        <title>User Dashboard</title>
        <link href="./view/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <div class="dashboard">
                <div class="user-dashboard">Welcome<b><?php echo $displayName; ?></b>, You have successfully logged in! <br>
                Click to <a href="./logout.php" class="logout-button">Logout</a>
            </div>
            </div>
        </div>
    </body>
</html>