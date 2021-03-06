CREATE TABLE foodster.dish
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    business_id INT(10) UNSIGNED,
    user_id INT(10) UNSIGNED,
    name_zh VARCHAR(32),
    name_tw VARCHAR(32),
    name_en VARCHAR(32),
    verified VARCHAR(1),
    like_count INT(10) UNSIGNED,
    dislike_count INT(10) UNSIGNED,
    create_time DATETIME,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX dish_business ON foodster.dish (business_id);
CREATE INDEX dish_user ON foodster.dish (user_id);
CREATE INDEX dish_verified ON foodster.dish (verified(1));