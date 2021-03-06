CREATE TABLE foodster.iterm
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    code INT(10) UNSIGNED NOT NULL,
    type VARCHAR(11) NOT NULL,
    language VARCHAR(3) NOT NULL,
    description VARCHAR(256) NOT NULL,
    active VARCHAR(2),
    modyfied_by INT(10) UNSIGNED,
    ctime DATETIME NOT NULL,
    mtime DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE INDEX iterm_code ON foodster.iterm (code);
CREATE INDEX iterm_type ON foodster.iterm (type(10));
CREATE INDEX iterm_language ON foodster.iterm (language(2));
CREATE INDEX iterm_active ON foodster.iterm (active(1));
CREATE INDEX iterm_mtime ON foodster.iterm (mtime);

INSERT INTO 
foodster.iterm (code, type, language, description, active, modyfied_by, ctime, mtime)
VALUES 
(1001, 'CUISINE', 'en', 'Chinese - Shanghai', 'Y', 1, NOW(), NOW()),
(1001, 'CUISINE', 'zh', '上海菜', 'Y', 1, NOW(), NOW()),
(1001, 'CUISINE', 'tw', '上海菜', 'Y', 1, NOW(), NOW()),
(1002, 'CUISINE', 'en', 'Chinese - Northern', 'Y', 1, NOW(), NOW()),
(1002, 'CUISINE', 'en', '北方菜', 'Y', 1, NOW(), NOW()),
(1002, 'CUISINE', 'tw', '北方菜', 'Y', 1, NOW(), NOW()),
(1003, 'CUISINE', 'en', 'French', 'Y', 1, NOW(), NOW()),
(1003, 'CUISINE', 'zh', '法式料理', 'Y', 1, NOW(), NOW()),
(1003, 'CUISINE', 'tw', '法式料理', 'Y', 1, NOW(), NOW()),
(1004, 'CUISINE', 'en', 'Italian', 'Y', 1, NOW(), NOW()),
(1004, 'CUISINE', 'zh', '意式料理', 'Y', 1, NOW(), NOW()),
(1004, 'CUISINE', 'tw', '意式料理', 'Y', 1, NOW(), NOW()),
(1005, 'CUISINE', 'en', 'Western', 'Y', 1, NOW(), NOW()),
(1005, 'CUISINE', 'zh', '西餐', 'Y', 1, NOW(), NOW()),
(1005, 'CUISINE', 'tw', '西餐', 'Y', 1, NOW(), NOW()),
(1006, 'CUISINE', 'en', 'Japanese', 'Y', 1, NOW(), NOW()),
(1006, 'CUISINE', 'zh', '日式料理', 'Y', 1, NOW(), NOW()),
(1006, 'CUISINE', 'tw', '日式料理', 'Y', 1, NOW(), NOW()),
(1007, 'CUISINE', 'en', 'Korean', 'Y', 1, NOW(), NOW()),
(1007, 'CUISINE', 'zh', '韩国菜', 'Y', 1, NOW(), NOW()),
(1007, 'CUISINE', 'tw', '韓國菜', 'Y', 1, NOW(), NOW());

