SELECT COUNT(*) AS `movies`
FROM `member_history`
WHERE (DATE(`date`)  between DATE('2006-10-30') AND	DATE('2007-07-27')) OR
	(DAY(`date`) = 24 AND MONTH(`date`) = 12);