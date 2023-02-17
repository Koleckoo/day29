--ends with Holland
SELECT * 
FROM `cities` 
WHERE `district` 
LIKE '%Holland';


--ville somewhere in the middle
SELECT *
FROM `cities`
WHERE `name`
LIKE '%ville%';



SELECT * 
FROM `cities`
WHERE `country_id` IN (56, 199, 172, 98)
ORDER BY `population` DESC
LIMIT 10;
-- inserting
INSERT 
INTO `regions`
(`name`, `slug`)
VALUES
('Eastern Europe', 'eastern-europe')

-- one row
UPDATE `cities`
SET `name` = 'Prague'
WHERE `id` = 3339;


-- multiple rows
UPDATE `countries`
SET `head_of_state` = 'Xavier Espot Zamora'
WHERE `name` = 'Andorra';

UPDATE `countries`
SET `head_of_state` = 'Joseph Robinette Biden Jr.'
WHERE `head_of_state` = 'George W. Bush';

-- updating multiple collumns
UPDATE `countries`
SET `Population` = 30,
	`GNP` = 13.91
WHERE `name` = 'United States Minor Outlying Islands';

-- deleting
DELETE
FROM `regions`
WHERE `id` = 1;

--deleting more than one
DELETE 
FROM `regions`
WHERE `slug` = '%america%';