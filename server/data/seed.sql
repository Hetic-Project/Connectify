BEGIN;

-- sudo mysql -u root
-- CREATE DATABASE connectify;
-- use connectify
-- SHOW tables;
-- SELECT * from `group`;

-- CREATE USER 'connectify' IDENTIFIED BY 'connectify';
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

INSERT INTO `role` (`name`) 
VALUES ('admin');

INSERT INTO `page` (
`name`,
'banner',
'picture'

) VALUES (
    'admin',
    'banner url',
    'picture url'
);

INSERT INTO `promo` (
`promo_name`

) VALUES (
    'PROMO WEB1 P2025'
);

INSERT INTO `user` (
`firstname`,
`lastname`,
`mail`,
`password`,
`username`,
`picture`,
`banner`,
`active`,
`role_id`,
`promo_id`

) VALUES (
    'VANDAL',
    'William',
    'williamvandal@gmail.com',
    'vandal.william',
    'profile picture url',
    'banner url',
    'compte activé',
    '56515',
    '1353'
);

INSERT INTO `publication` (
`title`,
`content`,
`picture`,
`author_id`

) VALUES (
    'Photo de classe',
    'photo réalisée par : Jean Charles',
    'picture url',
    '284'
);

INSERT INTO `comment` (
`comment_content`,
`user_id`,
`publication_id`

) VALUES (
    'PROMO WEB1 P2025',
    '135',
    '2651'
);

INSERT INTO `member` (
`group_id`,
`user_id`,
`role_id`

) VALUES (
    '513',
    '6513',
    '226'
);

INSERT INTO `role_page` (
`user_id`,
`role_id`,

) VALUES (
    '6513',
    '226'
);

INSERT INTO `private_message` (
`message_content`,
`transmitter_id`,
`receiver_id`

) VALUES (
    'contenu du message',
    '55',
    '66'
);

INSERT INTO `group_message` (
`message_content`,
`transmitter_id`,
`group_id`

) VALUES (
    'contenu du message',
    '55',
    '12'
);


COMMIT;