INSERT INTO 
foodster.iterm (code, type, language, description, active, modyfied_by, ctime, mtime)
VALUES 
(2001, 'KEYWORD', 'en', 'Sweet', 'Y', 1, NOW(), NOW()),
(2001, 'KEYWORD', 'zh', 'Sweet', 'Y', 1, NOW(), NOW()),
(2001, 'KEYWORD', 'tw', 'Sweet', 'Y', 1, NOW(), NOW()),
(2002, 'KEYWORD', 'en', 'Juicy', 'Y', 1, NOW(), NOW()),
(2002, 'KEYWORD', 'zh', 'Juicy', 'Y', 1, NOW(), NOW()),
(2002, 'KEYWORD', 'tw', 'Juicy', 'Y', 1, NOW(), NOW()),
(2003, 'KEYWORD', 'en', 'Hearty', 'Y', 1, NOW(), NOW()),
(2003, 'KEYWORD', 'zh', 'Hearty', 'Y', 1, NOW(), NOW()),
(2003, 'KEYWORD', 'tw', 'Hearty', 'Y', 1, NOW(), NOW()),
(2004, 'KEYWORD', 'en', 'Soggy', 'Y', 1, NOW(), NOW()),
(2004, 'KEYWORD', 'zh', 'Soggy', 'Y', 1, NOW(), NOW()),
(2004, 'KEYWORD', 'tw', 'Soggy', 'Y', 1, NOW(), NOW()),
(2005, 'KEYWORD', 'en', 'Sour', 'Y', 1, NOW(), NOW()),
(2005, 'KEYWORD', 'zh', 'Sour', 'Y', 1, NOW(), NOW()),
(2005, 'KEYWORD', 'tw', 'Sour', 'Y', 1, NOW(), NOW()),
(2006, 'KEYWORD', 'en', 'Tangy', 'Y', 1, NOW(), NOW()),
(2006, 'KEYWORD', 'zh', 'Tangy', 'Y', 1, NOW(), NOW()),
(2006, 'KEYWORD', 'tw', 'Tangy', 'Y', 1, NOW(), NOW()),
(2007, 'KEYWORD', 'en', 'Rich', 'Y', 1, NOW(), NOW()),
(2007, 'KEYWORD', 'zh', 'Rich', 'Y', 1, NOW(), NOW()),
(2007, 'KEYWORD', 'tw', 'Rich', 'Y', 1, NOW(), NOW()),
(2008, 'KEYWORD', 'en', 'Dry', 'Y', 1, NOW(), NOW()),
(2008, 'KEYWORD', 'zh', 'Dry', 'Y', 1, NOW(), NOW()),
(2008, 'KEYWORD', 'tw', 'Dry', 'Y', 1, NOW(), NOW()),
(2009, 'KEYWORD', 'en', 'Spicy', 'Y', 1, NOW(), NOW()),
(2009, 'KEYWORD', 'zh', 'Spicy', 'Y', 1, NOW(), NOW()),
(2009, 'KEYWORD', 'tw', 'Spicy', 'Y', 1, NOW(), NOW()),
(2010, 'KEYWORD', 'en', 'Chewy', 'Y', 1, NOW(), NOW()),
(2010, 'KEYWORD', 'zh', 'Chewy', 'Y', 1, NOW(), NOW()),
(2010, 'KEYWORD', 'tw', 'Chewy', 'Y', 1, NOW(), NOW()),
(2011, 'KEYWORD', 'en', 'Comforting', 'Y', 1, NOW(), NOW()),
(2011, 'KEYWORD', 'zh', 'Comforting', 'Y', 1, NOW(), NOW()),
(2011, 'KEYWORD', 'tw', 'Comforting', 'Y', 1, NOW(), NOW()),
(2012, 'KEYWORD', 'en', 'Moist', 'Y', 1, NOW(), NOW()),
(2012, 'KEYWORD', 'zh', 'Moist', 'Y', 1, NOW(), NOW()),
(2012, 'KEYWORD', 'tw', 'Moist', 'Y', 1, NOW(), NOW()),
(2013, 'KEYWORD', 'en', 'Salty', 'Y', 1, NOW(), NOW()),
(2013, 'KEYWORD', 'zh', 'Salty', 'Y', 1, NOW(), NOW()),
(2013, 'KEYWORD', 'tw', 'Salty', 'Y', 1, NOW(), NOW()),
(2014, 'KEYWORD', 'en', 'Tough', 'Y', 1, NOW(), NOW()),
(2014, 'KEYWORD', 'zh', 'Tough', 'Y', 1, NOW(), NOW()),
(2014, 'KEYWORD', 'tw', 'Tough', 'Y', 1, NOW(), NOW()),
(2015, 'KEYWORD', 'en', 'Fatty', 'Y', 1, NOW(), NOW()),
(2015, 'KEYWORD', 'zh', 'Fatty', 'Y', 1, NOW(), NOW()),
(2015, 'KEYWORD', 'tw', 'Fatty', 'Y', 1, NOW(), NOW()),
(2016, 'KEYWORD', 'en', 'Smoky', 'Y', 1, NOW(), NOW()),
(2016, 'KEYWORD', 'zh', 'Smoky', 'Y', 1, NOW(), NOW()),
(2016, 'KEYWORD', 'tw', 'Smoky', 'Y', 1, NOW(), NOW()),
(2017, 'KEYWORD', 'en', 'Umami', 'Y', 1, NOW(), NOW()),
(2017, 'KEYWORD', 'zh', 'Umami', 'Y', 1, NOW(), NOW()),
(2017, 'KEYWORD', 'tw', 'Umami', 'Y', 1, NOW(), NOW()),
(2018, 'KEYWORD', 'en', 'Bland', 'Y', 1, NOW(), NOW()),
(2018, 'KEYWORD', 'zh', 'Bland', 'Y', 1, NOW(), NOW()),
(2018, 'KEYWORD', 'tw', 'Bland', 'Y', 1, NOW(), NOW()),
(2019, 'KEYWORD', 'en', 'Fluffy', 'Y', 1, NOW(), NOW()),
(2019, 'KEYWORD', 'zh', 'Fluffy', 'Y', 1, NOW(), NOW()),
(2019, 'KEYWORD', 'tw', 'Fluffy', 'Y', 1, NOW(), NOW()),
(2020, 'KEYWORD', 'en', 'Interesting', 'Y', 1, NOW(), NOW()),
(2020, 'KEYWORD', 'zh', 'Interesting', 'Y', 1, NOW(), NOW()),
(2020, 'KEYWORD', 'tw', 'Interesting', 'Y', 1, NOW(), NOW()),
(2021, 'KEYWORD', 'en', 'Bitter', 'Y', 1, NOW(), NOW()),
(2021, 'KEYWORD', 'zh', 'Bitter', 'Y', 1, NOW(), NOW()),
(2021, 'KEYWORD', 'tw', 'Bitter', 'Y', 1, NOW(), NOW()),
(2022, 'KEYWORD', 'en', 'Mild', 'Y', 1, NOW(), NOW()),
(2022, 'KEYWORD', 'zh', 'Mild', 'Y', 1, NOW(), NOW()),
(2022, 'KEYWORD', 'tw', 'Mild', 'Y', 1, NOW(), NOW()),
(2023, 'KEYWORD', 'en', 'Crispy', 'Y', 1, NOW(), NOW()),
(2023, 'KEYWORD', 'zh', 'Crispy', 'Y', 1, NOW(), NOW()),
(2023, 'KEYWORD', 'tw', 'Crispy', 'Y', 1, NOW(), NOW()),
(2024, 'KEYWORD', 'en', 'Sticky', 'Y', 1, NOW(), NOW()),
(2024, 'KEYWORD', 'zh', 'Sticky', 'Y', 1, NOW(), NOW()),
(2024, 'KEYWORD', 'tw', 'Sticky', 'Y', 1, NOW(), NOW()),
(2025, 'KEYWORD', 'en', 'Smooth', 'Y', 1, NOW(), NOW()),
(2025, 'KEYWORD', 'zh', 'Smooth', 'Y', 1, NOW(), NOW()),
(2025, 'KEYWORD', 'tw', 'Smooth', 'Y', 1, NOW(), NOW()),
(2026, 'KEYWORD', 'en', 'Boney', 'Y', 1, NOW(), NOW()),
(2026, 'KEYWORD', 'zh', 'Boney', 'Y', 1, NOW(), NOW()),
(2026, 'KEYWORD', 'tw', 'Boney', 'Y', 1, NOW(), NOW()),
(2027, 'KEYWORD', 'en', 'Aromatic', 'Y', 1, NOW(), NOW()),
(2027, 'KEYWORD', 'zh', 'Aromatic', 'Y', 1, NOW(), NOW()),
(2027, 'KEYWORD', 'tw', 'Aromatic', 'Y', 1, NOW(), NOW()),
(2028, 'KEYWORD', 'en', 'Rubbery', 'Y', 1, NOW(), NOW()),
(2028, 'KEYWORD', 'zh', 'Rubbery', 'Y', 1, NOW(), NOW()),
(2028, 'KEYWORD', 'tw', 'Rubbery', 'Y', 1, NOW(), NOW());


