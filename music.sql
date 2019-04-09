--
-- Artist table
--

DROP TABLE IF EXISTS Artist;
CREATE TABLE IF NOT EXISTS Artist (
  stage_name varchar(50) NOT NULL,
  genre varchar(20) NOT NULL,
  PRIMARY KEY (stage_name),
);

--
-- Member table
--

DROP TABLE IF EXISTS Member;
CREATE TABLE IF NOT EXISTS Member (
  stage_name varchar(50) NOT NULL,
  member_name varchar(50) NOT NULL,
  PRIMARY KEY (stage_name, member_name)
  KEY stage_name (stage_name)
);

--
-- Album table
--

DROP TABLE IF EXISTS Album;
CREATE TABLE IF NOT EXISTS Album (
  album_id int NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  genre varchar(20) NOT NULL,
  year year NOT NULL,
  PRIMARY KEY (album_id),
);

--
-- Song table
--

DROP TABLE IF EXISTS Song;
CREATE TABLE IF NOT EXISTS Song (
  song_id int NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  genre varchar(20) NOT NULL,
  album_id int NOT NULL,
  PRIMARY KEY (song_id),
  KEY album_id (album_id)
);

--
-- Artist_has_album
--

DROP TABLE IF EXISTS Artist_has_album;
CREATE TABLE IF NOT EXISTS Artist_has_album (
  stage_name varchar(50) NOT NULL,
  album_id int NOT NULL,
  PRIMARY KEY (stage_name, album_id),
  KEY stage_name (stage_name),
  KEY album_id (album_id)
);

--
-- Artist_has_song
--

DROP TABLE IF EXISTS Artist_has_song;
CREATE TABLE IF NOT EXISTS Artist_has_song (
  stage_name varchar(50) NOT NULL,
  song_id int NOT NULL,
  PRIMARY KEY (stage_name, song_id),
  KEY stage_name (stage_name),
  KEY song_id (song_id)
);

--
-- User table
--

DROP TABLE IF EXISTS User;
CREATE TABLE IF NOT EXISTS User (
  username varchar(20) NOT NULL,
  password varchar(20) NOT NULL,
  email varchar(40) NOT NULL,
  PRIMARY KEY (username)
);

--
-- Favorite_artists table
--

DROP TABLE IF EXISTS Favorite_artists;
CREATE TABLE IF NOT EXISTS Favorite_artists (
  stage_name varchar(50) NOT NULL,
  username varchar(20) NOT NULL,
  PRIMARY KEY (stage_name, username),
  KEY stage_name (stage_name),
  KEY username (username)
);

--
-- Favorite_songs table
--

DROP TABLE IF EXISTS Favorite_songs;
CREATE TABLE IF NOT EXISTS Favorite_songs (
  song_id int NOT NULL,
  username varchar(20) NOT NULL,
  PRIMARY KEY (song_id, username),
  KEY song_id (song_id),
  KEY username (username)
);

--
-- Playlist table
--

DROP TABLE IF EXISTS Playlist;
CREATE TABLE IF NOT EXISTS Playlist (
  playlist_id int NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  username varchar(20) NOT NULL,
  PRIMARY KEY (playlist_id),
  KEY username (username)
);

--
-- Playlist_contains_song
--

DROP TABLE IF EXISTS Playlist_contains_song;
CREATE TABLE IF NOT EXISTS Playlist_contains_song (
  playlist_id int NOT NULL,
  song_id int NOT NULL,
  PRIMARY KEY (playlist_id, song_id),
  KEY playlist_id (playlist_id),
  KEY song_id (song_id)
);
--
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('11111', 'New York', 'United States', '2003-08-05 00:00:00', '2003-09-11 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('21664', 'Naples', 'Italy', '2002-07-05 00:00:00', '2002-07-08 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('21664', 'Palermo', 'Italy', '2002-07-08 00:00:00', '2002-07-12 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('23007', 'Venice', 'Italy', '2002-08-14 00:00:00', '2002-08-24 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('24288', 'Palermo', 'Italy', '2003-03-28 00:00:00', '2003-04-04 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('26964', 'New York', 'United States', '2003-07-01 00:00:00', '2003-07-11 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('27045', 'Caracas', 'Venezuela', '2003-07-15 00:00:00', '2003-07-20 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('27045', 'Maracaibo', 'Venezuela', '2003-07-20 00:00:00', '2003-07-22 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('28532', 'Caracas', 'Venezuela', '2003-08-17 00:00:00', '2003-08-20 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('28532', 'La Plata', 'Venezuela', '2003-08-20 00:00:00', '2003-08-24 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('28532', 'Maracaibo', 'Venezuela', '2003-08-17 00:00:00', '2003-08-24 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('29191', 'New Orleans', 'United States', '2003-12-20 00:00:00', '2003-12-24 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('29191', 'Tacoma', 'United States', '2003-12-24 00:00:00', '2003-12-27 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('29890', 'Halifax', 'Canada', '5004-01-15 00:00:00', '2004-01-22 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('35218', 'Vancouver', 'Canada', '2004-05-15 00:00:00', '2004-05-29 00:00:00');
-- INSERT INTO VISIT (CRUISENUM, PORTNAME, COUNTRY, ARRDATE, DEPDATE) VALUES('37894', 'Miami', 'United States', '2004-10-10 00:00:00', '2004-10-22 00:00:00');
