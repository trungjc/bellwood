<?php
# Database Configuration
define( 'DB_NAME', 'wp_bellwood' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', 'localhost' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'eR5f.MXS*c?.-$vrW7}LI8Hl+2$-HB}`j EAuVS_TkdbC!Yp&gm6}X50u5V/+6t;');
define('SECURE_AUTH_KEY',  'ykl=A3[G.]~&F@H;g:2Re%C.K+F`<_XW]:k%ktT>n|#tyKmpG,S`l~7A9O%1:Lia');
define('LOGGED_IN_KEY',    '7+u5DIQ.]<Kn%</juQyDvy}xw<1ejbXjpv.k8Wb4.l Rl$zDHxT.py<K1mNX^(QY');
define('NONCE_KEY',        'd}8:5V$=MtYpNssev[95aC0k$Wy9o?1M%?`n[y:I3_9+f*:G$HN,&]1:]Q$Q|.f>');
define('AUTH_SALT',        'tAGrr0O6Y||I4$i.=DdoQq@8m-N|>c*$04`/d@#+Y]_^gDa3K%vu66y,VKf *r},');
define('SECURE_AUTH_SALT', 'XkR16+3N75Q,3u+..hgM &,YDk]pQu:Ovu1cvJC76;N#8w8gx[;|K(2St!1XmH[7');
define('LOGGED_IN_SALT',   'ZOuoutl0qEz/hwezyk&,&8(0)1>Jr&igNq-Gfh2pdsDg BF^Ta+zfuCFskdx{C4m');
define('NONCE_SALT',       'Qq e*XUE3-K:t!k#U|qE |Q6P%5y0Hd9tF|^@L.V{q3-!4QvW07j vunx-=R?4,V');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'bellwood' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '78b0dd3b087fc3ea9fe530b6aec2546b377c7ce3' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '1551' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'bellwood.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-1551', );

$wpe_special_ips=array ( 0 => '66.228.39.18', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );

//define( 'WPE_LBMASTER_IP', '66.228.39.18' );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
