INSTALLATION
===========
1) Create database in you DBMS before installation
2) Open /include/config.php
3) Edit all configuration for you DB connect
4) Change all file path
5) Insert file "install.sql" to you database
6) If you use LINUX/UNIX system change privilege to 775 for next directories and entered files
-tmp
-cache
-json
-templates_c
7) Enter to home page and singin, login/password "admin"/"admin"


	   
_______________________
WARNING ! 
If you have problem with encoding
open file httpd.conf in Apache2 directory
and change  like this "AddDefaultCharset utf-8"

If you use another HTTP server similarly change you encoding to UTF-8
_______________________