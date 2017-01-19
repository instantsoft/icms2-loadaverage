<?php
/******************************************************************************/
//                                                                            //
//                             InstantMedia 2017                              //
//	 		     https://instantvideo.ru/, support@instantvideo.ru            //
//                               written by Fuze                              //
//                     https://instantvideo.ru/copyright.html                 //
//                                                                            //
/******************************************************************************/
define('LANG_LOADAVERAGE_CONTROLLER', 'Защита от перегрузок');
define('LANG_LOADAVERAGE_PEAKS', 'Перегрузки');
define('LANG_LA_AUTO_PATH_CLICK', 'Кликните, чтобы скопировать в поле');
define('LANG_LA_AUTO_PATH', 'Автоматически определенное количество ядер: ');
define('LANG_LA_NO_AUTO_PATH', 'Система автоматически не определила количество ядер процессора');
define('LANG_LA_CURRENT', 'Текущая нагрузка');
define('LANG_LA_CURRENT1', 'Минутная');
define('LANG_LA_CURRENT5', 'Пятиминутная');
define('LANG_LA_CURRENT15', 'За 15 минут');
define('LANG_LA_OVERLOAD', 'перегрузка');
define('LANG_LA_TPL_TITLE', 'Извините, сайт временно недоступен');
define('LANG_LA_TPL_HINT', 'Пожалуйста, зайдите позже. Мы работаем над исправлением ситуации.');
define('LANG_LA_CLEAR_SEND_EMAIL', 'Сбросить блокировку отправки email');
define('LANG_LA_CLEAR_SUCCESS', 'Блокировка сброшена, теперь будут вновь приходить на email оповещения о превышении нагрузки');
define('LANG_LA_MAX_LOAD', 'Порог нагрузки наблюдения');
define('LANG_LA_MAX_LOAD_HINT', 'Можно указывать больше 100%, но это уже будет оверлоад');
define('LANG_LA_CPU_COUNT', 'Количество ядер процессора');
define('LANG_LA_CPU_COUNT_HINT', 'Если автоматически неопределено, необходимо указать вручную, иначе будут неверные расчеты');
define('LANG_LA_SENSOR', 'Датчик для отслеживания');
define('LANG_LA_SENSOR1', 'Средняя нагрузка за 1 минуту');
define('LANG_LA_SENSOR5', 'Средняя нагрузка за 5 минут');
define('LANG_LA_SENSOR15', 'Средняя нагрузка за 15 минут');
define('LANG_LA_ACTION', 'Действия при превышении порога');
define('LANG_LA_ACTION0', 'Блокировать сайт, показывая ошибку');
define('LANG_LA_ACTION1', 'Уведомлять по email');
define('LANG_LA_EMAIL', 'Email для уведомлений');
define('LANG_LA_EMAIL_HINT', 'Можно указать несколько, через запятую');
