 CREATE TABLE Usuaris (
    id VARCHAR(60) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    cognom VARCHAR(30) NOT NULL,
    telefon NUMERIC(20),
    email VARCHAR(50) NOT NULL,
    nom_usuari VARCHAR(20) NOT NULL,
    contrasenya VARCHAR(60) NOT NULL,
    category VARCHAR(10) NOT NULL,
    CONSTRAINT pk_continente PRIMARY KEY (id),
);

//contrasenya: qweqds4231
INSERT INTO Usuatis (id, nom, cognom, telefon,email, nom_usuari, contrasenya, category) VALUES (1, "Maximo", "Navarro Cortez", 684067231, "maxim53.cortez@gamil.com", "Maximo_321", "Kj6ayBPprRRnpZ5LwpRjyvhbOmfHK4NApk0Wg4GTBhDS/2m7kpA2iVRvd3l6azL5", "administrador");
//contrasenya: iweruit2134
INSERT INTO Usuatis (id, nom, cognom, telefon,email, nom_usuari, contrasenya, category) VALUES (1, "Alexander", "Jutierres Castillo", 684067231, "jutierres.castillo@gamil.com", "Alexander_$21", "OaaNB1jYGKlUU4I6wVnOYxYYjelfaVwnp4IRTlnBLhg64TMGdTALQt63dH9Bf899", "usuari");