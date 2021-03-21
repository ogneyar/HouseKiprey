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
* функция заказа продуктов
* _заказать_продукты()
*
*
*/


// функция старта бота 
function _старт() {		
	global $bot, $chat_id, $callback_from_first_name, $from_first_name, $HideKeyboard, $MainKeyboardMarkup, $start_text;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$sms = "ДоБРО пожаловать, *".$callback_from_first_name."*!";
	$sms .= "\n\n";
	$sms .= "Если нужна поМОЩЬ - отправь мне слово \"помощь\" или команду \"/help\".";
    $sms .= "\n\n";
    $sms .= $start_text;
	$bot->sendMessage($chat_id, $sms, "markdown", $MainKeyboardMarkup);
}


// функция помощи 
function _help() {		
	global $bot, $chat_id, $callback_from_first_name, $from_first_name, $start_text;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$sms = "*Бог в помощь!*";
    $sms .= "\n\n";
	$sms .= "Список команд: \n/eko\n/help";
	$sms .= "\n\n";
    $sms .= $start_text;
	$bot->sendMessage($chat_id, $sms, "markdown");
}


// функция заказа продуктов
function _заказать_продукты() {
	global $bot, $chat_id, $callback_from_first_name, $from_first_name;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$sms = "Услуга пока не реализована!";
	$bot->sendMessage($chat_id, $sms, "markdown");
} 


// функция ответа на команду ЭКО
function _ЭКО() {
	global $bot, $chat_id, $callback_from_first_name, $from_first_name;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$file_id = "BAACAgIAAxkBAAIBwmBXbc3-0q35ufjjTAzfn0I1iM_xAALSCwACBTi4ShcQ8DHvVhhCHgQ";
	$caption = "СоТворец и Друг 🌞так дерЖАТЬ 🤝🌞и позитива 🌞🤗🏡🍋поднаЖАТЬ🌞🏡🍋🤝🍏🤝🍉🌰ПРАВИльный сайт https://rusineko.ru нажимай и реально на экп 🏡Дом Кипрея🌿 ЭКОлогию нашего общего🏡 ЭКОдома🌳🌏🌲🌍🌳🌎🌲🌈☀️Планеты Земля уЛУЧшай🌞🏡🤝";
	$bot->sendVideo($chat_id, $file_id, $caption);
}

?>