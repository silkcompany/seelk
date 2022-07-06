<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'silk' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'silk_admin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'vRGyJhNLLernY4Gs' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'l9))Tu_bwq599t*~g pCIk`F/t11;{$]lxr0`H*g$OM~-taee]<XG>=.a*=&Lnop' );
define( 'SECURE_AUTH_KEY',  '2oM*B.LvILEeHqdeG_y}8j`-PmR}B GF1^$x+dXvj,v%F?1`6D8;o?V*vKN52/30' );
define( 'LOGGED_IN_KEY',    '4@BM(o3En`_>fN60?0lSg]$Qn;:bI+%*@Ljlel`VYuzIP|s6DzcyN;nSF.J{>&C0' );
define( 'NONCE_KEY',        'Oa k@d(+jJZ=;T +,j)<Z*fD W?BtN}hoAepopHf(n18l i!<WL4t,`w+oh,D%.*' );
define( 'AUTH_SALT',        'T*Vsjs:aNQT#|o0z}O~&C4Pz.7VAyV<@fRgR;Z*?j15.?&|W #$w7dGZ`S~)s gR' );
define( 'SECURE_AUTH_SALT', ';uLF1qQ7]qKK}i]8*Q2 w{{nj^t:~@yx+(lhS mycR|Z*p/$T4XTXcHm5o?&5H6N' );
define( 'LOGGED_IN_SALT',   'JxmUecAg >L;PP5[nbI7(_mx(w FR(iN`PbcXP3D~4ANpG79]| z50HyWx%(_rAX' );
define( 'NONCE_SALT',       'L=-!,jQMTWU:Dso7r]Vu(<9ZNL|j!jyW~H>!K/aloGdxq!L2oBSv~N[s}pGMye:c' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
