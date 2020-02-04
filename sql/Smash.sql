DROP TABLE IF EXISTS Character;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS Favorite;
DROP TABLE IF EXISTS Profile;

create table Character;{
characterId binary(16) NOT NULL,
characterDescription varchar (255),
characterMusicUrl varchar (512),
characterPictureUrl varchar (512),
characterQuotes varchar (255) NOT NULL,
characterReleaseDate  DATETIME(6) NOT NULL,
characterSong varchar (255),
primary key(characterId)
}
create table Game;{
gameId
gameCharacterId
gamePictures
gameSystem
gameUrl
}
create table Favorite;{

}
create table Profile;{

}