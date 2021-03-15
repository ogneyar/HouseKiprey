<?
// Обрабатываем пришедшие данные
$data = $bot->init('php://input');

// Вывод на печать JSON файла пришедшего от бота, в группу тестирования
if ($OtladkaBota == 'да') $bot->sendMessage($test_group, $bot->PrintArray($data)); 

//echo "ok";

$update_id = $data['update_id'];


if ($data['callback_query']){	

	$callback_query = $data['callback_query'];
	
	$callback_query_id = $data['callback_query']['id'];
	
	$callback_from = $data['callback_query']['from'];
	
	$callback_from_id = $callback_from['id'];
	$callback_from_first_name = $callback_from['first_name'];
	$callback_from_last_name = $callback_from['last_name'];
	$callback_from_username = $callback_from['username'];
	$callback_from_language = $callback_from['language_code'];
	
	$data['message'] = $data['callback_query']['message'];
	
	$callback_data = $data['callback_query']['data'];
	
}


if ($data['edited_message']){
	
	$edited_message = $data['edited_message'];
	
	$edit_date = $edited_message['edit_date'];
	
	$data['message'] = $edited_message;
	
}


if ($data['channel_post']) {
	
	$channel_post = $data['channel_post'];
	
	$data['message'] = $channel_post;
	
}



