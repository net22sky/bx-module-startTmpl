<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCstmProps
 * пользовательские поля
 * элемент массива ["объект для добавления поля", "UF_код", "тип", "название"]
 */
$arCstmProps = [
    // кастомные поля пользователя
    ['USER', 'UF_FIO_DIR', 'string', 'ФИО Директора'],
    ['USER', 'UF_UR_ADR', 'string', 'Юридический адрес'],
];

/**
 * @var array $arTables
 * ORM таблицы
 * Элемент массива - "имя класса таблицы", сама таблица должна быть описана в /lib/tables/
 */
$arTables = [
    'TicketCategory',
    'TicketStatus',
    'TicketRating',
    'TicketCategory',
    'TicketMsg',
    'Ticket',
];

/**
 * @var array $arIndexes
 * индексы ORM таблиц
 * элемент массива - ["имя класса таблицы", "имя поля таблицы"]
 */
$arIndexes = [
    ['Ticket', 'client_id'],
    ['Ticket', 'manager_id'],
    ['Ticket', 'ticket_status_id'],
    ['Ticket', 'ticket_rating_id'],
    ['Ticket', 'ticket_category_id'],
    ['TicketMsg', 'ticket_id'],
    ['TicketMsg', 'sender_id'],
];

/**
 * @var array $arIblockTypes
 * типы инфоблоков
 */
$arIblockTypes = [
    'FORMS' => [
        'SECTIONS' => 'N',
        'SORT' => '100',
        'LANG' => [
            'ru' => [
                'NAME'=>'Формы модуля обмена',
//                'SECTION_NAME'=>'Sections',
                'ELEMENT_NAME'=>'Формы'
            ]
        ]
    ],
];

/**
 * @var array $arIblocks
 * инфоблоки
 */
$arIblocks = [
    'REGREQUESTS' => [
        'TYPE' => 'FORMS',
        'NAME' => 'Запросы на регистрацию',

        'PROPS' => [
            ['NAME' => 'ФИО', 'CODE' => 'FIO'],
            ['NAME' => 'Телефон', 'CODE' => 'PHONE'],
        ]
    ],
];

/**
 * @var array $arEmailTypes
 * почтовые события
 */
$arEmailTypes = [
    [
        "EVENT_NAME"  => "LOCALEXCH1C_REGREQUEST",
        "NAME"        => "Запрос на регистрацию",
        "LID"         => "ru",
        "SORT"        => 100,
        "DESCRIPTION" => "
            #FIO# - ФИО
            #PHONE# - Телефон
        "
    ]
];

/**
 * @var array $arEmailTmpls
 * почтовые шаблоны
 */
$arEmailTmpls = [
    [
        "ACTIVE" => "Y",
        "EVENT_NAME" => "LOCALEXCH1C_REGREQUEST",
        "EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
        "EMAIL_TO" => "#DEFAULT_EMAIL_FROM#",
        "BCC" => "",
        "SUBJECT" => "Запрос на регистрацию с сайта #SITE_NAME#",
        "BODY_TYPE" => "text",
        "MESSAGE" => "
ФИО: #FIO#
Телефон: #PHONE#
",
    ],
];

$arConfig = [
    'name' => 'LOCAL.EXCH1C',
    'ns' => 'Local\Exch1c',
    'nsTables' => 'Local\Exch1c\Tables',
    'prefix' => 'local_exch1c',
    'arCstmProps' => $arCstmProps,
    'arTables' => $arTables,
    'arIndexes' => $arIndexes,
    'arIblockTypes' => $arIblockTypes,
    'arIblocks' => $arIblocks,
    'arEmailTypes' => $arEmailTypes,
    'arEmailTmpls' => $arEmailTmpls,
];

return $arConfig;
