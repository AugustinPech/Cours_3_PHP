<?php
function lastBlogPosts($myPdo, $numberOfArticles) // $nb est le nombre d'articles requis. S'il n'est pas renseigné il vaut 10
{
    $query = "Select  Articles.id, title , body ,  Articles.longText, startDate , endDate, pseudo from Articles
    inner join Authors on Authors.id = Articles.Authors_id 
    WHERE `startDate` <= CURRENT_TIMESTAMP AND `endDate` > CURRENT_TIMESTAMP
    ORDER BY `importance_level` asc , `startDate` desc
    LIMIT $numberOfArticles";

    $statement = $myPdo->query($query);
    $outputListOfLastArticles = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $outputListOfLastArticles;
};

function oneArticle($myPdo, $idArticle)
{
    $query = "Select  Articles.id, title , body , Articles.longText, startDate , endDate, pseudo from Articles
    inner join Authors on Authors.id = Articles.Authors_id 
    WHERE Articles.id=$idArticle";

    $statement = $myPdo->query($query);
    $outputArticle = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $outputArticle;
};

function allCommentsOfOneArticle($myPdo, $idArticle)
{
    $query = "select body, date, Authors_id, Articles_id , Authors.pseudo
    FROM comments
    inner join Authors on Authors.id = comments.Authors_id 
    WHERE Articles_id = $idArticle
    ORDER BY date";

    $statement = $myPdo->query($query);
    $outputComments = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $outputComments;
};

function blogPostCreate($myPdo, $input) {

    $query = "insert INTO Articles ( `title`, `body`, `longText`, `startDate`, `endDate`, `Authors_id`, `importance_level` ) VALUES
    ( ? , ? , ? , ? , ? , ? , 0);";

    $statement = $myPdo->prepare($query);

    $statement->execute(
        array(
            $input['title'],
            $input['body'],
            $input['longText'],
            $input['startDate'],
            $input['endDate'],
            $input['id']
        )
    );
};

function allAuthors($myPdo) {
    $query="select id, pseudo from Authors where pseudo!='anonyme'";
    $statement = $myPdo->query($query);
    $allAuthors = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allAuthors;
}

function blogPostUpdate($myPdo, $article_id, $input)
{
    $query = "Update Articles set title= ?, body= ?, `longText`= ?, startDate= ?, endDate= ? where Articles.id = ?";

    $statement = $myPdo->prepare($query);

    $statement->execute(
        array(
            $input['title'],
            $input['body'],
            $input['longText'],
            $input['startDate'],
            $input['endDate'],
            $article_id
        )
    );
}

function blogPostDelete($myPdo, $blogPostID) {
    $query ="delete from Articles_has_categories where Articles_id = $blogPostID;
    delete from comments where Articles_id = $blogPostID;
    delete from Articles where Articles.id = $blogPostID";

    $statement = $myPdo->prepare($query);
    $statement->execute();
}