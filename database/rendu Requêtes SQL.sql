-- ITERATION 1
    -- Sélection sur une table :
        -- Liste des produits
        select * from produit;

        -- Liste des produits en rupture de stock (dont le stock est “0”)
        select * from produit
        where stock=0;

        -- Lister les points relais situé en Suisse, classés par ville et par nom
        select * from pointrelais
        where pointrelais.pays = 'SUISSE'
        order by ville asc , nom asc;

        -- Liste des commandes d’aujourd’hui (sans indiquer “en dur” la date du jour svp)
        select * from commande
        where date_commande = curdate();

        -- classées par n° décroissant
        select * from commande
        where date_commande = curdate()
        order by cast(numero as int) asc;

        -- Liste des commandes créées depuis les 10 derniers jours(sans indiquer “en dur” la date du jour svp), de deux manières différentes
        select * from commande
        where date_commande between curdate()-10 and curdate();

        -- Lister les villes françaises avec le nombre de point relais présent dans chacune d’entre elles
        SELECT `ville`, COUNT(`id`) FROM `pointrelais`
        where pays = 'FRANCE'
        GROUP BY `ville`;

        -- Lister les clients avec un pseudo contenant ‘Martin’
        SELECT *
        FROM `client`
        WHERE `pseudo` LIKE '%Martin%';

        -- Montant de la valeur du stock
        SELECT SUM(prix*stock) FROM `produit`;

    -- Facultatif :
        -- Lister par pays, le nombre de points relais et le nombre de villes
        SELECT `pays`, COUNT(distinct `ville`), COUNT(distinct `nom`) FROM `pointrelais` GROUP BY `pays`;

        -- Lister les clients qui ont un pseudo contenant « Martin »
            -- redondant

        -- Lister les villes des différents points relais
        SELECT `ville`, nom 
        FROM `pointrelais` GROUP BY `nom` order by nom ;

    -- Sélection sur plusieurs tables :
        -- Liste des commandes livrées aux points relais situés à Lille avant le 01/07/2023
        select commande.numero , date(commande.date_commande) , date(commande.date_livraison), pointrelais.nom
        from commande join pointrelais on commande.pointrelais_id = pointrelais.id
        where pointrelais.ville= 'LILLE'  and date(commande.date_livraison) <  date('2023-07-01') ;

        -- Liste des produits de la commande numéro 274
            -- à restituer : catégorie, nom, quantité et prix unitaire
        select commande.numero , commande_has_produit.quantite, produit.prix, produit.nom, categorie.nom
        from commande
        join commande_has_produit on commande_id=commande.id
        join produit on produit_id = produit.id
        join categorie on categorie_id = categorie.id
        where commande.numero = '274'
        order by produit.nom;

        -- alternative avec des sommes pour chaque ligne 'produit'
        select commande.numero , commande_has_produit.quantite, produit.prix as 'prix unitaire', commande_has_produit.quantite*produit.prix as 'prix pour N articles' , produit.nom, categorie.nom
        from commande
        join commande_has_produit on commande_id=commande.id
        join produit on produit_id = produit.id
        join categorie on categorie_id = categorie.id
        where commande.numero = '274'
        order by produit.nom;

        -- Prix total de la commande numéro 2293
        select sum(commande_has_produit.quantite * produit.prix) as 'prix total de la commande numero 2293'
        from commande
        join commande_has_produit on commande_id=commande.id
        join produit on produit_id = produit.id
        where commande.numero = '2293'
        order by produit.nom;

        -- Liste des commandes (numero + montant) supérieur à 20 000 € affichées par montant décroissant
        select commande.numero,  sum(commande_has_produit.quantite * produit.prix) as montant
        from commande
        join commande_has_produit on commande_id=commande.id
        join produit on produit_id = produit.id
        group by commande.numero
        having  montant > 20000
        order by montant desc;

        -- Liste des commandes (numero + montant) dont le prix est entre 15 000 € et 20 000 €
        select commande.numero,  sum(commande_has_produit.quantite * produit.prix) as montant
        from commande
        join commande_has_produit on commande_id=commande.id
        join produit on produit_id = produit.id
        group by commande.numero
        having  montant > 15000 and montant <20000
        order by montant asc;

        -- Liste les catégories où des produits sont en rupture de stock (de 2 manières différentes)
            -- manière 1
            select produit.nom, categorie.nom , produit.stock
            from produit
            inner join categorie
            on categorie.id = produit.categorie_id
            where produit.stock = 0
            -- manière 2
            select categorie.nom
            from categorie
            where categorie.id in (select produit.categorie_id from produit where stock=0);

        -- Lister les catégories qui n’ont pas de produit (de 2 manières différentes)
            -- manière 1
            select categorie.nom
            from produit
            right join categorie
            on categorie.id = produit.categorie_id
            where produit.nom is null;
            -- manière 2
            select categorie.nom
            from categorie
            where categorie.id not in (select distinct produit.categorie_id from produit);

        -- Lister le Top 3 des ventes des produits “Réseau” (en nombre puis en montant de vente)
            -- en nombre
            select commande.numero , sum(commande_has_produit.quantite), produit.prix as 'prix unitaire', sum(commande_has_produit.quantite*produit.prix) as prix_ligne , produit.nom, categorie.nom
            from commande
            join commande_has_produit on commande_id=commande.id
            join produit on produit_id = produit.id
            join categorie on categorie_id = categorie.id
            where categorie.nom = 'Réseau'
            group by produit.id
            order by commande_has_produit.quantite asc
            limit 3;
            -- en montant
            select commande.numero , sum(commande_has_produit.quantite), produit.prix as 'prix unitaire', sum(commande_has_produit.quantite*produit.prix) as prix_ligne , produit.nom, categorie.nom
            from commande
            join commande_has_produit on commande_id=commande.id
            join produit on produit_id = produit.id
            join categorie on categorie_id = categorie.id
            where categorie.nom = 'Réseau'
            group by produit.id
            order by prix_ligne asc
            limit 3;

        -- Liste des clients (nom et pseudo) ayant passés une commande aujourd’hui
        select distinct client.pseudo
        from commande
        inner join client
        on client.id=client_id
        where commande.date_commande = curdate();

        -- Pour les clients qui sont un pseudo contenant “Martin”
            -- Lister les commandes
            select commande.numero
            from commande
            inner join client
            on client.id=client_id
            WHERE client.pseudo LIKE '%Martin%';
            -- Compter le nombre de commandes par pseudo
            select client.pseudo, count(distinct commande.numero)
            from commande
            inner join client
            on client.id=client_id
            WHERE client.pseudo LIKE '%Martin%'
            group by client.pseudo ;
            -- Compter la quantité d’articles commandés par pseudo
            select client.pseudo, sum(distinct commande_has_produit.quantite)
            from commande
            inner join client on client.id=client_id
            inner join commande_has_produit on commande.id = commande_id
            WHERE client.pseudo LIKE '%Martin%'
            group by client.pseudo ;

        --Facultatif :
            -- Montant total des commandes faites aujourd’hui
            select sum(commande_has_produit.quantite * produit.prix) as montant
            from commande
            join commande_has_produit on commande_id=commande.id
            join produit on produit_id = produit.id
            where date_commande= curdate()
            order by montant desc;
            -- Lister les commandes livrées en Suisse en plus de 50 jours
            select sum(commande_has_produit.quantite * produit.prix) as 'prix total de la commande numero 2293'
            from commande
            join commande_has_produit on commande_id=commande.id
            join produit on produit_id = produit.id
            where commande.numero = '2293'
            order by produit.nom;
            -- Montant moyen du stock par produit (sans indication du produit)
            select avg(stock) from produit;
            -- Montant de la valeur du stock par catégorie
            select
                categorie.nom,
                avg(stock)
            from
                produit
                inner join categorie on categorie.id = produit.categorie_id
            group by categorie.nom;
            -- Nombre de commandes passées aujourd’hui
            select count(*) from commande where commande.date_commande = curdate()
            -- Calculer le Montant moyen des commandes faites aujourd’hui
                select
                        sum(commande_has_produit.quantite * produit.prix)/count( distinct commande.id)
                from
                    commande
                    inner join commande_has_produit on commande_id=commande.id
                    inner join produit on produit_id = produit.id
                where commande.date_commande = curdate();
            -- Lister toutes les commandes de 2023 contenant un produit avec “netgear” dans son nom
            -- Lister l’activité de chaque point relais : nombre de commandes et nombre de clients qui s’y rendent
            -- Lister le nombre de clients livrés par ville de chaque pays
            -- Lister toutes les commandes de 2023 ne contenant pas de produit avec “netgear” dans son nom
            -- Lister les clients qui ont commandé à la fois des produits de la catégorie “Ecran” et “Stockage"

    -- Insertion et mise à jour et suppression de données
        -- Ajouter un produit (sans description) avec sa catégorie et sa quantité
        INSERT INTO `produit` (`nom`, `description`, `prix`, `stock`, `categorie_id`)
        VALUES ('Super bureau', NULL, '50', '234', '3');

        -- Ajouter 100 à la quantité en stock d‘un produit
        update produit 
        set stock =stock +100
        where produit.nom = 'Super bureau';

        -- Augmenter de 5% le prix des produits de la catégorie “Ecran”
        update produit 
        inner join categorie on categorie.id=produit.categorie_id
        set prix = prix*1.05
        where categorie.nom = 'Ecran';

        -- Baisser de 5% le prix des produits de la catégorie “Ecran” avec un prix supérieur à 100 €
        update produit 
        inner join categorie on categorie.id=produit.categorie_id
        set prix = prix*0.95
        where categorie.nom = 'Ecran' and produit.prix > 100;

        -- Supprimer la catégorie “Cablage”
        delete from categorie
        where categorie.nom = 'Cablage';

        -- Supprimer les commandes qui n’ont pas de produit
        delete from commande
        where commande.id not in (select commande_has_produit.commande_id from commande_has_produit);

        -- Créer une commande de 3 articles différents (avec ses lignes de commande associées)
        insert into commande
        (`numero`, `date_commande`, `date_livraison`, `client_id`, `pointrelais_id`) VALUES
        ('123456789', '2024-01-29','2050-01-29',1,1);
        insert into commande_has_produit
        (`commande_id`, `produit_id`, `quantite`) VALUES
        ((SELECT id FROM `commande`WHERE `numero` = '123456789'), 1, 10),
        ((SELECT id FROM `commande`WHERE `numero` = '123456789'), 2, 10),
        ((SELECT id FROM `commande`WHERE `numero` = '123456789'), 3, 10);


