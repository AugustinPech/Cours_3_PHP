<?php
function lastBlogPosts($nb = 10) // $nb est le nombre d'articles requis. S'il n'est pas renseigné il vaut 10
{
    $result = "Select  Articles.id, title , body , startDate , endDate, pseudo from Articles
    inner join Authors on Authors.id = Articles.Authors_id 
    WHERE `startDate` < CURRENT_TIMESTAMP AND `endDate` > CURRENT_TIMESTAMP
    ORDER BY `startDate` asc
    LIMIT $nb";
    
    return $result;
};