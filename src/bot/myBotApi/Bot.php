<?php

/**----------+
 * Class Bot |
 * ----------+
 *
 * init
 *
 * getData
 *
 * call
 * 
 * setWebhook
 *
 * PrintArray
 *
 * ---------------
 * Список методов:
 * ---------------
 *
 * sendMessage
 *
 * forwardMessage
 *
 * editMessageText
 *
 * editMessageMedia
 *
 * editMessageReplyMarkup
 *
 * deleteMessage
 *
 * sendPhoto
 *
 * sendVideo - 478
 *
 * sendDocument
 *
 * sendAnimation
 *
 * sendMediaGroup
 *
 * answerCallbackQuery
 *
 * getChat
 *
 * getFile
 *
 * answerInlineQuery
 *
 * setMyCommands
 *
 *
 * -----------------------------
 * функции работы с базой данных
 * -----------------------------
 *
 * add_to_database
 *
 * this_admin
 *
 * output_table
 *
 * output_table_mini
 *
 * output
 *
 * _проверка_БАНа
 *
 */

class Bot
{
    // $token - созданный токен для нашего бота от @BotFather
    public $token = null;
    // адрес для запросов к API Telegram
    public $apiUrl = "https://api.telegram.org/bot";
	
	public $fileUrl = "https://api.telegram.org/file/bot";
    
	/*
	** @param str $token
	*/
    public function __construct($token)
    {
        $this->token = $token;
    }    
    
	/*
	** @param JSON $data_php
	** @return array
	*/
    public function init($data_php)
    {
        // создаем массив из пришедших данных от API Telegram
        $data = $this->getData($data_php);         
        return $data;        
    }
	
