--
-- Artist table
--

DROP TABLE IF EXISTS Artist;
CREATE TABLE IF NOT EXISTS Artist (
  stage_name varchar(50) NOT NULL,
  popularity int DEFAULT NULL,
  PRIMARY KEY (stage_name)
);

--
-- Adding sample data to Artist table
--

INSERT INTO Artist (stage_name) VALUES('Sia');
INSERT INTO Artist (stage_name) VALUES('Coldplay');
INSERT INTO Artist (stage_name) VALUES('Rihanna');
INSERT INTO Artist (stage_name) VALUES('Taylor Swift');
INSERT INTO Artist (stage_name) VALUES('Queen');

--
-- Member table
--

DROP TABLE IF EXISTS Member;
CREATE TABLE IF NOT EXISTS Member (
  stage_name varchar(50) NOT NULL,
  member_name varchar(50) NOT NULL,
  PRIMARY KEY (stage_name, member_name),
  KEY stage_name (stage_name)
);

--
-- Adding sample data to Member table
--

INSERT INTO Member (stage_name, member_name) VALUES('Sia', 'Sia Furler');
INSERT INTO Member (stage_name, member_name) VALUES('Coldplay', 'Guy Berryman');
INSERT INTO Member (stage_name, member_name) VALUES('Coldplay', 'Jonny Buckland');
INSERT INTO Member (stage_name, member_name) VALUES('Coldplay', 'Will Champion');
INSERT INTO Member (stage_name, member_name) VALUES('Coldplay', 'Chris Martin');
INSERT INTO Member (stage_name, member_name) VALUES('Coldplay', 'Phil Harvey');
INSERT INTO Member (stage_name, member_name) VALUES('Rihanna', 'Robyn Rihanna Fenty');
INSERT INTO Member (stage_name, member_name) VALUES('Taylor Swift', 'Taylor Swift');
INSERT INTO Member (stage_name, member_name) VALUES('Queen', 'Freddie Mercury');
INSERT INTO Member (stage_name, member_name) VALUES('Queen', 'John Deacon');
INSERT INTO Member (stage_name, member_name) VALUES('Queen', 'Brian May');
INSERT INTO Member (stage_name, member_name) VALUES('Queen', 'Roger Taylor');

--
-- Album table
--

DROP TABLE IF EXISTS Album;
CREATE TABLE IF NOT EXISTS Album (
  album_id int NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  year varchar(10) NOT NULL,
  popularity int DEFAULT NULL,
  PRIMARY KEY (album_id)
);

--
-- Adding sample data to Album table
--

INSERT INTO Album (name, year) VALUES('This Is Acting', '2016');
INSERT INTO Album (name, year) VALUES('1000 Forms of Fear', '2004');
INSERT INTO Album (name, year) VALUES('Parachutes', '2000');
INSERT INTO Album (name, year) VALUES('A Head Full of Dreams', '2015');
INSERT INTO Album (name, year) VALUES('Good Girl Gone Bad', '2007');
INSERT INTO Album (name, year) VALUES('Anti', '2016');
INSERT INTO Album (name, year) VALUES('Fearless', '2008');
INSERT INTO Album (name, year) VALUES('1989', '2014');
INSERT INTO Album (name, year) VALUES('Reputation', '2017');
INSERT INTO Album (name, year) VALUES('Sheer Heart Attack', '1974');
INSERT INTO Album (name, year) VALUES('A Night at the Opera', '1975');
INSERT INTO Album (name, year) VALUES('Innuendo', '1991');

--
-- Song table
--

DROP TABLE IF EXISTS Song;
CREATE TABLE IF NOT EXISTS Song (
  song_id int NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  album_id int NOT NULL,
  popularity int DEFAULT NULL,
  url varchar(150) DEFAULT NULL,
  track_number int DEFAULT NULL,
  PRIMARY KEY (song_id),
  KEY album_id (album_id)
);

INSERT INTO Song (name, album_id) VALUES('Alive', 1);
INSERT INTO Song (name, album_id) VALUES('Cheap Thrills', 1);
INSERT INTO Song (name, album_id) VALUES('Chandelier', 2);
INSERT INTO Song (name, album_id) VALUES('Elastic Heart', 2);
INSERT INTO Song (name, album_id) VALUES('Yellow', 3);
INSERT INTO Song (name, album_id) VALUES('A Head Full of Dreams', 4);
INSERT INTO Song (name, album_id) VALUES('Umbrella', 5);
INSERT INTO Song (name, album_id) VALUES('Don\'t Stop the Music', 5);
INSERT INTO Song (name, album_id) VALUES('Work', 6);
INSERT INTO Song (name, album_id) VALUES('Look What You Made Me Do', 9);
INSERT INTO Song (name, album_id) VALUES('Fifteen', 7);
INSERT INTO Song (name, album_id) VALUES('You Belong With Me', 7);
INSERT INTO Song (name, album_id) VALUES('Blank Space', 8);
INSERT INTO Song (name, album_id) VALUES('Shake It Off', 8);
INSERT INTO Song (name, album_id) VALUES('Innuendo', 12);
INSERT INTO Song (name, album_id) VALUES('Killer Queen', 10);
INSERT INTO Song (name, album_id) VALUES('Bohemian Rhapsody', 11);

--
-- Artist_genre
--

DROP TABLE IF EXISTS Artist_genre;
CREATE TABLE IF NOT EXISTS Artist_genre (
  stage_name varchar(50) NOT NULL,
  genre varchar(20) NOT NULL,
  PRIMARY KEY (stage_name),
  KEY stage_name (stage_name)
);

--
-- Album_genre
--

DROP TABLE IF EXISTS Album_genre;
CREATE TABLE IF NOT EXISTS Album_genre (
  album_id int NOT NULL,
  genre varchar(20) NOT NULL,
  PRIMARY KEY (album_id),
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
-- Adding sample data to Artist_has_album
--

INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Sia', 1);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Sia', 2);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Coldplay', 3);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Coldplay', 4);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Rihanna', 5);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Rihanna', 6);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Taylor Swift', 7);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Taylor Swift', 8);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Taylor Swift', 9);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Queen', 10);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Queen', 11);
INSERT INTO Artist_has_album (stage_name, album_id) VALUES('Queen', 12);


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
-- Adding values to Artist_has_song
--

INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Sia', 1);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Sia', 2);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Sia', 3);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Sia', 4);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Coldplay', 5);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Coldplay', 6);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Rihanna', 7);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Rihanna', 8);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Rihanna', 9);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Taylor Swift', 10);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Taylor Swift', 11);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Taylor Swift', 12);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Taylor Swift', 13);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Taylor Swift', 14);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Queen', 15);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Queen', 16);
INSERT INTO Artist_has_song (stage_name, song_id) VALUES('Queen', 17);


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
