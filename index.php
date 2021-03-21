<?php

session_start();

//session_unset();

include 'client_config.php';

$developer_selfservice_url = "https://developerselfservice.sageone.com";
$user_signup_url = "https://developer.sage.com/api/accounting/guides/faq/";

$url_req = "https://www.sageone.com/oauth2/auth/central?filter=apiv3.1";

$authorization_request = "$url_req&response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&scope=full_access";

include 'view.php';
