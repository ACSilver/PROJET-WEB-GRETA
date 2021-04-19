<?php

$root = dirname($_SERVER['PHP_SELF']);
if($root!='/')$root.='/';

$data = "
RewriteEngine On

RewriteBase ".$root."

#retire toutes les extensions (dont .php) :
RewriteCond %{REQUEST_URI} /(.*)/$
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ /%1 [L,R]

#retire le dernier slash :
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule !.*\.php$ %{REQUEST_FILENAME}.php [QSA,L]

#redirige TOUTES les requettes vers $uri :
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)$ index.php?uri=$1 [QSA,L]
";

file_put_contents( __DIR__ . "/.htaccess", $data );

?>