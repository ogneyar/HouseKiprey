<?php

// подключение всех основных переменных
include_once 'myBotApi/Variables.php';

// подключение всех основных функций
include_once 'function.php';


switch ($text) {
    case "/start":
    case "start":
    case "/s":
    case "s":
    case "S":
    case "c":
    case "C":
    case "с": // русская "с" маленькая
    case "С": // русская "С" большая
    case "Старт":
    case "старт":
        if ($chat_type=='private') _старт();
        break;

    case "/help":
    case "помощь":
    case "Помощь":
        if ($chat_type=='private') _help();
        _help();
        break;

}

?>