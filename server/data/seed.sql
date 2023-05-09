BEGIN;

-- sudo mysql -u root
-- CREATE DATABASE connectify;
-- use connectify
-- SHOW tables;
-- SELECT * from `group`;

-- GRANT ALL PRIVILEGES ON connectify.* TO 'connectify' WITH GRANT OPTION;
-- FLUSH PRIVILEGES;

-- exit

-- cd server
-- mysql -u connectify  -p connectify  < ./data/table.sql
-- mysql -u connectify  -p connectify  < ./data/seed.sql


INSERT INTO `group` (
`name`,
`description`,
`status`

) VALUES (
    'test group',
    'une déscription',
    'public'
), (
    'test group 2',
    'une déscription 2',
    'privés'
);

COMMIT;