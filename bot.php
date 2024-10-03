<?php
// Thay 'YOUR_BOT_TOKEN' bằng token bạn nhận được từ BotFather
$botToken = '7790082185:AAHeLYkTc93pv4AEpLENvpOM9lUT3VCVtcE';
$website = "https://api.telegram.org/bot".$botToken;

// Hàm để gửi yêu cầu tới API của Telegram
function sendMessage($chatId, $message) {
    global $website;
    $url = $website."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
    file_get_contents($url);
}

// Xử lý dữ liệu từ webhook
$update = file_get_contents('php://input');
$updateArray = json_decode($update, TRUE);

if (isset($updateArray['message'])) {
    $chatId = $updateArray['message']['chat']['id'];
    $message = $updateArray['message']['text'];

    // Gửi lại tin nhắn nhận được từ người dùng
    sendMessage($chatId, "You said: ".$message);
}
?>
