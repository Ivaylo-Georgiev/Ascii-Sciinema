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