if ($data['message']){

	$message_id = $data['message']['message_id'];
	
	$author_signature = $data['message']['author_signature'];

	if ($data['message']['from']){
		
		$message_from = $data['message']['from'];
		
		$from_id = $message_from['id'];
		$from_is_bot = $message_from['is_bot'];
		$from_first_name = $message_from['first_name'];
		$from_last_name = $message_from['last_name'];
		$from_username = $message_from['username'];
        $from_language = $message_from['language_code'];
	}
	
	if ($data['message']['chat']){
		
		$message_chat = $data['message']['chat'];
		
		$chat_id = $message_chat['id'];
		$chat_first_name = $message_chat['first_name'];
		$chat_last_name = $message_chat['last_name'];
		$chat_username = $message_chat['username'];
		$chat_title = $message_chat['title'];
		$chat_type = $message_chat['type'];
		
	}
		
	$date = $data['message']['date'];
	
	$new_chat_participant = $data['message']['new_chat_participant'];
	
	$left_chat_participant = $data['message']['left_chat_participant'];
		
	if ($data['message']['forward_from']) {
	
		$message_forward = $data['message']['forward_from'];

		$forward_id = $message_forward['id'];
		$forward_first_name = $message_forward['first_name'];
		$forward_last_name = $message_forward['last_name'];
		//if ($forward_last_name=="") $forward_last_name = 'отсутствует';
		$forward_username = $message_forward['username'];
		//if ($forward_username=="") $forward_username = 'отсутствует';		

	}
	
	$forward_sender_name = $data['message']['forward_sender_name'];
	
	if ($data['message']['forward_from_chat']) {
	
		$forward_from_chat = $data['message']['forward_from_chat'];
		
		$forward_chat_id = $forward_from_chat['id'];
		$forward_chat_title = $forward_from_chat['title'];
		$forward_chat_username = $forward_from_chat['username'];
		$forward_chat_type = $forward_from_chat['type'];
		
	}
	
	$forward_from_message_id = $data['message']['forward_from_message_id'];

	$forward_date = $data['message']['forward_date'];
	
	
	if ($data['message']['reply_to_message']){
		
		$reply_to_message = $data['message']['reply_to_message'];
		
        $reply_message_id = $reply_to_message['message_id'];
                
        $reply_from = $reply_to_message['from'];
                
		$reply_from_id = $reply_from['id'];
		$reply_from_first_name = $reply_from['first_name'];
		$reply_from_last_name = $reply_from['last_name'];
		//if ($reply_from_last_name=="") $reply_from_last_name = 'отсутствует';
		$reply_from_username = $reply_from['username'];
		//if ($reply_from_username=="") $reply_from_username = 'отсутствует';
		$reply_from_language = $reply_from['language_code'];	

        $reply_chat = $reply_to_message['chat'];
		
		$reply_chat_id = $reply_chat['id'];
		$reply_chat_first_name = $reply_chat['first_name'];
		$reply_chat_last_name = $reply_chat['last_name'];
		//if ($reply_chat_last_name=="") $reply_chat_last_name = 'отсутствует';
		$reply_chat_username = $reply_chat['username'];
		//if ($reply_chat_username=="") $reply_chat_username = 'отсутствует';
		$reply_chat_title = $reply_chat['title'];
		$reply_chat_type = $reply_chat['type'];

        $reply_date = $reply_to_message['date'];
		
        $reply_forward = $reply_to_message['forward_from'];

		$reply_forward_id = $reply_forward['id'];
		$reply_forward_first_name = $reply_forward['first_name'];
		$reply_forward_last_name = $reply_forward['last_name'];
		//if ($reply_forward_last_name=="") $reply_forward_last_name = 'отсутствует';
		$reply_forward_username = $reply_forward['username'];
		//if ($reply_forward_username=="") $reply_forward_username = 'отсутствует';

        $reply_forward_date = $reply_to_message['forward_date'];

        $reply_sender_name = $reply_to_message['forward_sender_name'];

		$reply_text = $reply_to_message['text'];
		
		$reply_caption = $reply_to_message['caption'];
		
	}
	
	$media_group_id = $data['message']['media_group_id'];
	
	if ($data['message']['photo']) {
	
		$photo = $data['message']['photo'];
		
		if ($photo[2]){
		
			$file_id = $photo[2]['file_id'];
			$file_unique_id = $photo[2]['file_unique_id'];
			$file_size = $photo[2]['file_size'];
			$width = $photo[2]['width'];
			$height = $photo[2]['height'];
			
		}elseif ($photo[1]){
		
			$file_id = $photo[1]['file_id'];	
			$file_unique_id = $photo[1]['file_unique_id'];
			$file_size = $photo[1]['file_size'];
			$width = $photo[1]['width'];
			$height = $photo[1]['height'];
			
		}else {
		
			$file_id = $photo[0]['file_id'];	
			$file_unique_id = $photo[0]['file_unique_id'];
			$file_size = $photo[0]['file_size'];
			$width = $photo[0]['width'];
			$height = $photo[0]['height'];
			
		}		
		
	}
	
	if ($data['message']['video']) {
	
		$video = $data['message']['video'];
		
		$duration = $video['duration'];
		$width = $video['width'];
		$height = $video['height'];
		$mime_type = $video['mime_type'];
		$thumb = $video['thumb'];
		
		$file_id = $video['file_id'];
		
		$file_unique_id = $video['file_unique_id'];
		$file_size = $video['file_size'];
		
	}		
	
	$caption = $data['message']['caption'];	
	
	$entities = $data['message']['entities'];
		
	$caption_entities = $data['message']['caption_entities'];
	
	$text = $data['message']['text'];	
	
	$reply_markup = $data['message']['reply_markup'];
	
	
	
//------------------------------	
	if ($photo) {
		
		$формат_файла = 'фото';
		
	}elseif ($video) {
		
		$формат_файла = 'видео';
		
	}
//------------------------------


}elseif ($data['edited_channel_post']) {

}elseif ($data['inline_query']) {

	$inline_query = $data['inline_query'];
	
	$inline_query_id = $inline_query['id'];
	
	$from = $inline_query['from'];
	
	$from_id = $from['id'];	
	
	$from_is_bot = $from['is_bot'];
	
	$from_first_name = $from['first_name'];
	
	$from_last_name = $from['last_name'];

	$from_username = $from['username'];
	
	$longitude = $inline_query['location']['longitude'];
	
	$latitude = $inline_query['location']['latitude'];
	
	$query = $inline_query['query'];
	
	$offset = $inline_query['offset'];
	

}elseif ($data['chosen_inline_result']) {

//}elseif ($data['callback_query']) {

}elseif ($data['shipping_query']) {

}elseif ($data['pre_checkout_query']) {

}elseif ($data['poll']) {

}


$клавиатура_отмена_ввода = [ // клавиатура с одной кнопкой ОТМЕНА ВВОДА
	'keyboard' => [ [ [ 'text' => "Отмена ввода" ] ] ],
	'resize_keyboard' => true,
	'selective' => true,
];	





$RKeyMarkup = [ 'keyboard' => [	[ [	'text' => "Старт" ], [ 'text' => "Стоп" ] ] ], 
	'resize_keyboard' => true,     'selective' => true ];

//--------------------------------------------------------------------------------
//-------------------------- КНОПКИ ----------------------------------------------

