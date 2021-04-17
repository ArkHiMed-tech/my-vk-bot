<?php
//версия библиотеки - 2.11.1
require_once('vendor/autoload.php'); //подключаем библиотеку
use DigitalStar\vk_api\vk_api; //используем только основной класс

const VK_TOKEN = ''; //токен из группы
const CONFIRM_STR = ''; //строка подтверждения сервера
const VERSION = '5.101';

$vk = vk_api::create(VK_KEY, VERSION)->setConfirm(CONFIRM_STR);
$vk->debug(); //включение дебаг режима. Если в коде ошибка - ее можно посмотреть в неудавшихся запросах
$vk->initVars($id, $message, $payload); //инициализация переменных
$info_btn = $vk->buttonText('Информация', 'blue', ['command' => 'info']); //создание кнопки
if ($payload) { //если пришло нажатие кнопки
    if($payload['command'] == 'info') //если это кнопка info
        $vk->reply('Тебя зовут %a_full%'); //отвечает пользователю или в беседу
} else //если пришло обычное сообщение
    $vk->sendButton($id, 'Видишь кнопку? Нажми на нее!', [[$info_btn]]); //отправляем клавиатуру с сообщением
