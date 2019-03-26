/* TABLES ----------------------------------------- */

/* INSERTION CLUB */
INSERT INTO CLUB (
    NOM_CLUB,
    HORAIRES_CLUB,
    TEL_CLUB,
    EMAIL_CLUB,
    ADRESSE_CLUB
) 
VALUES (
    "elite tennis",
    "08h00-12h00-16h00-20h00",
    "0499252208",
    "elite-tennis@earthloader.fr",
    "ZA de la croix verte, 35000 Rennes"
);

/* INSERTION TERRAIN */
INSERT INTO TERRAIN (
    COUVERT_TERRAIN,
    TYPE_TERRAIN,
    ID_CLUB
) 
VALUES (
    "1",
    "S",
    "1"
);

/* INSERTION ENTRAINEUR */
INSERT INTO ENTRAINEUR (
    PRENOM_ENTRAINEUR,
    NOM_ENTRAINEUR,
    DESCRIPTION_ENTRAINEUR
) 
VALUES (
    "CHUCK",
    "NORRIS",
    "IL A INVENTÉ LA DSB, 3 FOIS"
);

/* INSERTION ENTRAINEMENT */
INSERT INTO ENTRAINEMENT (
    HEURE_DEBUT_ENTRAINEMENT,
    HEURE_FIN_ENTRAINEMENT,
    NIVEAU_ENTRAINEMENT,
    ID_CLUB
) 
VALUES (
    DATE_ADD(NOW(), INTERVAL "-2:-2" DAY_HOUR),
    DATE_ADD(NOW(), INTERVAL -2 DAY),
    "D",
    "1"
);

/* INSERTION ABONNÉ */
INSERT INTO ABONNE (
    PRENOM_ABONNE,
    NOM_ABONNE,
    PSEUDO_ABONNE,
    EMAIL_ABONNE,
    REDUCTION_ABONNE,
    DESCRIPTION_ABONNE,
    NIVEAU_ABONNE,
    MDP_ABONNE,
    ID_CLUB,
    ID_ENTRAINEMENT
) 
VALUES (
    "CLARK",
    "KENT",
    "SUPERMAN",
    "superman@gmail.com",
    "1",
    "J'envoie des boulets de canons.",
    "A",
    "motdepassehashé",
    "1",
    "1"
);

/* INSERTION MATCH_TENNIS */
INSERT INTO MATCH_TENNIS (
    HEURE_DEBUT_MATCH,
    HEURE_FIN_MATCH,
    COMPETITION_MATCH,
    ID_CLUB,
    ID_TERRAIN
) 
VALUES (
    "X",
    "X",
    "X",
    "X",
    "X"
);

/* INSERTION AVATAR */
INSERT INTO AVATAR (
    FILENAME_AVATAR,
    ID_ABONNE
) 
VALUES (
    "X",
    "X"
);
 
/* INSERTION IMAGE_PW */
INSERT INTO IMAGE_PW (
    FILENAME_IMAGE
) 
VALUES (
    "X"
);


/* RELATIONS ----------------------------------------- */
 
/* INSERTION ABONNE_PERD_MATCH */
INSERT INTO ABONNE_PERD_MATCH (
    ID_ABONNE,
    ID_MATCH
) 
VALUES (
    "X",
    "X"
);

/* INSERTION ABONNE_GAGNE_MATCH */
INSERT INTO ABONNE_GAGNE_MATCH (
    ID_ABONNE,
    ID_MATCH
) 
VALUES (
    "X",
    "X"
);

/* INSERTION ENTRAINEMENT_A_LIEU_SUR_TERRAIN */
INSERT INTO ENTRAINEMENT_A_LIEU_SUR_TERRAIN (
    ID_TERRAIN,
    ID_ENTRAINEMENT
) 
VALUES (
    "X",
    "X"
);

/* INSERTION ENTRAINEMENT_A_ENTRAINEUR */
INSERT INTO ENTRAINEMENT_A_ENTRAINEUR (
    ID_ENTRAINEMENT,
    ID_ENTRAINEUR
) 
VALUES (
    "X",
    "X"
);