// обычная кнопка, внизу экрана
$KeyboardButton = [
	'text' => "Новая кнопка!",
	'request_contact' => false,
	'request_location' => false,
	'request_poll' => null, // кнопка опросса KeyboardButtonPollType
];

// одна кнопка на клавиатуре, прикреплённой к сообщению
$InlineKeyboardButton = [
	'text' => 'Текст',
	'callback_data' => 'текст_команда',
	'url' => null,
	'login_url' => null,
	'switch_inline_query' => null,
	'switch_inline_query_current_chat' => null,
	'callback_game' => null,
	'pay' => false
];

// кнопка опроса
$KeyboardButtonPollType = [
	'type' => 'quiz' // или 'regular' или 'otherwise'
];

//--------------------------------------------------------------------------------


//--------------------------------------------------------------------------------
//---------------------------------- КЛАВИАТУРЫ ----------------------------------

// клавиатура вместо основной
$ReplyKeyboardMarkup = [
	'keyboard' => [
		[
			[
				'text' => "%Новая кнопка!",
				'request_contact' => false,
				'request_location' => false,
				//'request_poll' => null
			],
			[
				'text' => "%Вторая новая кнопка!",
				'request_contact' => false,
				'request_location' => false,
				//'request_poll' => null
			],
		],
	],
	'resize_keyboard' => false,
	'one_time_keyboard' => false,
	'selective' => false,
];

// клавиатура на линии, привязанная к сообщению
$InlineKeyboardMarkup = [
	'inline_keyboard' => [
		[
			[
				'text' => 'Информация',
				'callback_data' => 'information',
				'url' => null,
				'login_url' => null,
				'switch_inline_query' => null,
				'switch_inline_query_current_chat' => null,
				'callback_game' => null,
				'pay' => false
			]
		]
	]
];

//-------------------------------------------------------------------------------


//-------------------------------------------------------------------------------

// удаление клавиатуры
$HideKeyboard = [
	'hide_keyboard' => true,
    'selective' => false,
];
// так же удаление клавиатуры (не знаю в чём разница)
$ReplyKeyboardRemove = [
	'remove_keyboard' => true,
	'selective' => false
];
// ответное сообщение клиенту
$ForceReply = [
	'force_reply' => true,
    'selective' => false
];
//--------------------------------------------------------------------------------


$категории[0] = "#недвижимость";  //"Недвижимость";  // \xF0\x9F\x8F\xA0 
$категории[1] = "#работа";  //"Работа";  // \xF0\x9F\x94\xA8 
$категории[2] = "#транспорт";  //"Транспорт";  // \xF0\x9F\x9A\x97 
$категории[3] = "#услуги";  //"Услуги";  // \xF0\x9F\x92\x87 
$категории[4] = "#личные_вещи";  //"Личные вещи";  // \xF0\x9F\x91\x95 
$категории[5] = "#для_дома_и_дачи";  //"Для дома и дачи";  // \xF0\x9F\x8C\x82 
$категории[6] = "#бытовая_электроника";  //"Бытовая электроника";  // \xF0\x9F\x92\xBB 
$категории[7] = "#животные";  //"Животные";  // \xF0\x9F\x90\xB0 
$категории[8] = "#хобби_и_отдых";  //"Хобби и отдых";  // \xE2\x9B\xBA 
$категории[9] = "#для_бизнеса";  //"Для бизнеса";  // \xF0\x9F\x91\x94 
$категории[10] = "#продукты_питания";  //"Продукты питания";
$категории[11] = "#красота_и_здоровье";  //"Красота и здоровье";



$тех_поддержка = "\n\nВопросы в [тех.поддержку](https://t.me/Prizm_market_supportbot?start=) \xF0\x9F\x91\x88\n\n";

$day = 86400;

$три_часа = 10800;




$для_примера_файл_айди_фото ="AgACAgIAAxkBAAIJu141fypzZg0el2vmTitcRyOV5-".
	"eVAAIVsDEbfdqoSe7b5ehZ7JFsbmbLDgAEAQADAgADeQADlqcBAAEYBA";

	
$InputMediaPhoto = [
	'type' => 'photo',
	'media' => $для_примера_файл_айди_фото,
	'caption' => null,
	'parse_mode' => null	
];




$InputTextMessageContent = [
	'message_text' => 'текст',
	'parse_mode' => null,
	'disable_web_page_preview' => false
];

