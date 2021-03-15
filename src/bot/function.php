<?php

// подключение всех основных переменных
include_once 'myBotApi/Variables.php';

/*
* функция старта бота
* _старт()
*
* функция помощи
* _help()
*
*
*
*
*
*/


// функция старта бота 
function _старт() {		
	global $bot, $chat_id, $callback_from_first_name, $from_first_name, $HideKeyboard, $MainKeyboardMarkup;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$sms = "ДоБРО пожаловать, *".$callback_from_first_name."*!";
	$sms .= "\n\n";
	$sms .= "Если нужна поМОЩЬ - отправь мне слово \"помощь\" или команду \"/help\".";
	$bot->sendMessage($chat_id, $sms, "markdown", $MainKeyboardMarkup);
}


// функция помощи 
function _help() {		
	global $bot, $chat_id, $callback_from_first_name, $from_first_name;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$sms = "ДоБРО пожаловать, *".$callback_from_first_name."*!";
	$bot->sendMessage($chat_id, $sms, "markdown");
}



?>