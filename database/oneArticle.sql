Select  Articles.id, title , body , startDate , endDate, pseudo from Articles
    inner join Authors on Authors.id = Articles.Authors_id 
    WHERE Articles.id=1