DROP TABLE IF EXISTS Favorite;
DROP TABLE IF EXISTS Game;
DROP TABLE IF EXISTS `Character`;
DROP TABLE IF EXISTS Profile;

create table Profile (
	profileId binary(16) NOT NULL,
	profileActivationToken char(32),
	profileDateJoined DATETIME(6) NOT NULL,
	profileEmail varchar (128) NOT NULL,
	profileHash char (97) NOT NULL,
	profileUserName varchar (32) NOT NULL,
	unique(profileEmail),
	unique (profileUserName),
	primary key (profileId)
);


create table `Character`(
characterId binary(16) NOT NULL,
characterDescription varchar (255),
characterMusicUrl varchar (512),
characterPictureUrl varchar (512),
characterQuotes varchar (255) NOT NULL,
characterReleaseDate  DATETIME(6) NOT NULL,
characterSong varchar (255),
characterUniverse VARCHAR(255),
primary key(characterId)
);

create table Game (
gameId binary(16) NOT NULL,
gameCharacterId binary (16) NOT NULL,
gamePictureUrl varchar (512),
gameSystem varchar (32),
gameUrl varchar (512),
INDEX(gameCharacterId),
primary key (gameId),
foreign key (gameCharacterId) references `Character` (CharacterId)
);

create table Favorite(
favoriteCharacterId binary(16) NOT NULL,
favoriteProfileId binary(16) NOT NULL,
favoriteDate DATETIME(6) NOT NULL,
INDEX(favoriteCharacterId),
INDEX(favoriteProfileId),
foreign key (favoriteCharacterId) references `Character`(characterId),
foreign key (favoriteProfileId) references Profile(profileId),
primary key (favoriteCharacterId, favoriteProfileId)
);