$InlineQueryResultArticle = [	
	[
	// обязательные
		'type' => 'article',
		'id' => $from_id,
		'title' => 'Превосходная кнопка',
		'input_message_content' => [ 'message_text' => 'хоть какой текст' ],
	// необязательные
		//'reply_markup' => null,
		//'url' => null,
		//'hide_url' => false,
		'description' => 'нажми лучше её',
		//'thumb_url' => null,
		//'thumb_width' => null,
		//'thumb_height' => null
	]
];

$InlineQueryResultPhoto = [
	[
	// обязательные
		'type' => 'photo',
		'id' => $from_id."z",
		'photo_url' => 'https://i.ibb.co/SRCv6Z7/file-23.jpg',
		'thumb_url' => 'https://i.ibb.co/SRCv6Z7/file-21.jpg',
	// необязательные
		//'photo_width' => null,
		//'photo_height' => null,
		'title' => 'Продам молоток',
		'description' => 'молотки в ассортименте',
		'caption' => '#продам',
		//'parse_mode' => null,
		//'reply_markup' => null,
		//'input_message_content' => null		
	]	
];

$InlineQueryResultVideo = [
	[
		// обязательные
			'type' => 'video',
			'id' => $from_id."xz",
			'video_url' => 'https://prizm-market.s3.amazonaws.com/1006.mp4',
			'mime_type' => 'video/mp4', // или 'text/html'
			'thumb_url' => 'https://prizm-market.s3.amazonaws.com/1006.mp4',
			'title' => 'нажми',
		// необязательные
			//'caption' => '',
			//'parse_mode' => '',
			//'video_width' => '',
			//'video_height' => '',
			//'video_duration' => '',
			//'description' => '',
			//'reply_markup' => '',
			//'input_message_content' => ''
		]
];


// переменная для установки команд бота - $bot->setMyCommands($BotCommand);	
$BotCommand = [
	[
		'command' => "start",
		'description' => "Старт бота"
	],
	[
		'command' => "help",
		'description' => "Помощь"
	]
];










/* 
-------------------------------------

Далее переменные бота HouseKipreyaBot

-------------------------------------
*/


$start_text =  "Что бы попасть в главное меню отправь мне команду \"/start\" или просто напиши слово \"Старт\".";

$main_buttons = [
	"ЗАказать приРОДныеПРОДУКТЫ.рус",
	"ЗАказать Энергоэффективный Дом на своей земле за ЯРГА токен через ЯРГАтокен.рус",
	"поЛУЧить ДАРы 10 ЭКП 🏡Дом Кипрея 🌿 на 1 ЧелАвека от КБ АРТель Строителей 🏡🌲🌿🌊☀️ Тихо в Лесу☀️🌊🌿🌲🌳",
	"ЗАказать КОНсультацию от КЦР АЗ КОНсультантЫ",
	"ЗАказать КОНсультацию от Кооперативного Клуба Здравия ☀️РОД🌳",
	"ЗАваять✍️ ЗАявление в ПАйщики приРОДного Потреб Кооператива 🏡Дом Кипрея 🌿",
	"Оформить✍️ ЗАявку на 👨‍👩‍👧‍👦Семейный Тур🚟 на🌊 🌊Байкал🌊🌿🌊🌲🏡🌳 от РУСьТурЭко",
	"Оформить ЗАявку на переезд в РОДовое Поселение или ЭКОпоселение",
	"Взять с сайта ДомКипрея.рус про рАЗкрытие талантов",
];

// клавиатура вместо основной
$MainKeyboardMarkup = [
	'keyboard' => [
		[
			[
				'text' => $main_buttons[0],
			],
		],
		[
			[
				'text' => $main_buttons[1],
			],
		],
		[
			[
				'text' => $main_buttons[2],
			],
		],
		[
			[
				'text' => $main_buttons[3],
			],
		],
		[
			[
				'text' => $main_buttons[4],
			],
		],
		[
			[
				'text' => $main_buttons[5],
			],
		],
		[
			[
				'text' => $main_buttons[6],
			],
		],
		[
			[
				'text' => $main_buttons[7],
			],
		],
		[
			[
				'text' => $main_buttons[8],
			],
		],
	],
	// 'resize_keyboard' => false,
	'one_time_keyboard' => true,
	// 'selective' => true,
];

?>
