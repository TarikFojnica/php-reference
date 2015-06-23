CREATE TABLE users (
user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(30) NOT NULL,
pass CHAR(40) NOT NULL,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(60) NOT NULL,
registration_date DATETIME NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (username),
UNIQUE (email),
INDEX login (pass, email)
) ENGINE = INNODB;

INSERT INTO users (username, pass, first_name, last_name, email, registration_date) VALUES
('jlennon', SHA1('Happin3ss'), 'John', 'Lennon', 'john@beatles.com', NOW()),
('pmccartney', SHA1('letITbe'), 'Paul', 'McCartney', 'paul@beatles.com', NOW()),
('gharrison', SHA1('something'), 'George', 'Harrison', 'george@beatles.com ', NOW()),
('rstarr', SHA1('thisboy'), 'Ringo', 'Starr', 'ringo@beatles.com', NOW()),
('djones', SHA1('fasfd'), 'David', 'Jones', 'davey@monkees.com', NOW()),
('ptork', SHA1('warw'), 'Peter', 'Tork', 'peter@monkees.com', NOW()),
('mdolnez', SHA1('afsa'), 'Micky', 'Dolenz', 'micky@monkees.com ', NOW()),
('mnesmith', SHA1('abdfadf'), 'Mike', 'Nesmith', 'mike@monkees.com', NOW()),
('dsedaris', SHA1('adfwrq'), 'David', 'Sedaris', 'david@authors.com', NOW()),
('nhornby', SHA1('jk78'), 'Nick', 'Hornby', 'nick@authors.com', NOW()),
('hsimpson', SHA1('5srw651'), 'Homer', 'Simpson', 'homer@simpson.com', NOW()),
('msipson', SHA1('ljsa'), 'Marge', 'Simpson', 'marge@simpson.com', NOW()),
('bsimpson', SHA1('pwqojz'), 'Bart', 'Simpson', 'bart@simpson.com', NOW()),
('lsimpson', SHA1('uh6'), 'Lisa', 'Simpson', 'lisa@simpson.com', NOW()),
('maggie', SHA1('plda664'), 'Maggie', 'Simpson', 'maggie@simpson.com', NOW()),
('asimpson', SHA1('qopkrokr65'), 'Abe', 'Simpson', 'abe@simpson.com', NOW());

CREATE TABLE news (
news_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
title VARCHAR(160) NOT NULL,
date DATETIME NOT NULL,
source VARCHAR(100) NOT NULL,
category VARCHAR(50) NOT NULL,
body LONGTEXT NOT NULL,
PRIMARY KEY (news_id)
) ENGINE = INNODB;

SELECT news_id, title, body FROM news ORDER BY date LIMIT 5;

