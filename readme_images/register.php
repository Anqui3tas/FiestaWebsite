<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allows requests from any origin. Adjust as needed.
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Allow specific methods.
header('Access-Control-Allow-Headers: Content-Type'); // Allow specific headers.
error_reporting(E_ALL);
ini_set('display_errors', 1);
$serverName = "PCNAME\\InstanceName";
$connectionOptions = array(
    "Database" => "Account",
    "Uid" => "sa",
    "PWD" => "Password"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    echo json_encode(["success" => false, "message" => "Database connection error."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $rpassword = trim($_POST['rpassword']);

    $response = [];

    if (strlen($username) < 3 || strlen($username) > 15) {
        $response["success"] = false;
        $response["message"] = "Your username must be between 3 and 15 characters in length.";
    } elseif (strlen($password) < 3 || strlen($password) > 15 || strlen($rpassword) < 3 || strlen($rpassword) > 15) {
        $response["success"] = false;
        $response["message"] = "The password must be between 3 and 15 characters in length.";
    } elseif ($password !== $rpassword) {
        $response["success"] = false;
        $response["message"] = "The passwords must be the same.";
    } elseif ($username === $password) {
        $response["success"] = false;
        $response["message"] = "The username and password cannot be the same.";
    } else {
        $sql = "SELECT * FROM tUser WHERE sUserName = ?";
        $params = array($username);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            $response["success"] = false;
            $response["message"] = "Error checking username.";
        } elseif (sqlsrv_has_rows($stmt)) {
            $response["success"] = false;
            $response["message"] = "The username already exists.";
        } else {
            $sql = "INSERT INTO tUser (sUserID, sUserName, sUserPW) VALUES (?, ?, ?)";
            $params = array($username, $username, md5($password));
            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt === false) {
                $response["success"] = false;
                $response["message"] = "Error inserting user.";
            } else {
                $response["success"] = true;
                $response["message"] = "You've been successfully registered as <strong>" . htmlspecialchars($username) . "</strong>!";
            }
        }
    }

    echo json_encode($response);
}

sqlsrv_close($conn);
?>