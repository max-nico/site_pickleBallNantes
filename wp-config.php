<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'maximemaerpickle' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'maximemaerpickle' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'MMNSpickle44' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'maximemaerpickle.mysql.db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_M8&YBTVBjEi]z-7]-Jxb]oQ$i/a37qUnwb)v6XalBIbb.Z24y[c^HqAIc%n<;Kl' );
define( 'SECURE_AUTH_KEY',  'OCqU{}.v.BA3se#js)U{0V3u?w]_4i,Gy~hAg}ET8 4D^,^j4@ @U*.<*@8uJS}s' );
define( 'LOGGED_IN_KEY',    '=3GL|+k_a758cNdQ*=yi*Is!f,oa,Ii*/&P8BP+u!C9!aW8q.l28,$*Og~DkDOE*' );
define( 'NONCE_KEY',        '~:e&f+=r45Z98EszaVMw53 >>rhTzzev>s2)HFQJc%>l+lCIe5O:i`=h4DucT~?|' );
define( 'AUTH_SALT',        'ScM/XzO.~]&0Ii3|Flt0O1FT6f3G/QJBPt% >h+Q$GTgq0WutxA,3K!CnSLyS{tP' );
define( 'SECURE_AUTH_SALT', 'n9!# lIBw.Tuuc?v`zoMP)dyNZ1Z|~nXP_$kzr:et61m#/-pMugAHMTKbK0I*EwD' );
define( 'LOGGED_IN_SALT',   'O9^}q]/NNBaSk]j%s(6D.]@p9wE1?GBXx[WfURX|+Z/^W;dphVv=JaNsNa6EN=`W' );
define( 'NONCE_SALT',       '#O#-%%^kCqXuT4JL]A59]W4vZF-)h:(Y[dNoi1BwLR1?B0`fA#qZ<gj0dX N`%yM' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'p4_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
