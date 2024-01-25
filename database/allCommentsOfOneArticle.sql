SELECT `body`, `date`, `Authors_id`, `Articles_id` , `Authors.pseudo`
FROM `comments` inner join Authors on Authors.id = comments.Authors_id 
WHERE `id` = '1'