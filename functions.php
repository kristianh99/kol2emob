<?php

function getCountryByIp(string $ipAddress): string
{
    $country = "unknown country";
    $url = "https://www.iplocate.io/api/lookup/{$ipAddress}";

    # Client URL Library  https://www.php.net/manual/en/book.curl.php
    # https://doc.bccnsoft.com/docs/php-docs-7-en/function.curl-setopt.html

    $curl = curl_init();
    # Initialize a cURL session
    curl_setopt($curl, CURLOPT_URL, $url);
    # The URL to fetch. This can also be set when initializing a session with curl_init().
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    #  	TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
    curl_setopt($curl, CURLOPT_HEADER, false);
    #  	TRUE to include the header in the output.
    $details = json_decode(curl_exec($curl), true);
    # Perform a cURL session
    curl_close($curl);
    # Close a cURL session

    if (!empty($details['country'])) {
        $country = $details['country'];
    }
    return $country;
}

function getIpAddress(): string
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function insertIntoStatistic($device, $ip_address, $country, $userAgent, $number)
{
    global $connection;

    $sql = "INSERT INTO log(device_type, ip_address, country, user_agent, date_time, number)
            VALUES ('$device','$ip_address','$country','$userAgent',now(),'$number')";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

}

function insertIntoMessage(string $message, string $ipAddress)
{
    global $connection;

    if (isset($_POST['code']) && isset($_POST['message'])) {

        $code = $_POST['code'];
        $message = $_POST['message'];

        if (!empty($message) or $code != "VTS") {

            $insertMessage = "INSERT INTO message(message,ip_address,date_time) VALUES ('$message','$ipAddress',now())";

            $result = mysqli_query($connection, $insertMessage) or die(mysqli_error($connection));

            echo "Thank you! Your ip address is:" . $ipAddress;
        } else {
            echo "No data! Your ip address is:" . $ipAddress;
        }
    }
}

