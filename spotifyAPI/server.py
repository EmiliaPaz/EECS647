import spotipy
import pymysql.cursors

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

# artist = "p!nk" #chosen artist

artists = ["p!nk", "queen", "aerosmith", "abba", "beyonce"];
# artists = ["p!nk"]

for artist in artists:
    #Search for artist
    artist_search = sp.search(artist,1,0,"artist")
    artist = artist_search['artists']['items'][0]

    #Artist's albums
    album_names = []
    album_ids = []
    album_date = []
    albums = sp.artist_albums(artist['id'], album_type='album')
    for i in range(len(albums['items'])):
        album_names.append(albums['items'][i]['name'])
        album_ids.append(albums['items'][i]['id'])
        album_date.append(albums['items'][i]['release_date'])

    #Artist's albums songs
    spotify_albums = []
    albumIndex = 0;
    #For each album
    for id in album_ids:
        spotify_albums.append([])
        songs = sp.album_tracks(id)
        for n in range(len(songs['items'])):
            song_id = songs['items'][n]['id']
            song_name = songs['items'][n]['name']
            spotify_albums[albumIndex].append({'id': song_id, 'name': song_name })
        albumIndex = albumIndex + 1;


    print("Name: ", artist['name'])
    print("Genre: ", artist['genres'][0])
    print("Albums")

    albumIndex = 0;
    for a in album_names:
        print(a)
        print("    Songs")
        for s in spotify_albums[albumIndex]:
            print("      ", s['name'])
        print("------------------------------------------")
        albumIndex = albumIndex + 1

    print("------------------------------------------------------------------------------------")






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
