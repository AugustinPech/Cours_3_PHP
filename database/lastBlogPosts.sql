Select  Articles.id, title , body , startDate , endDate, pseudo from Articles
inner join Authors on Authors.id = Articles.Authors_id 
WHERE `startDate` < CURRENT_TIMESTAMP AND `endDate` > CURRENT_TIMESTAMP
ORDER BY `startDate` asc
limit 100