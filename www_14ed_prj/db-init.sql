set global max_allowed_packet=536870912;

CREATE USER IF NOT EXISTS '62198_user'@'localhost' IDENTIFIED BY '62198_password';
GRANT ALL PRIVILEGES ON * . * TO '62198_user'@'localhost';

CREATE DATABASE IF NOT EXISTS www_14ed_62198_ascii_sciinema;
CREATE TABLE IF NOT EXISTS VIDEOS(
  NAME VARCHAR(128) NOT NULL,
  DURATION VARCHAR(64),
  CONTENT LONGBLOB,
  THUMBNAIL LONGBLOB,
  PRIMARY KEY(NAME)
);

INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Nyan Cat', 'SHORT', load_file('C:\\Program Files\\xampp\\mysql\\data\\nyan.mp4'), load_file('C:\\Program Files\\xampp\\mysql\\data\\nyan.png'));
INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Johnny Bravo', 'LONG', load_file('C:\\Program Files\\xampp\\mysql\\data\\bravo.mp4'), load_file('C:\\Program Files\\xampp\\mysql\\data\\bravo.png'));
INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Mr. Bean', 'LONG', load_file('C:\\Program Files\\xampp\\mysql\\data\\mrbean.mp4'), load_file('C:\\Program Files\\xampp\\mysql\\data\\mrbean.png'));
INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Stickman', 'LONG', load_file('C:\\Program Files\\xampp\\mysql\\data\\stickman.mp4'), load_file('C:\\Program Files\\xampp\\mysql\\data\\stickman.png'));
INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Animation', 'SHORT', load_file('C:\\Program Files\\xampp\\mysql\\data\\animation.mp4'), load_file('C:\\Program Files\\xampp\\mysql\\data\\animation.png'));
INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Frozen', 'LONG', load_file('C:\\Program Files\\xampp\\mysql\\data\\frozen.mp4'), load_file('C:\\Program Files\\xampp\\mysql\\data\\frozen.png'));
