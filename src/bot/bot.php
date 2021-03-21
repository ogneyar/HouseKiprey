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
    break;

    case "/eko":
    case "ЭКО":
        _ЭКЭТ();
    break;

    case "/eket":
    case "ЭКЭТ":
        _ЭКЭТ();
    break;
    
    case $main_buttons[0]:
        _заказать_продукты();
    break;

    case $main_buttons[1]:
        _заказать_продукты();
    break;

    case $main_buttons[2]:
        _заказать_продукты();
    break;

    case $main_buttons[3]:
        _заказать_продукты();
    break;

    case $main_buttons[4]:
        _заказать_продукты();
    break;

    case $main_buttons[5]:
        _заказать_продукты();
    break;

    case $main_buttons[6]:
        _заказать_продукты();
    break;

    case $main_buttons[7]:
        _заказать_продукты();
    break;

    case $main_buttons[8]:
        _заказать_продукты();
    break;


}

?>