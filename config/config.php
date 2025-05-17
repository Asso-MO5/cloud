<?php
$CONFIG = array (
  'instanceid' => 'oc' . bin2hex(random_bytes(8)),
  'passwordsalt' => bin2hex(random_bytes(32)),
  'secret' => bin2hex(random_bytes(32)),
  'trusted_domains' => 
  array (
    0 => 'cloud.mo5.com',
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '31.0.5.1',
  'overwrite.cli.url' => 'https://cloud.mo5.com',
  'dbname' => 'nextcloud',
  'dbhost' => 'db',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => 'example_password',
  'installed' => true,
  'maintenance' => false,
  'default_phone_region' => 'FR',
  'maintenance_window_start' => 1,
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'memcache.distributed' => '\\OC\\Memcache\\Redis',
  'redis' => array(
    'host' => 'redis',
    'port' => 6379,
  ),
  'trusted_proxies' => array('caddy'),
  'forwarded_for_headers' => array('HTTP_X_FORWARDED_FOR'),
  'overwriteprotocol' => 'https',
  'overwritehost' => 'cloud.mo5.com',
  'overwritewebroot' => '',
  'overwritecondaddr' => '',
  'htaccess.RewriteBase' => '/',
  'simpleSignUpLink.shown' => false,
  'knowledgebaseenabled' => false,
  'enable_previews' => true,
  'enabledPreviewProviders' => array(
    'OC\\Preview\\PNG',
    'OC\\Preview\\JPEG',
    'OC\\Preview\\GIF',
    'OC\\Preview\\BMP',
    'OC\\Preview\\XBitmap',
    'OC\\Preview\\MP3',
    'OC\\Preview\\TXT',
    'OC\\Preview\\MarkDown',
    'OC\\Preview\\OpenDocument',
    'OC\\Preview\\PDF',
    'OC\\Preview\\Movie',
    'OC\\Preview\\Krita',
  ),
  'talk' => array(
    'enabled' => true,
    'signaling' => array(
      'servers' => array(
        array(
          'url' => 'https://cloud.mo5.com',
          'verify' => true
        )
      ),
      'secret' => bin2hex(random_bytes(32))
    )
  ),
  'mail_smtpmode' => 'smtp',
  'mail_smtphost' => 'smtp.gmail.com',
  'mail_smtpport' => 587,
  'mail_smtptimeout' => 10,
  'mail_smtpsecure' => 'tls',
  'mail_smtpauth' => 1,
  'mail_smtpauthtype' => 'LOGIN',
  'mail_from_address' => 'votre_email@gmail.com',
  'mail_domain' => 'gmail.com',
  'mail_smtpname' => 'votre_email@gmail.com',
  'mail_smtppassword' => 'votre_mot_de_passe_app',
); 