<?php
require 'twilio-php/Services/Twilio.php';
$response = new Services_Twilio_Twiml();
$response->say('Hello');
$response->play('http://soundboard.panictank.net/Darude%20-%20Dankstorm.mp3');
print $response;
?>

