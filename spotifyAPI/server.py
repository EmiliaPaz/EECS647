import spotipy
import pymysql.cursors
import csv

# SQL
connection = pymysql.connect(host='mysql.eecs.ku.edu',
                             user='csydney',
                             password='Jaisai4e',
                             db='csydney',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)


# SPOTIPY
from spotipy.oauth2 import SpotifyClientCredentials #To access authorised Spotify data
client_id = 'f2aa2c18088747f585c6ff121849072c';
client_secret = 'a2ae968e0c0d4700b481519845359c00';

client_credentials_manager = SpotifyClientCredentials(client_id=client_id, client_secret=client_secret)
sp = spotipy.Spotify(client_credentials_manager=client_credentials_manager) #spotify object to access API


# artists_array = ["p!nk", "queen", "aerosmith", "abba", "beyonce"];
artists_array = ["p!nk"]

# CSV

with open('spotifyAPI/artistsongs.csv','w') as artistsongs_file:
    artistsongs_fields = ['stage_name','song_id']
    writer_artistsongs = csv.DictWriter(artistsongs_file,fieldnames=artistsongs_fields)
    writer_artistsongs.writeheader()
    artistsongs = []


    with open('spotifyAPI/artistalbums.csv','w') as artistsalbums_file:
        artistsalbums_fields = ['stage_name','album_id']
        writer_artistsalbums = csv.DictWriter(artistsalbums_file,fieldnames=artistsalbums_fields)
        writer_artistsalbums.writeheader()
        artistsalbums = []


        with open('spotifyAPI/albums_genres.csv','w') as albums_genres_file:
            writer_album_genre = csv.writer(albums_genres_file)
            albums_genres = []

            with open('spotifyAPI/artists_genres.csv','w') as artists_genres_file:
                writer_artists_genre = csv.writer(artists_genres_file)
                artists_genres = []

                with open('spotifyAPI/artists.csv','w') as artists_file:
                    artist_fields = ['name','popularity','genres']
                    writer_artists = csv.DictWriter(artists_file,fieldnames=artist_fields)
                    writer_artists.writeheader()
                    artists = []

                    with open('spotifyAPI/albums.csv','w') as albums_file:
                        album_fields = ['id','name','date','popularity']
                        writer_albums = csv.DictWriter(albums_file,fieldnames=album_fields)
                        writer_albums.writeheader()

                        with open('spotifyAPI/songs.csv','w') as songs_file:
                            song_fields = ['id','name','album_id','popularity','url','track_number','valence']
                            writer_songs = csv.DictWriter(songs_file,fieldnames=song_fields)
                            writer_songs.writeheader()

                            for a in artists_array:
                                #Search for artist
                                artist_search = sp.search(a,1,0,"artist")
                                artist = artist_search['artists']['items'][0]
                                artists.append({'name': artist['name'], 'popularity': artist['popularity']})
                                artists_genres.append( [artist['name']] + artist['genres'])

                                #Artist's albums
                                albums = []
                                albums_ids = []
                                spotify_albums = sp.artist_albums(artist['id'], album_type='album')
                                for i in range(len(spotify_albums['items'])):
                                    album_id = spotify_albums['items'][i]['id']
                                    albums_ids.append(spotify_albums['items'][i]['id'])
                                    album_name = spotify_albums['items'][i]['name']
                                    album_date = spotify_albums['items'][i]['release_date']
                                    album_popularity = sp.album(album_id)['popularity']
                                    album_genres = sp.album(album_id)['genres']
                                    albums.append({'id': album_id,'name': album_name, 'date': album_date[:4], 'popularity': album_popularity })
                                    albums_genres.append( [album_id]  + album_genres)
                                    artistsalbums.append({'stage_name': artist['name'], 'album_id':album_id })

                                # Write albums to csv
                                writer_albums.writerows(albums)
                                print('albums printed')
                                writer_album_genre.writerows(albums_genres)
                                print('album genres printed')
                                writer_artistsalbums.writerows(artistsalbums)
                                print('artistsalbums printed')

                                #Artist's albums songs
                                albums_songs = []
                                albumIndex = 0;
                                #For each album
                                for id in albums_ids:
                                    albums_songs.append([])
                                    spotify_songs = sp.album_tracks(id)
                                    for n in range(len(spotify_songs['items'])):
                                        song_id = spotify_songs['items'][n]['id']
                                        song_name = spotify_songs['items'][n]['name']
                                        song_url = spotify_songs['items'][n]['preview_url']
                                        song_track_number = spotify_songs['items'][n]['track_number']
                                        song_popularity = sp.track(song_id)['popularity']
                                        song_valence = sp.audio_features(song_id)[0]['valence']
                                        albums_songs[albumIndex].append({'id': song_id, 'name': song_name, 'album_id': id, 'popularity': song_popularity, 'url': song_url, 'track_number': song_track_number, 'valence': song_valence })
                                        artistsongs.append({'stage_name': artist['name'], 'song_id':song_id })

                                    # Write songs to csv
                                    writer_songs.writerows(albums_songs[albumIndex])
                                    print('album ', id, ' songs written')
                                    writer_artistsongs.writerows(artistsongs)
                                    print('artistsongs printed')
                                    albumIndex = albumIndex + 1;

                            # Write artist to csv
                            writer_artists.writerows(artists)
                            print('artists printed')
                            writer_artists_genre.writerows(artists_genres)
                            print('artists genres printed')

                # PRINT!
                # print("Name: ", artist['name'])
                # print("Genre: ", artist['genres'])
                # print("POpularity: ", artist['popularity'])
                # print("Albums")
                # albumIndex = 0;
                # for al in albums:
                #     print(al['name'])
                #     print(al['popularity'])
                #     print("    Songs")
                #     for s in albums_songs[albumIndex]:
                #         print("      ", s['name'])
                #         print("            ", s['popularity'])
                #     print("------------------------------------------")
                #     albumIndex = albumIndex + 1
                #
                # print("------------------------------------------------------------------------------------")



# Write to CSV
#
# with open('songs.csv','w') as songs_file:
#
#     for a in artists:
#         albumIndex = 0;
#         for al in albums:
#
#             for s in albums_songs[albumIndex]:
#                 song_fields = ['id','name','album_id','popularity','url','track_number']
#                 writer = csv.DictWriter(csvFile,fieldnames=song_fields)
#                 writer.write(header)
#                 writer.writerows(albums_songs)
#             albumIndex = albumIndex + 1
#


# try:
#     with connection.cursor() as cursor:
#         # Create a new record
#         sql = "INSERT INTO `Artist` (`stage_name`, `genre`) VALUES (%s, %s)"
#         cursor.execute(sql, (artist['name'], artist['genres'][0]))
#     # connection is not autocommit by default. So you must commit to save
#     # your changes.
#     connection.commit()
#
# finally:
#     connection.close()
