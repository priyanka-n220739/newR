<?php
session_start();

$env = parse_ini_file('.env');

$client_id = $env['CLIENT_ID'];
$client_secret = $env['CLIENT_SECRET'];
$redirect_uri = $env['REDIRECT_URI'];

if (isset($_GET['code'])) {

    $code = $_GET['code'];

    // Exchange code for access token
    $token_url = "https://oauth2.googleapis.com/token";

    $data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-type: application/x-www-form-urlencoded",
            'content' => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);
    $token = json_decode($response, true);

    $access_token = $token['access_token'];

    // Get user info
    $user_info = file_get_contents(
        "https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . $access_token
    );

    $user = json_decode($user_info, true);

    $_SESSION['username'] = $user['name'];
    $_SESSION['email'] = $user['email'];

    header("Location: index.php");
    exit();
}
?>
