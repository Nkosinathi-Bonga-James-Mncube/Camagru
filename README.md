# Camagru

# What is Camagru?

- Re-create a simple web-based instagram clone.

# Technologies used:
 - Html
 - Mysql
 - Javascript
 - PHP

 # The requirements :
  - Create Registration page,Update detail page,and Forget password page(required to create validation 
functions on input as well as create function to strip html tags and prevent sql injection)
  
  - Passwords should be hashed
  
  - Be able to upload images with a webcam or from directory(Required to create validation functions to 
check format and size restrictions)
  
  - Be able to place stickers after images are uploaded 
  
  - Pagination for public gallery of images should be viewable(Only registered users are able to like and 
comment on pictures)

------
# Table of contents
 - [How it works](#how-it-works)
 - [Installation](#installation)
 - [How to run the program](#how-to-run-the-program)
 - [Screenshots](#screenshots)
 - [Troubleshoot](#troubleshoot)
------
# How it works
# Installation
### For Ubuntu

1. Install XAMPP : https://www.apachefriends.org/download.html
2. Navigate to location `/opt/lampp/`
3. Change the properties of `/htdocs`
```
sudo chmod 777 htdocs
```
4. Clone repo inside `/htdocs`
5. Navigate to `Camagru/SETA_Camagru/config/database.php` to check MYSQL database details are correct.(Make sure username and password match XAMPP details)
```php
<?php
$DB_DSN = 'mysql:host=localhost';
$DB_USER ='root';
$DB_PASSWORD = '';
$DB_NAME = "camagru_database";
?>
```
6. Install sendemail
```
  sudo apt-get install sendmail
```


7. Lauch XAMPP
- for 32bits system
```
sudo /opt/lampp/manager-linux.run
```
- for 64bit system
```
  sudo /opt/lampp/manager-linux-x64.run
```
8. Open the 'Manage Servers' and start both 'MYSQL Database' and 'Apache Webserver' servers. 
> N.B for the Apache webserver in 'Configure' make sure you on 8080 port.

<img width=75% height=75% src=https://user-images.githubusercontent.com/50704452/105494995-42438a00-5cc4-11eb-911c-26463165bdb4.png>

# How to run the program
1. To setup database and tables enter into the browser : `http://127.0.0.1:8080/Camagru/SETA_Camagru/config/setup.php`, you should see the following:


![setup](https://user-images.githubusercontent.com/50704452/105498250-99e3f480-5cc8-11eb-9148-fd2594585e85.png)

2. In the browser enter `http://127.0.0.1:8080/Camagru/SETA_Camagru`. You should see the following:

![index](https://user-images.githubusercontent.com/50704452/105496313-fabdfd80-5cc5-11eb-9782-a48def4a7284.png)

3. To view changes in the database enter in the browser : `http://127.0.0.1:8080/phpmyadmin/` , select `camagru_database`

# Screenshots
<details>
<summary>index.php (Click here)</summary>
<img src=https://user-images.githubusercontent.com/50704452/105496313-fabdfd80-5cc5-11eb-9782-a48def4a7284.png>
</details>

# Troubleshoot
  


  
