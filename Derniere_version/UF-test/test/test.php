$test="SELECT * FROM (SELECT i.id_bien, MAX(lien_image) AS premiere_image FROM image AS i GROUP BY id_bien
    ) AS m
    INNER JOIN biens AS b ON b.id_bien=m.id_bien
    INNER JOIN type_bien AS tb ON b.id_type_bien=tb.id_type_bien
    INNER JOIN adresse AS ad ON b.id_adresse=ad.id_adresse
    WHERE ((prix_vente BETWEEN ? AND ?) OR (? AND ? IS NULL)) AND (nb_piece=? OR ? IS NULL) AND ((superficie BETWEEN ? AND ?) OR (? AND ? IS NULL))
    ORDER BY date_ajout DESC";
    $sts=$cnx->prepare($test);
    $sts->execute([$pMin,$pMax,$pMin,$pMax,$piece,$piece,$supMin, $supMax,$supMin, $supMax]);