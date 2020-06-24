# 📺  Ascii Sciinema

![Home Page](https://github.com/Ivaylo-Georgiev/Ascii_Sciinema/blob/master/home.gif)

## ASCII Art Overview 

There have been some recent discussions assessing the history of ASCII art — along with some thoughts about its future.  

ASCII art is basically images created only through text characters, specifically the 128 characters specified in the American Standard Code for Information Interchange, a character encoding standard for electronic communication.  

People have been playing around with the spacing of their text since _Ancient Greece_, a phenomenon which is sometimes called “concrete poetry” (or “shape poetry”).  
The Bulgarian poet [Peyo Yavorov](https://en.wikipedia.org/wiki/Peyo_Yavorov) constructs his poem ["Две хубави очи"](https://chitanka.info/text/7085-dve-hubavi-ochi) as an ideogram of a flying bird, hence unfolding the idea of the flight as the metaphysical way to achieve cosmic harmony:

>
    Две хубави очи. Душата на дете
            в две хубави очи; — музика — лъчи
            Не искат и не обещават те…
            Душата ми се моли,
            дете,
            душата ми се моли!
    Страсти и неволи
            ще хвърлят утре върху тях
    булото на срам и грях.
    Булото на срам и грях —
            не ще го хвърлят върху тях
    страсти и неволи.
            Душата ми се моли,
            дете,
            душата ми се моли…
            Не искат и не обещават те! —
            Две хубави очи. Музика, лъчи
            в две хубави очи. Душата на дете…

ASCII art can be found in various other places nowadays. Slack has implemented a /shrug command which will add some appropriate ASCII art to the end of your message.
<pre>¯\_(ツ)_/¯</pre>

Furthermore there's still ASCII art archives on Pinterest and a forum on Reddit. One of the many proofs that ASCII art still has future is [the ASCII text rendition of the entire movie “Star Wars”](http://www.asciimation.co.nz/) — which has apparently been an 18-year-project.  

Find more about the surprisingly rich history of ASCII art [here](https://thenewstack.io/surprisingly-rich-history-ascii-art/).

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

**📓 Note:** localhost and 8080 may vary depending on the server configuration

## Features

### ASCII Video Conversion
The idea behind the conversion algorithm from images to ASCII art is the following:
 * Split the image into groups of pixels  
 * Extract the RGB color of each pixel  
 * Represent each color as an integer. RGB supports 256 * 256 * 256 = 16,777,216 different colors  
 * The total number of supported colors is split into color groups, since the ASCII table contains 128 symbols and is impossible to map each color to a distinct symbol  
 * Map every color group to a corresponding symbol from the ASCII table
 
In order to transform a regular video to an ASCII video, the algorithm must be applied on each frame from the original video. After every single frame is converted, the video is rendered by displaying the ASCII images sequentially.   

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

⚠️ **Important:** Enable colored videos judiciously. Coloring every ASCII symbol requires significant computing and storage overhead. It is preferred to only enable it for short videos.

### Caching 
Ascii Sciinema supports caching. Recently played ASCII videos (with certain configurations) are stored locally, so they don't have to be converted on the fly every time you watch them. Cached videos (JSON files) can be found in **www_14ed_prj/cache**

> _Made with 🔥 for the Web Development Course at FMI 2020_
