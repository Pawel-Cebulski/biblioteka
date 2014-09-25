<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy, używanej lokalizacji WordPressa
 * i ABSPATH. Więćej informacji znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'biblioteka');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'root');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', '');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']pXbjC<( X!y_waE~##*|-K,%1](hG*^e4VB>VdFnR<zKRV6d3TTbpSc!LEJ0Ry=');
define('SECURE_AUTH_KEY',  'O<g/[-)^J11(s}G]Z`w*+={G0GNs$p&R_>-@Ut$I<S`JN%l<%!D+BsQ^&[|]d}Bg');
define('LOGGED_IN_KEY',    'OMk181_%Iq7(@EN10&bUi|%4Q1pV%9PSnO,i})[Va%z;p4,c5CHe-@t8?~Sk]>jW');
define('NONCE_KEY',        'Rdtsf^3:6;:!va{o=[jN<pQ`4yjT>#m|&weVP-J->m$swjV3`!|euTl)h+$+iXD{');
define('AUTH_SALT',        'W@A1N)bYvoJ[lP3/)],b61uGwiW6t,*|s+zT8DaR4_:)/gi*#5C7zJ#R1]&E-OJ-');
define('SECURE_AUTH_SALT', 'yF<3 QG8-:&q,&o2JAWg~{9@?SjZTX%mX{EjfOgYc7?&!4y!VVbYMhh[:~6)0DP6');
define('LOGGED_IN_SALT',   '?}-Xx[#nUu}<>/s3R/|+AFJd+j*U-]?pb=<;|*r8`M|-|sD}Z.E0!-#/>[s%~-r3');
define('NONCE_SALT',       '1h&~mBUFsYpJVJGE>z;f=_Z4b*s-- Z+5GT>+2X[[eq{&ku PHNbg:KJPHaKE5Gt');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
