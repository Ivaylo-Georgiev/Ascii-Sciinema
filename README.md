![Ascii Sciinema](https://github.com/Ivaylo-Georgiev/Ascii_Sciinema/blob/master/www_14ed_prj/resources/fav.png)

# Ascii_Sciinema

> Online ASCII video player

![Home Page](https://github.com/Ivaylo-Georgiev/Ascii_Sciinema/blob/master/home.gif)

## Installation

### Clone
Clone this repo to your local machine using `https://github.com/Ivaylo-Georgiev/Ascii_Sciinema.git`  

### Setup

 1. Download and install [FFmpeg](https://www.ffmpeg.org/download.html#build-windows)
 2. Download and install [XAMPP](https://www.apachefriends.org/download.html)
 3. Launch Apache and MySQL XAMPP modules
 4. Create a new folder **Ascii_Sciinema**  under **xampp/htdocs**
 5. Copy/Paste **www_14ed_prj**  into the newly created  folder
 6. Launch **phpmyadmin** and navigate to the SQL tab
 7. Execute SQL script from `db-init.sql`
 8. Navigate to **xampp/mysql/bin/my.ini** and change `max_allowed_packet` under `[mysqld]` to 536870912
 9. Open `www_14ed_prj/php/fill-db.php` in a browser to insert resources into the database
 10. Navigate to the home page

Example URL* :  http://localhost:8080/Ascii_Sciinema/www_14ed_prj/php/index.php

> **Note:** localhost and 8080 may vary depending on the server configuration
