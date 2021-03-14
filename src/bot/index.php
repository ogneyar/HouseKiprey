<?
// Подключаем библиотеку с классом Bot
include_once 'myBotApi/Bot.php';
// Подключаем библиотеку с глобальными переменными
include_once 'conect.php';
//exit('ok');

// Создаем объект бота
$bot = new Bot($bot_token);
$id_bota = strstr($bot_token, ':', true);	

	
// ПОДКЛЮЧЕНИЕ ВСЕХ ОСНОВНЫХ ПЕРЕМЕННЫХ
include 'myBotApi/Variables.php';
	
	
if ($text == "/start"||$text == "s"||$text == "S"||$text == "с"||$text == "С"||$text == "c"||$text == "C"||$text == "Старт"||$text == "старт") {
	if ($chat_type=='private') {
		_старт();  			
	}	
}

// функция старта бота 
function _старт() {		
	global $bot, $chat_id, $callback_from_first_name, $from_first_name, $HideKeyboard;
    if (!$callback_from_first_name) $callback_from_first_name = $from_first_name;
	$bot->sendMessage($chat_id, "Добро пожаловать, *".$callback_from_first_name."*!", "markdown", $HideKeyboard);		

}


exit('ok'); //Обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
?>
