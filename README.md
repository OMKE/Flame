# Flame
Flame is a MVC Micro-framework written in PHP.
<p align=center>todos: 
<br>write documentation
<br>build docker image

</p>






## Configuration
### Apache - .htaccess file in public folder 
/public/.htaccess
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



### nginx - server block configuration file
```
location / {
        try_files       $uri
                        $uri/
                        /index.php?url=$uri;
    }
```