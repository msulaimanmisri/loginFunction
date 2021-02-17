<?php

function login($data)
{
    $conn = connection();
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $sql = "SELECT * FROM user WHERE username = '$username' && password = '$password';";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if ($result) {
        // set session
        $_SESSION['login'] = true;
        header("Location: /");
        exit;
    }
    return [
        'error' => true,
        'notice' => "Your username or password are incorrect",
    ];
}
