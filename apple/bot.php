<?php
// Telegram Webhook: Verarbeitet eingehende Updates
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Überprüfen, ob eine Nachricht empfangen wurde
if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];

    // Benutzerdaten extrahieren
    $telegram_id = $update["message"]["from"]["id"];
    $first_name = $update["message"]["from"]["first_name"] ?? '';
    $last_name = $update["message"]["from"]["last_name"] ?? '';
    $username = $update["message"]["from"]["username"] ?? '';

    // Debugging: Ausgabe der Benutzerdaten
    error_log("Telegram ID: $telegram_id");
    error_log("First Name: $first_name");
    error_log("Last Name: $last_name");
    error_log("Username: $username");

    // Start-Nachricht
    if ($message == "/start") {
        $welcomeMessage = "Welcome, $first_name! Your Telegram ID is $telegram_id.";
        sendMessage($chat_id, $welcomeMessage);
    }

    // Antwort mit den Benutzerdaten
    if ($message == "/info") {
        $infoMessage = "Here are your details:\n";
        $infoMessage .= "Telegram ID: $telegram_id\n";
        $infoMessage .= "First Name: $first_name\n";
        $infoMessage .= "Last Name: $last_name\n";
        $infoMessage .= "Username: @$username";
        sendMessage($chat_id, $infoMessage);
    }
}

// Funktion, um Nachrichten an Telegram zu senden
function sendMessage($chat_id, $message) {
    $apiToken = "7726877860:AAEP-im4Iw1E1FoamynQUuRdDBgyk5Yrnrg";
    $url = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chat_id&text=" . urlencode($message);
    file_get_contents($url);
}
?>
