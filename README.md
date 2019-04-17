<center><img src="public/img/flame_logo.png" width=100></center>
<center><h1>Flame</h1></center>


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