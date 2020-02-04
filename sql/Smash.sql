DROP TABLE IF EXISTS Profile;
DROP TABLE IF EXISTS Favorite;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS Character;




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
gamePictures varchar (512),
gameSystem varchar (32),
gameUrl varchar (512),
INDEX(gameCharacterId),
primary key (gameId),
foreign key (gameCharacterId) references character (characterId)
}

create table Favorite;{
favoriteCharacterId binary(16) NOT NULL,
favoriteProfileId binary(16) NOT NULL,
favoriteDate DATETIME(6) NOT NULL,
INDEX(favoriteCharacterId),
INDEX(favoriteProfileId),
foreign key (favoriteCharacterId) references character(characterId),
foreign key (favoriteProfileId) references profile(profileId)
}

create table Profile;{
profileId binary(16) NOT NULL,
profileActivationToken char(32),
profileDateJoined DATETIME(6) NOT NULL,
profileDescription varchar (255),
profileEmail varchar (128) NOT NULL,
profileHash char (97) NOT NULL,
profileUserName varchar (32) NOT NULL,
unique(profileEmail),
unique (profileUserName),
primary key (profileId)
}