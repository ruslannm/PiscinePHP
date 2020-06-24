SELECT ROUND(AVG(nb_seats)) AS average
FROM cinema
GROUP BY id_cinema;