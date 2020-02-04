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
gameId binary(16) NOT NULL,
gameCharacterId binary (16) NOT NULL,
gamePictures
gameSystem varchar (32),
gameUrl varchar (512),
primary key (gameId),
foreign key (characterId)
}
create table Favorite;{
favoriteCharacterId binary(16) NOT NULL,
favoriteProfileId binary(16) NOT NULL,
fatoriteDate DATETIME(6) NOT NULL,
foreign key (characterId),
foreign key (profileId)
}
create table Profile;{
profileId
profileActivationToken
profileDateJoined
profileDescription
profileEmail
profileHash
profileUserName
}