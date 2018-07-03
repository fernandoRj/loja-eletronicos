<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'fakee');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'kFu*x{nDea7B)S.YAgKXts&<%eU`#S|WxmjrTco6DUN_s O/L9jvZ5{9[16`kV2z');
define('SECURE_AUTH_KEY',  'AX^-up*%l2a|zgI (XPn_l%g|K{E8<z++Kt4=.m/)@V*&t( |^Bro-giu`]jR{/S');
define('LOGGED_IN_KEY',    'WYfMOJF>_9:N5D6h=rqZ*xyTKs|5?mp(:0|Av%3Xv}BzTL7o{+s?]9w?!t.S~Z<H');
define('NONCE_KEY',        '=>q@Zfj()+kNn[aU _aF{%(UVb+P3Qv!V.SYkkkk(p/{ d^.^1)8b(jYOjwL$*(X');
define('AUTH_SALT',        '+~#`I~w9qzi2|r(l81zFTYn6Dy?zN}ed,!}QJFmcB|nf*uO)Jz0,C@yY4;gt3Aut');
define('SECURE_AUTH_SALT', '5d2#`ADCwg&&V9`<P)?>qp&>TR_dZ/UmV^<)?Mp2g5~q?{%%_nHZ;;X=bUfglong');
define('LOGGED_IN_SALT',   'J$,>tOfflWXl9kxj<[{MDAK.?~O>LrNX9rw;I*1W?<fsBu)&OpGpf5:CV|]XTB1I');
define('NONCE_SALT',       'XWaPQzj67U).aw>G7~B_9/*xsBlitgr|o*mEl]Vrzr/1q)(Pow^PBb!P>F`U5wv9');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */


/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