	/*
    ** @param JSON $data
    ** @return array
    */
    private function getData($data)
    {
        return json_decode(file_get_contents($data), TRUE);
    }
    
    
    /* 
	** Отправляем запрос в Телеграмм
	**
    ** @param str $method
    ** @param array $data    
	**
    ** @return mixed
    */
    public function call($method, $data)
    {
        $result = null;
        if (is_array($data)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->apiUrl . $this->token . '/' . $method);
            curl_setopt($ch, CURLOPT_POST, count($data));
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $result = curl_exec($ch);
            curl_close($ch);
        }
        return $result;
    }
    
	
	public function setWebhook($url) {
				
		$response = $this->call("setWebhook", [
			'url' => $url
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}


	/*
	**  функция вывода на печать массива
	**
	**  @param array $mass
	**  @param int $i
	**  @param str $flag
	**
	**  @return string
	*/
	public function PrintArray($mass, $i = 0) {		
		global $flag;			
		$flag .= "\t\t\t\t";						
		foreach($mass as $key[$i] => $value[$i]) {				
			if (is_array($value[$i])) {			
					$response .= $flag . $key[$i] . " : \n";					
					$response .= $this->PrintArray($value[$i], ++$i);					
			}else $response .= $flag . $key[$i] . " : " . $value[$i] . "\n";			
		}		
		$str = $flag;		
		$flag = substr($str, 0, -4);		
		return $response;		
	}
	
	
    
    /*
	**  функция отправки сообщения 
	**
	**  @param int $chat_id
 	**  @param str $text
	**  @param str $parse_mode
	**  @param array $reply_markup
	**  @param int $reply_to_message_id	
	**  @param bool $disable_web_page_preview
	**  @param bool $disable_notification
	**  
	**  @return array
	*/
    public function sendMessage(
		$chat_id, 
		$text,
		$parse_mode = null,
		$reply_markup = null,
		$reply_to_message_id = null,
		$disable_web_page_preview = false,
		$disable_notification = false
	) {
		
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("sendMessage", [
			'chat_id' => $chat_id,
			'text' => $text,
			'parse_mode' => $parse_mode,			
			'disable_web_page_preview' => $disable_web_page_preview,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	/*
	**  функция пересылки сообщения	
	**
	**  @param int $chat_id
 	**  @param int $from_chat_id
	**  @param int $message_id  
	**  @param bool $disable_notification
	**
	**  @return array
	*/
	public function forwardMessage(
		$chat_id,
		$from_chat_id,
		$message_id,
		$disable_notification = false
	) {
		$response = $this->call("forwardMessage", [
			'chat_id' => $chat_id,
			'from_chat_id' => $from_chat_id,
			'disable_notification' => $disable_notification,
			'message_id' => $message_id
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
	
		return $response;
	}
	
	
	/*
	**  функция редактирования сообщения	
	**
	**  @param int $chat_id
	**  @param int $message_id  
	**  @param str $text  
	**  @param int $inline_message_id  
	**  @param str $parse_mode
	**  @param bool $disable_web_page_preview
	**  @param array $reply_markup
	**
	**  @return array
	*/
	public function editMessageText(		
		$chat_id = null,		
		$message_id = null,
		$text,
		$inline_message_id = null,
		$parse_mode = null,
		$disable_web_page_preview = false,
		$reply_markup = null
	) {
	
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("editMessageText", [
			'chat_id' => $chat_id,						
			'message_id' => $message_id,
			'text' => $text,
			'inline_message_id' => $inline_message_id,
			'parse_mode' => $parse_mode,
			'disable_web_page_preview' => $disable_web_page_preview,
			'reply_markup' => $reply_markup			
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
	
		return $response;
	}
    
	
	
	
	/*
	**  функция редактирования медиа (фото или видео или ...)	
	**
	**  @param int $chat_id
	**  @param int $message_id  
	**  @param int $inline_message_id  
	**  @param obj $media
	**  @param array $reply_markup
	**
	**
	**  @return array
	*/
	public function editMessageMedia(		
		$chat_id = null,		
		$message_id = null,		
		$inline_message_id = null,
		$media,
		$reply_markup = null
	) {
	
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("editMessageMedia", [
			'chat_id' => $chat_id,						
			'message_id' => $message_id,			
			'inline_message_id' => $inline_message_id,		
			'media' => json_encode($media),
			'reply_markup' => $reply_markup			
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
	
		return $response;
	}
	
	
	
	
	
	
	/*
	**  функция редактирования кнопок	
	**
	**  @param int $chat_id
	**  @param int $message_id  
	**  @param int $inline_message_id  
	**  @param array $reply_markup
	**
	**
	**  @return array
	*/
	public function editMessageReplyMarkup(		
		$chat_id = null,		
		$message_id = null,		
		$inline_message_id = null,		
		$reply_markup = null
	) {
	
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("editMessageReplyMarkup", [
			'chat_id' => $chat_id,						
			'message_id' => $message_id,			
			'inline_message_id' => $inline_message_id,			
			'reply_markup' => $reply_markup			
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
	
		return $response;
	}
	
	
	
	
	
	
	/*
	**  функция удаления сообщения	
	**
	**  @param int $chat_id
	**  @param int $message_id  
	**
	**  @return array
	*/
	public function deleteMessage(		
		$chat_id = null,		
		$message_id = null
	) {
	
		$response = $this->call("deleteMessage", [
			'chat_id' => $chat_id,						
			'message_id' => $message_id	
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
	
		return $response;
	}
	
	
	/*
	**  функция отправки фото
	**
	**  @param int $chat_id
 	**  @param str $photo
	**  @param str $caption
	**  @param str $parse_mode
	**  @param array $reply_markup
	**  @param int $reply_to_message_id	
	**  @param bool $disable_notification
	**  
	**  @return array
	*/
    public function sendPhoto(
		$chat_id, 
		$photo,
		$caption = null,
		$parse_mode = null,
		$reply_markup = null,
		$reply_to_message_id = null,		
		$disable_notification = false
	) {
		
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("sendPhoto", [
			'chat_id' => $chat_id,
			'photo' => $photo,
			'caption' => $caption,
			'parse_mode' => $parse_mode,			
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	
	/*
	**  функция отправки видео
	**
	**  @param int $chat_id
 	**  @param str $video
	**  @param str $caption
	**  @param str $parse_mode
	**  @param array $reply_markup
	**  @param int $reply_to_message_id	
	**  @param int $duration
	**  @param int $width
	**  @param int $height
	**  @param str $thumb
	**  @param bool $disable_notification
	**  @param bool $supports_streaming
	**  
	**  @return array
	*/
    public function sendVideo(
		$chat_id, 
		$video,		
		$caption = null,
		$parse_mode = null,
		$reply_markup = null,
		$reply_to_message_id = null,		
		$duration = null,
		$width = null,
		$height = null,
		$thumb = null,
		$disable_notification = false,
		$supports_streaming = false
	) {
		
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("sendVideo", [
			'chat_id' => $chat_id,
			'video' => $video,
			'duration' => $duration,
			'width' => $width,
			'height' => $height,
			'thumb' => $thumb,
			'caption' => $caption,
			'parse_mode' => $parse_mode,		
			'supports_streaming' => $supports_streaming,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	/*
	**  функция отправки документов 
	**
	**  @param int $chat_id
 	**  @param str $document
	**  @param str $caption
	**  @param str $parse_mode
	**  @param array $reply_markup
	**  @param int $reply_to_message_id	
	**  @param str $thumb
	**  @param bool $disable_notification
	**  
	**  @return array
	*/
    public function sendDocument(
		$chat_id, 
		$document,			
		$caption = null,		
		$parse_mode = null,		
		$reply_markup = null,
		$reply_to_message_id = null,	
		$thumb = null,		
		$disable_notification = false
	) {
		
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("sendDocument", [
			'chat_id' => $chat_id,
			'document' => $document,
			'thumb' => $thumb,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
		
	
	/*
	**  функция отправки анимаций
	**
	**  @param int $chat_id
 	**  @param str $animation
	**  @param str $caption
	**  @param str $parse_mode
	**  @param array $reply_markup
	**  @param int $reply_to_message_id	
	**  @param int $duration
	**  @param int $width
	**  @param int $height
	**  @param str $thumb
	**  @param bool $disable_notification
	**  
	**  @return array
	*/
    public function sendAnimation(
		$chat_id, 
		$animation,		
		$caption = null,
		$parse_mode = null,
		$reply_markup = null,
		$reply_to_message_id = null,		
		$duration = null,
		$width = null,
		$height = null,
		$thumb = null,
		$disable_notification = false
	) {
		
		if ($reply_markup) $reply_markup = json_encode($reply_markup);
		
		$response = $this->call("sendAnimation", [
			'chat_id' => $chat_id,
			'animation' => $animation,
			'duration' => $duration,
			'width' => $width,
			'height' => $height,
			'thumb' => $thumb,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'reply_markup' => $reply_markup
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	/*
	**  функция отправки группы фото или видео
	**
	**  @param int $chat_id
 	**  @param array obj $media
	**  @param bool $disable_notification
	**  @param int $reply_to_message_id	
	**
	**  
	**  @return array (message)
	*/
    public function sendMediaGroup(
		$chat_id, 
		$media,		
		$disable_notification = false,
		$reply_to_message_id = null			
	) {	
		
		$response = $this->call("sendMediaGroup", [
			'chat_id' => $chat_id,
			'media' => json_encode($media),			
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id			
		]);	
				
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	
	/*
	** Ответное сообщение на нажатие кнопки callback_query
	**
	** @param int $callback_query_id
	** @param str $text
	** @param bool $show_alert
	** @param str $url
	** @param date $cache_time
	** 
	** @return array
	*/
	public function answerCallbackQuery(
		$callback_query_id,
		$text = null,
		$show_alert = false,
		$url = null,
		$cache_time = null
	){
		$response = $this->call("answerCallbackQuery", [
			'callback_query_id' => $callback_query_id,
			'text' => $text,
			'show_alert' => $show_alert,
			'url' => $url,
			'cache_time' => $cache_time
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	/*
	** Вывод информации о чате (о юзере, группе, супергруппе или о канале)
	**
	** @param int $chat_id
	**
	** @return array
	*/
	public function getChat($chat_id){
		
		$response = $this->call("getChat", ['chat_id' => $chat_id]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}

    
    
	/*
	** Возвращает информацию о файле
	**
	** @param int $file_id
	**
	** @return array
	*/
	public function getFile($file_id){
		
		$response = $this->call("getFile", ['file_id' => $file_id]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	
	/*
	** Ответ на сообщение inline
	**
	** @param int $inline_query_id
	** @param array obj $results
	** @param int cache_time
	** @param bool is_personal
	** @param str next_offset
	** @param str switch_pm_text
	** @param sttr switch_pm_parameter
	**
	**
	** @return array
	*/
	public function answerInlineQuery(
		$inline_query_id,
		$results,
		$cache_time = 300,
		$is_personal = false,
		$next_offset = '',
		$switch_pm_text = null,
		$switch_pm_parameter = null
	){		
		$response = $this->call("answerInlineQuery", [		
			'inline_query_id' => $inline_query_id,
			'results' => json_encode($results),
			'cache_time' => $cache_time,
			'is_personal' => $is_personal,
			'next_offset' => $next_offset,
			'switch_pm_text' => $switch_pm_text,
			'switch_pm_parameter' => $switch_pm_parameter
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	/*
	** Установка команд бота
	**	
	** @param array obj $commands
	**
	**
	** @return array
	*/
	public function setMyCommands($commands) {
		$response = $this->call("setMyCommands", [
			'commands' => json_encode($commands),
		]);
		
		$response = json_decode($response, true);
		
		if ($response['ok']) {
			$response = $response['result'];
		}else $response = false;
		
		return $response;
	}
	
	
	
	
	
	
		
//------------------------------------------
// функции работы с базой данных


		
	/*
	** Добавление пользователя в базу
	**
	** @param str $table
	**
	** @return boolean
	*/		
	public function add_to_database($table) { // функция проверки есть ли юзер в базе 

		global $from_id, $from_first_name, $from_last_name, $from_username, $mysqli, $admin_group;
		
		$est_li_v_base = false;
		
		$from_Uname = '';
		
		if ($from_username!='') $from_Uname = "@".$from_username;
		
		$query = "SELECT * FROM ". $table . " WHERE id_client=".$from_id; 
		
		if ($result = $mysqli->query($query)) {			
		
			if($result->num_rows>0){
				
				$arrayResult = $result->fetch_all(MYSQLI_ASSOC);
				
				foreach ($arrayResult as $row){
				
					if ($row['user_name']==$from_Uname&&$row['first_name']==$from_first_name&&$row['last_name']==$from_last_name) $est_li_v_base = true;						
				
				}									

			}			
			
		}				
			
		if ($est_li_v_base == false) {                        
			
			if (strpos($from_first_name, "'")!==false) $from_first_name = str_replace("'", "\'", $from_first_name);
			if (strpos($from_last_name, "'")!==false) $from_last_name = str_replace("'", "\'", $from_last_name);
			
			$query = "INSERT INTO ".$table." (
				`id_client`, 
				`first_name`, 
				`last_name`, 
				`user_name`, 
				`status`
			) VALUES (
				'". $from_id ."', '" . $from_first_name . "', '" . $from_last_name . "', '" . 
				$from_Uname. "', 'client')";
			
			if ($result = $mysqli->query($query)) {		
			
				$this->sendMessage($admin_group, 'Добавлен новый клиент '.$from_Uname);
				
				$est_li_v_base=true;	
				
			}else $this->sendMessage($admin_group, 'Не смог добавить нового клиента');			
			
		}				

		return $est_li_v_base;
	}

	
	
	
	
	/*
	** Узнаю кто пишет, админ или клиент
	**
	** @param str $table
	**
	** @return boolean
	*/
	public function this_admin($table) { 

		global $master, $mysqli, $from_id, $callback_from_id;
		
		if (!$callback_from_id) $callback_from_id = $from_id;
		
		$this_admin = false;		
		
		$query = "SELECT id_client FROM ".$table." WHERE status='admin'";
		
		if ($result = $mysqli->query($query)) {		
		
			$kolS=$result->num_rows;
			
			if($kolS>0){
			
				$arrStrok = $result->fetch_all(MYSQLI_ASSOC);	
				
				for ($i=0; $i<$kolS; $i++) {		
									
					if ($callback_from_id==$arrStrok[$i]['id_client']) $this_admin = true;
				}						
				
			}	
			
		}else $this->sendMessage($master, 'Чего то не получается узнать администраторов бота');			
		
		return $this_admin;
		
	}
	
	
	
	/*
	** Вывод заданной таблицы на экран
	**
	** @param str $table
	** @param int $max_kol_s
	** @param int $id_client
	**
	** @return boolean
	*/
	public function output_table($table, $id_client = null, $max_kol_s = 4000) { 

		global $chat_id, $mysqli, $master;
		
		if ($id_client) {
			
			$query = "SELECT * FROM ".$table." WHERE id_client=".$id_client;
			
		}else $query = "SELECT * FROM ".$table;
		
		if ($result = $mysqli->query($query)) {		
		
			$reply="Таблица {$table}:\n";
			
			if($result->num_rows>0){
			
				$arrayResult = $result->fetch_all();		
				
				foreach($arrayResult as $row){					
				
					foreach($row as $stroka) $reply.= "| ".$stroka." ";
					
					$reply.="|\n";							
				}					
		
				$this->output($reply, $max_kol_s);
					
			}else $this->sendMessage($chat_id, "пуста таблица ".
					" \xF0\x9F\xA4\xB7\xE2\x80\x8D\xE2\x99\x82\xEF\xB8\x8F");		
					
		}else throw new Exception("Не смог получить записи в таблице {$table}");

		return true;
	
	}
	
		
	
	
	/*
	** Вывод заданной таблицы на экран (сокращённый вариант)
	**
	** @param str $table
	** @param int $max_kol_s
	** @param int $id_client
	**
	** @return boolean
	*/
	public function output_table_mini($table, $id_client = null, $max_kol_s = 4000) { 

		global $chat_id, $mysqli, $master;
		
		if ($id_client) {
			
			$query = "SELECT `id_client`, `id_zakaz`, `kuplu_prodam`, `nazvanie`, `username` FROM ".$table." WHERE id_client=".$id_client;
			
		}else $query = "SELECT `id_client`, `id_zakaz`, `kuplu_prodam`, `nazvanie`, `username` FROM ".$table;
		
		if ($result = $mysqli->query($query)) {		
		
			$reply="Таблица {$table}:\n";
			
			if($result->num_rows>0){
			
				$arrayResult = $result->fetch_all();		
				
				foreach($arrayResult as $row){					
				
					foreach($row as $stroka) $reply.= "| ".$stroka." ";
					
					$reply.="|\n";							
				}					

				$this->output($reply, $max_kol_s);				
					
			}else $this->sendMessage($chat_id, "пуста таблица ".
					" \xF0\x9F\xA4\xB7\xE2\x80\x8D\xE2\x99\x82\xEF\xB8\x8F");		
					
		}else throw new Exception("Не смог получить записи в таблице {$table}");

		return true;
	
	}
	
	
	
	
	
	/*
	** функция печати (разбивание сообщения на части)
	**
	** @param str $text
	** @param int $max_kol_s
	**
	** @return boolean
	*/
	public function output($text, $max_kol_s = 4000) { 

		global $chat_id, $master;
		
		//$text = str_replace('_', '\_', $text);
		//$text = str_replace('"', '\"', $text);
		//$text = str_replace("'", "\'", $text);
		//$text = str_replace('`', '\`', $text);
		//$text = str_replace('*', '\*', $text);
		
		$text = str_replace(';', '', $text);
		$text = str_replace('*', '', $text);
		$text = str_replace('%', '', $text);
		$text = str_replace('`', '', $text);

		
		//$text = mysqli_real_escape_string($text);
		
		$kol = strlen($text) ;

		if ($kol > 1){
		
			if ($kol <= $max_kol_s){

				$результат = null;
				
				while (!$результат && $kol > 1) {
					
					$результат = $this->sendMessage($chat_id, $text, null, null, null, true);

                    if (!$результат) {

						$text = substr($text, 1);

                        $kol = strlen($text);
						
						$результат = $this->sendMessage($chat_id, $text, null, null, null, true);
					   
						if (!$результат && $kol > 2) {
					   
							$text = substr($text, 1, -1);	
						   
							$kol = strlen($text);	
							   
						}
                        
                    }
               
				}			

			}else{					
			
				$len_str = strlen($text);				
				
				$kolich = $len_str - $max_kol_s;
				
				$str = substr($text, 0, -$kolich);
				
				$результат = null;

				$kol = strlen($str);	
				
				while (!$результат && $kol > 1) {
				
					$результат = $this->sendMessage($chat_id, $str, null, null, null, true);

					if (!$результат) {
					   
						$str = substr($str, 0, -1);	
					   
						$kol = strlen($str);	
					   
						$результат = $this->sendMessage($chat_id, $str, null, null, null, true);
					   
						if (!$результат && $kol > 2) {
					   
							$str = substr($str, 1, -1);	
						   
							$kol = strlen($str);	
						   
						}
					   
					}

				}			
				
				$str = substr($text, $kol);		
	
				$this->output($str, $max_kol_s);
				
			}		
			
		}	
	
		return true;
		
	}
	
	
	/*
	** функция проверки БАН листа
	**
	** @param str $таблица
	** @param str $имя_юзера
	**
	** @return boolean
	*/
	public function _проверка_БАНа() { 

		global $chat_id, $mysqli;
		
		$query = "SELECT * FROM info_users WHERE status='ban' AND id_client='{$chat_id}'";
		if ($result = $mysqli->query($query)) {	
			if ($result->num_rows > 0) {
				
				$tehPodderjka = "[тех.поддержку](https://t.me/Prizm_market_supportbot?start=) \xF0\x9F\x91\x88";

				$this->sendMessage($chat_id, "Ваш аккаунт попал в БАН!\n\nДля того чтобы узнать причину обратитесь в {$tehPodderjka}", markdown);	
				
				exit('ok');
			}			
		}else throw new Exception("Не смог проверить БАН лист (_проверка_БАНа)");		
	
		return false;
		
	}
	
	
	
}

?>
