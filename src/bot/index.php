<?
// Подключаем библиотеку с классом Bot
include_once 'myBotApi/Bot.php';
// Подключаем библиотеку с глобальными переменными
include_once 'conect.php';
// exit('ok');

// Создаем объект бота
$bot = new Bot($bot_token);
$id_bota = strstr($bot_token, ':', true);

$master = 1038937592;

// подключение всех основных переменных
include_once 'myBotApi/Variables.php';

// подключение всех основных функций
include_once 'function.php';

// Если пришла ссылка типа t.me//..?start=123456789
if (strpos($text, "/start ")!==false) $text = str_replace ("/start ", "", $text);

//------------------------------
// подключение основного модуля
include_once 'bot.php';
//------------------------------

// обязательно возвращаем "ok", чтобы телеграмм не подумал, что запрос не дошёл
exit('ok'); 
?>
