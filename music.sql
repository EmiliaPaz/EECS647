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
-- Album table
--

DROP TABLE IF EXISTS Album;
CREATE TABLE IF NOT EXISTS Album (
  album_id varchar(30) NOT NULL,
  name varchar(30) NOT NULL,
  year varchar(10) NOT NULL,
  popularity int DEFAULT NULL,
  PRIMARY KEY (album_id)
);

--
-- Song table
--

DROP TABLE IF EXISTS Song;
CREATE TABLE IF NOT EXISTS Song (
  song_id varchar(30) NOT NULL,
  name varchar(30) NOT NULL,
  album_id int NOT NULL,
  popularity int DEFAULT NULL,
  url varchar(150) DEFAULT NULL,
  track_number int DEFAULT NULL,
  PRIMARY KEY (song_id),
  KEY album_id (album_id)
);

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

INSERT INTO User (username, password, email) VALUES ('sample_user', 'password', 'sample_user@ku.edu');

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

INSERT INTO Playlist (name, username) VALUES ('sample playlist', 'sample_user');

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
