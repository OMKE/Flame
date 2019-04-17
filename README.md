<img align='center' src="public/img/flame_logo.png" width=100>
<h1 align=center>Flame</h1>


## About Flame
Flame is a MVC Micro-framework written in PHP.



## Configuration
#### Apache - .htaccess file in public folder 
`/public/.htaccess`
```
<IfModule mod_rewrite.c>
    Options -MultiViews
    RewriteEngine On
    RewriteBase /Flame-master/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```



#### nginx - server block configuration file
```
location / {
        try_files       $uri
                        $uri/
                        /index.php?url=$uri;
    }
```