INSERT INTO 
foodster.iterm (code, type, language, description, active, modyfied_by, ctime, mtime)
VALUES 
(3001, 'INFOGRAPH', 'en', 'Item Value', 'Y', 1, NOW(), NOW()),
(3002, 'INFOGRAPH', 'en', 'Portion Size', 'Y', 1, NOW(), NOW()),
(3003, 'INFOGRAPH', 'en', 'Presentation', 'Y', 1, NOW(), NOW()),
(3004, 'INFOGRAPH', 'en', 'Uniqueness Factor', 'Y', 1, NOW(), NOW());


INSERT INTO 
foodster.iterm (code, type, language, description, active, modyfied_by, ctime, mtime)
VALUES 
(4001, 'USERALERT', 'en', 'I am close to an item on my hitlist', 'Y', 1, NOW(), NOW()),
(4002, 'USERALERT', 'en', 'Someone upvoted my comment', 'Y', 1, NOW(), NOW()),
(4003, 'USERALERT', 'en', 'Someone buddies me', 'Y', 1, NOW(), NOW()),
(4004, 'USERALERT', 'en', 'A buddy tried more foods than me', 'Y', 1, NOW(), NOW()),
(4005, 'USERALERT', 'en', 'A buddy ranks up', 'Y', 1, NOW(), NOW()),
(4006, 'USERALERT', 'en', 'A buddy tries an item', 'Y', 1, NOW(), NOW()),
(4007, 'USERALERT', 'en', 'A buddy comments on an item', 'Y', 1, NOW(), NOW()),
(4008, 'USERALERT', 'en', 'A buddy adds an item to their hitlist', 'Y', 1, NOW(), NOW());


INSERT INTO 
foodster.iterm (code, type, language, description, active, modyfied_by, ctime, mtime)
VALUES 
(5001, 'USERRANK', 'en', 'Beginner', 'Y', 1, NOW(), NOW());