INSERT INTO news (title, date, source, category, body) VALUES
('This is a first news element',
  '2015-10-06 17:00:00',
  'klix.ba',
  'news',
  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque enim dui, accumsan eu consectetur sed, efficitur ac ligula. Nulla ut ligula mauris. Phasellus ac massa sed justo bibendum imperdiet. Praesent cursus mattis risus, ut vehicula odio fringilla ac. Phasellus aliquam blandit nisl. Vivamus dapibus viverra tristique. Phasellus non luctus erat. Ut ultricies arcu non sem aliquet viverra. Duis rutrum diam at vulputate vulputate. Ut sed quam gravida, semper sem quis, commodo elit. Nunc efficitur vitae purus quis vulputate. Nam rutrum risus magna, et porttitor velit placerat ut. Phasellus maximus tincidunt ex ut mollis. In fringilla faucibus lacus, vel tristique felis vulputate nec. Quisque tempus ullamcorper odio. Donec varius quis metus nec sagittis. Curabitur non lacus sed sem porta feugiat. Pellentesque id leo odio. Phasellus et finibus dui. Praesent tincidunt ultrices fringilla. Maecenas lobortis tortor a ultricies ultrices. Suspendisse augue magna, porta sit amet turpis et, aliquet consequat libero. Nullam sit amet lorem vel eros gravida accumsan. Nulla facilisi.'),

('This is a second news element',
  '2015-10-06 18:00:00',
  'klix.ba',
  'news',
  'Morbi consequat, justo ac congue aliquam, mi dolor elementum mauris, et tempus diam ipsum at tellus. Fusce eu vestibulum magna, in malesuada dui. Nam tincidunt urna at facilisis rhoncus. Nam at vulputate lorem. Aenean orci lectus, aliquam eu elit eget, porta semper elit. Aliquam turpis ante, placerat vitae massa id, dapibus fringilla nunc. Duis felis ante, vehicula at tincidunt vel, rhoncus non enim.
  Nullam pretium cursus semper. Praesent lacinia augue lacus.\nPraesent gravida convallis massa a finibus. Aenean consequat convallis malesuada. Sed sed libero nec nibh accumsan cursus. Maecenas rhoncus tristique pharetra. Vestibulum rhoncus lacinia est quis vehicula. Maecenas egestas lectus pulvinar massa eleifend, id ultricies leo molestie. Vestibulum scelerisque pulvinar enim in eleifend. Nullam quis risus vitae augue viverra cursus. Mauris tempor sem sed quam bibendum sagittis.
  Nunc vehicula, sapien posuere tincidunt aliquam, nisl sem semper tortor, in rutrum ex ex vel lectus. Maecenas at ultrices libero, sed malesuada nunc. Aliquam dignissim aliquam sem, at sollicitudin lacus faucibus quis. Pellentesque ac lectus et enim varius luctus. Mauris convallis sodales elit, pretium ornare risus efficitur quis. Morbi sodales sodales ligula sed luctus. Suspendisse potenti.'),

('This is a third news element',
 '2015-10-06 12:00:00',
 'klix.ba',
 'news',
 'Donec id tellus quam. Phasellus dictum nisl sagittis varius blandit. Aliquam sit amet iaculis quam, ut blandit risus. Ut porta auctor dolor, sit amet tristique purus interdum non. Vivamus non ipsum lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent quis nulla mollis, pretium risus quis, ornare orci.
 Pellentesque molestie sodales metus, nec dictum mi porttitor non. Pellentesque ornare ut velit id commodo. Etiam viverra urna id elit pretium tempus. Aliquam eleifend, nulla eu volutpat condimentum, nibh nunc maximus magna, sed fermentum metus mauris et eros. Curabitur vel posuere libero. Donec eu enim et felis finibus porta.
 Ut pretium ante eget pharetra lobortis. Quisque eget nunc ultrices urna semper dictum. Sed porta lacus nulla. Fusce rhoncus consectetur mauris, ut porta diam porttitor ut. Aliquam dictum accumsan magna, eget porttitor turpis efficitur vel. Fusce vestibulum tellus eu purus luctus dapibus. Donec sit amet volutpat ligula. Suspendisse pulvinar nisi vitae erat fringilla, in dignissim ipsum interdum. Donec vel sollicitudin metus, id tempus nulla.
 Nullam ipsum augue, pellentesque at quam eget, feugiat vulputate ligula. Cras sed velit eget justo feugiat varius.'),

 ('This is a fourth news element',
  '2015-10-06 19:00:00',
  'klix.ba',
  'news',
  'Nunc ex erat, pulvinar ac erat eu, finibus maximus mauris. Nunc condimentum sit amet mi et viverra. Morbi feugiat faucibus elementum. Aenean vitae diam dapibus dolor volutpat accumsan vitae et augue. Nam non dui euismod, luctus ex eu, congue est. Nunc eu varius erat. Curabitur eu pretium ex. Quisque eu aliquet ante. Praesent non rutrum risus. Vivamus consectetur porttitor ante id molestie. Integer scelerisque mauris mauris.
  Nam eleifend maximus lectus, id rutrum urna facilisis et. Donec id sem tempor, maximus metus sed, fringilla sem. Maecenas lacinia molestie massa, posuere semper dolor tincidunt quis. Nullam hendrerit mauris sapien, et feugiat augue eleifend in. Phasellus leo eros, pretium eget enim sed, mattis condimentum diam. Phasellus non venenatis sapien, dapibus tempor orci. Proin posuere auctor neque sit amet ultrices. Nullam bibendum ut lectus ut tempus. Aliquam leo nisl, vestibulum sed quam id, faucibus tempus eros. Curabitur tristique, purus finibus eleifend facilisis, nibh libero rhoncus felis, ac mollis libero felis vel lacus. Fusce dictum neque ut congue lacinia. Nam non nisi at nulla pellentesque consequat ac at diam.'),

('This is a sixth news element',
  '2015-10-06 20:00:00',
  'klix.ba',
  'news',
  ' Nam eleifend maximus lectus, id rutrum urna facilisis et. Donec id sem tempor, maximus metus sed, fringilla sem. Maecenas lacinia molestie massa, posuere semper dolor tincidunt quis. Nullam hendrerit mauris sapien, et feugiat augue eleifend in. Phasellus leo eros, pretium eget enim sed, mattis condimentum diam. Phasellus non venenatis sapien, dapibus tempor orci.
  Curabitur vitae ex ut mauris volutpat lobortis id a quam. Praesent consectetur lorem in nisl iaculis fringilla. In vestibulum sed diam sit amet sodales. Sed vitae quam eget mi porta accumsan. Nullam ullamcorper dignissim aliquam. Fusce dapibus nisi in enim elementum, sit amet scelerisque ipsum pretium. Phasellus auctor et diam eu cursus. Nunc varius aliquam laoreet. Duis ante est, finibus in lorem at, mattis tincidunt libero. Nam vitae fermentum enim. Nullam sit amet egestas orci. Ut suscipit id quam ac imperdiet. Pellentesque luctus vitae lacus vel dictum.
  Proin finibus purus eu varius tincidunt. Sed nisi ligula, congue vel purus quis, finibus tempus risus. Integer sodales et lectus sollicitudin placerat. Sed interdum nulla quis ullamcorper porttitor. Donec malesuada iaculis pharetra. Nulla tincidunt, nulla in mollis maximus, elit est laoreet justo, convallis blandit eros nisl id elit. In hac habitasse platea dictumst. '),

('This is a fifth news element',
 '2015-10-06 20:00:00',
 'klix.ba',
 'news',
 ' Duis ultrices, velit a molestie convallis, libero nibh aliquam orci, in tristique mauris elit eget dui. Phasellus dui augue, congue in lacinia ac, venenatis ac dui. Nullam iaculis viverra scelerisque.
 Curabitur vitae ex ut mauris volutpat lobortis id a quam. Praesent consectetur lorem in nisl iaculis fringilla. In vestibulum sed diam sit amet sodales. Sed vitae quam eget mi porta accumsan. Nullam ullamcorper dignissim aliquam. Fusce dapibus nisi in enim elementum, sit amet scelerisque ipsum pretium. Phasellus auctor et diam eu cursus. Nunc varius aliquam laoreet. Duis ante est, finibus in lorem at, mattis tincidunt libero. Nam vitae fermentum enim. Nullam sit amet egestas orci. Ut suscipit id quam ac imperdiet. Pellentesque luctus vitae lacus vel dictum.
  Proin finibus purus eu varius tincidunt. Sed nisi ligula, congue vel purus quis, finibus tempus risus. Integer sodales et lectus sollicitudin placerat. Sed interdum nulla quis ullamcorper porttitor. Donec malesuada iaculis pharetra. Nulla tincidunt, nulla in mollis maximus, elit est laoreet justo, convallis blandit eros nisl id elit. In hac habitasse platea dictumst. ');

CREATE TABLE comments (
comment_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
news_id TINYINT UNSIGNED NOT NULL,
user_id MEDIUMINT UNSIGNED NOT NULL,
body LONGTEXT NOT NULL,
date_entered DATETIME NOT NULL,
PRIMARY KEY (comment_id),
INDEX (news_id),
INDEX (user_id),
INDEX (date_entered)
) ENGINE = MYISAM;