# 🍿  Ascii_Sciinema

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

## Features

### Configurability
The configurations for the player can be found under `www_14ed_prj/js/display-properties.json`. There, the following properties can be configured:
* `scale`
* `fontSize`
* `timeBetweenFramesInMilliseconds` 
* `color`

In order to convert ASCII videos faster, consider scaling. Recommended values for the `scale` property are 0.1 for long colored videos and 0.2 for short colored videos. 0.3-0.4 is good for both long and short monochromatic videos.  

The recommended value for the `timeBetweenFramesInMilliseconds` is 50. If you consider playing higher quality videos (with less scaling), increase that value in order to prevent lags and glitches.  

The `fontSize` property can vary depending on your screen size. Of course, you can always zoom in/out to get a more detailed/general view of your ASCII video.  

### Monochromatic and Colored Videos
Colored videos can be enabled by setting the `color` property to `true` in the configuration file.  

<img alt="Monochrome" src="https://github.com/Ivaylo-Georgiev/Ascii_Sciinema/blob/master/monochrome.gif" width="350"><img alt="Colored" src="https://github.com/Ivaylo-Georgiev/Ascii_Sciinema/blob/master/colored.gif" width="329">

>⚠️ **Important:** Enable colored videos judiciously. Coloring every ASCII symbol requires significant computing and storage overhead. It is preferred to only enable it for short videos.

## Caching 
Ascii Sciinema supports caching. Recently played ASCII videos (with certain configurations) are stored locally, so they don't have to be converted on the fly every time you watch them. Cached videos (JSON files) can be found in **www_14ed_prj/cache**

> _Made with 🔥 for the Web development Course at FMI 2020_
