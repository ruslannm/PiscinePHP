SELECT last_name, first_name
FROM user_card
WHERE (last_name LIKE '%-%') OR (first_name LIKE '%-%')
order by last_name ASC, first_name ASC;