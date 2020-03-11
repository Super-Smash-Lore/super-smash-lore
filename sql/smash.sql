DROP TABLE IF EXISTS favorite;
DROP TABLE IF EXISTS game;
DROP TABLE IF EXISTS `character`;
DROP TABLE IF EXISTS profile;

create table profile (
profileId binary(16) NOT NULL,
profileActivationToken char(32),
profileDateJoined DATE NOT NULL,
profileEmail varchar (128) NOT NULL,
profileHash char (97) NOT NULL,
profileUserName varchar (32) NOT NULL,
unique(profileEmail),
unique (profileUserName),
primary key (profileId)
);


create table `character`(
characterId binary(16) NOT NULL,
characterDescription varchar (1600),
characterMusicUrl varchar (255),
characterName VARCHAR(32),
characterPictureUrl varchar (255),
characterQuotes varchar (255),
characterReleaseDate VARCHAR(128),
characterSong varchar (255),
characterUniverse VARCHAR(255),
primary key(characterId)
);

create table game (
gameId binary(16) NOT NULL,
gameCharacterId binary (16) NOT NULL,
gamePictureUrl varchar (255),
gameSystem varchar (32),
gameUrl varchar (512),
INDEX(gameCharacterId),
foreign key (gameCharacterId) references `character` (characterId),
primary key (gameId)
);

create table favorite(
favoriteCharacterId binary(16) NOT NULL,
favoriteProfileId binary(16) NOT NULL,
favoriteDate DATE NOT NULL,
INDEX(favoriteCharacterId),
INDEX(favoriteProfileId),
foreign key (favoriteCharacterId) references `character`(characterId),
foreign key (favoriteProfileId) references profile(profileId),
primary key (favoriteCharacterId, favoriteProfileId)
);

