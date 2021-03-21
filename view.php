<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sage PHP app</title>
</head>

<body>
    <div class="main">
        <h2>Account registration</h2>
        <ul>
            <li>
                <a href=<?php echo $developer_selfservice_url; ?> target="_blank">Register developer account in Sage</a>
            </li>
            <li>
                <a href=<?php echo $user_signup_url; ?> target="_blank">Register user account in Sage</a>
            </li>
        </ul>
        <div class="authorizate">
            <a href="<?php echo $authorization_request; ?>">Authorizate</a>
        </div>

        <div class="authorizate">
            <?php if (isset($_SESSION['auth'])) echo "You authorizate with token: $_SESSION[auth]" ?>
        </div>

    </div>
    
</body>

</html>