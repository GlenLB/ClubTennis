a)
/* Le prénom de l'abonné ayant l'ID n°24 */
SELECT PRENOM_ABONNE FROM ABONNE WHERE ID_ABONNE = 24;

b)
/* Une jointure abonne vers CLUB : prenom, nom abonne, nom club */
SELECT ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, CLUB.NOM_CLUB FROM ABONNE NATURAL JOIN CLUB;

c)
/* La durée moyenne d'un match */
SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(HEURE_FIN_MATCH, HEURE_DEBUT_MATCH)))) AS DUREE_MOYENNE_MATCH FROM MATCH_TENNIS;

d) 
/* Nombre de matchs gagnés par abonné */
SELECT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, COUNT(*) AS NOMBRE_MATCHS_GAGNES FROM ABONNE NATURAL JOIN ABONNE_GAGNE_MATCH GROUP BY ABONNE.ID_ABONNE;

/* Nombre de matchs joués par abonné */
SELECT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, COUNT(*) AS NOMBRE_MATCHS_JOUES FROM ABONNE NATURAL JOIN ABONNE_GAGNE_MATCH GROUP BY ABONNE.ID_ABONNE UNION SELECT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE, COUNT(*) AS NOMBRE_MATCHS_JOUES FROM ABONNE NATURAL JOIN ABONNE_PERD_MATCH GROUP BY ABONNE.ID_ABONNE ORDER BY NOMBRE_MATCHS_JOUES DESC;

e)
/* Les abonnés qui ont joué et qui n'ont jamais perdu de match = les abonnés ayant toujours gagné */
SELECT DISTINCT ABONNE.ID_ABONNE, ABONNE.PRENOM_ABONNE, ABONNE.NOM_ABONNE FROM ABONNE NATURAL JOIN ABONNE_GAGNE_MATCH WHERE ABONNE.ID_ABONNE NOT IN (SELECT ABONNE.ID_ABONNE FROM ABONNE NATURAL JOIN ABONNE_PERD_MATCH);

f)
/* Les abonnés / réduction abonné == 1 */
SELECT PRENOM_ABONNE, NOM_ABONNE, REDUCTION_ABONNE FROM ABONNE WHERE REDUCTION_ABONNE IN (SELECT DISTINCT REDUCTION_ABONNE FROM ABONNE WHERE REDUCTION_ABONNE = 1);