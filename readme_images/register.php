<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'C:\\inetpub\\wwwroot\\php_error.log'); // Adjust the path as needed

$data = array('success' => false, 'message' => 'Unknown error');

try {
    // Database connection
    $serverName = "localhost";
    $connectionOptions = array(
        "Database" => "Account",
        "Uid" => "sa",
        "PWD" => "Password"
    );

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        throw new Exception('Connection failed: ' . print_r(sqlsrv_errors(), true));
    }

    // Prepare and execute insert query
    $sUserID = $_POST['username'] ?? ''; // Default to empty string if not set
    $sUserPW = md5($_POST['password'] ?? ''); // Hash the password using MD5
    $sUserName = $_POST['username'] ?? '';
    $sUserIP = $_SERVER['REMOTE_ADDR']; // Use the IP address of the user
    $bIsBlock = 0; // Default values for columns that allow NULLs
    $bIsDelete = 0;
    $nAuthID = 1; // Example value
    $dDate = date('Y-m-d H:i:s');
    $sUserNo = 0; // Example value
    $blsBlock = 0;
    $blsDelete = 0;

    $sql = "INSERT INTO [dbo].[tUser] 
            ([sUserID], [sUserPW], [sUserName], [sUserIP], [bIsBlock], [bIsDelete], [nAuthID], [dDate], [sUserNo], [blsBlock], [blsDelete]) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params = array($sUserID, $sUserPW, $sUserName, $sUserIP, $bIsBlock, $bIsDelete, $nAuthID, $dDate, $sUserNo, $blsBlock, $blsDelete);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception('Query failed: ' . print_r(sqlsrv_errors(), true));
    }

    $data['success'] = true;
    $data['message'] = 'User registered successfully';

} catch (Exception $e) {
    $data['message'] = $e->getMessage();
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>