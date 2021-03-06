Create table Ricerche (

Nome VARCHAR(20) NOT NULL,
Conta INT NOT NULL,
PRIMARY KEY(Nome)

);

Create table Film (

ImdbID CHAR(9) NOT NULL,
Nome VARCHAR(20) NOT NULL,
Conta INT NOT NULL,
Titolo VARCHAR(30) NOT NULL,
Anno INT NOT NULL,
Poster VARCHAR(50) NOT NULL,
Durata VARCHAR(20) NOT NULL,
Regista VARCHAR(20) NOT NULL,
Plot VARCHAR(500) NOT NULL,
PRIMARY KEY(ImdbID),
FOREIGN KEY(Nome) REFERENCES Ricerche(Nome)

);

Create table Attori (

Codice INT NOT NULL AUTO_INCREMENT,
ImdbID CHAR(9) NOT NULL,
Nome VARCHAR(30) NOT NULL,
Conta INT NOT NULL,
PRIMARY KEY(Codice, ImdbID),
FOREIGN KEY(ImdbID) REFERENCES Film(ImdbID)

);

Create table Lingue (

Codice INT NOT NULL AUTO_INCREMENT,
ImdbID CHAR(9) NOT NULL,
Lingua VARCHAR(15) NOT NULL,
Conta INT NOT NULL,
PRIMARY KEY(Codice, ImdbID),
FOREIGN KEY(ImdbID) REFERENCES Film(ImdbID)


);

Create table Genere (

Codice INT NOT NULL AUTO_INCREMENT,
ImdbID CHAR(9) NOT NULL,
Nome VARCHAR(15) NOT NULL,
Conta INT NOT NULL,
PRIMARY KEY(Codice, ImdbID),
FOREIGN KEY(ImdbID) REFERENCES Film(ImdbID)

);

Create table Utente (

Nome VARCHAR(20) NOT NULL,
Cognome VARCHAR(20) NOT NULL,
Etá INT NOT NULL,
Cookie CHAR(8) NOT NULL,
Id VARCHAR(16) NOT NULL,
PRIMARY KEY(Id, Cookie)

)

Create table RicercaUtente (

Id VARCHAR(16) NOT NULL,
Conta INT NOT NULL,

)
