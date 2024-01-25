<?php
function lastBlogPosts($myPdo, $numberOfArticles = 10) // $nb est le nombre d'articles requis. S'il n'est pas renseigné il vaut 10
{
    $query = "Select  Articles.id, title , body , startDate , endDate, pseudo from Articles
    inner join Authors on Authors.id = Articles.Authors_id 
    WHERE `startDate` < CURRENT_TIMESTAMP AND `endDate` > CURRENT_TIMESTAMP
    ORDER BY `importance_level` asc , `startDate` desc
    LIMIT $numberOfArticles";
    
    $statement = $myPdo->query($query);
    $outputListOfLastArticles = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $outputListOfLastArticles;
};