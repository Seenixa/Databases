CREATE TABLE felhasználók(
	azonosító INT(11) NOT NULL AUTO_INCREMENT,
    név VARCHAR(255) NOT NULL,
    jelszó VARCHAR(255) NOT NULL,
    szerepkör TINYINT(1) NOT NULL DEFAULT 0,
    bejelentkezve BOOLEAN,
    utolsó_belépés_időpontja DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (azonosító)
);

ALTER TABLE felhasználók AUTO_INCREMENT=1000;

CREATE TABLE számlatípusok(
	azonosító INT(11) NOT NULL AUTO_INCREMENT,
    név VARCHAR(255) NOT NULL,
    állapot BOOLEAN NOT NULL DEFAULT TRUE,
    mettől_érvényes DATETIME NOT NULL DEFAULT CURRENT_TIME,
    meddig_érvényes DATETIME NOT NULL DEFAULT '2024-12-31 23:59:59',
    PRIMARY KEY (azonosító)
);

ALTER TABLE számlatípusok AUTO_INCREMENT=3000;

CREATE TABLE folyószámlák(
	számlaszám INT(11) NOT NULL AUTO_INCREMENT,
    zárolva BOOLEAN NOT NULL DEFAULT FALSE,
    egyenleg INT(11) NOT NULL DEFAULT 0,
    mikor_nyitották DATETIME NOT NULL DEFAULT CURRENT_TIME,
    típus_azonosító INT(11) NOT NULL,
    PRIMARY KEY (számlaszám),
    FOREIGN KEY (típus_azonosító) REFERENCES számlatípusok (azonosító)
);

ALTER TABLE folyószámlák AUTO_INCREMENT=2000;

CREATE TABLE utalások(
    azonosító INT(11) NOT NULL AUTO_INCREMENT,
    összeg INT(11) NOT NULL,
    teljesítési_határidő DATE NOT NULL,
    cél_számlaszám INT(11) NOT NULL,
    forrás_számlaszám INT(11) NOT NULL,
    ki_kezdeményezte INT(11) NOT NULL,
    sikerült BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (azonosító),
    FOREIGN KEY (cél_számlaszám) REFERENCES folyószámlák (számlaszám),
    FOREIGN KEY (forrás_számlaszám) REFERENCES folyószámlák (számlaszám),
    FOREIGN KEY (ki_kezdeményezte) REFERENCES felhasználók (azonosító)
);

ALTER TABLE utalások AUTO_INCREMENT=4000;

CREATE TABLE kinek_a_számlája(
    felhasználó_azonosító INT(11) NOT NULL,
    folyószámla_számlaszám INT(11) NOT NULL,
    FOREIGN KEY (felhasználó_azonosító) REFERENCES felhasználók (azonosító),
    FOREIGN KEY (folyószámla_számlaszám) REFERENCES folyószámlák (számlaszám)
);

INSERT INTO felhasználók (név, jelszó) VALUES 
('John Doe', 'VivaLaF'),
('Jane Doe', 'VivaLaFA'),
('Bob Doe', 'VivaLaFB'),
('Kayn Doe', 'VivaLaFC'),
('Rob Doe', 'VivaLaFD'),
('Ray Doe', 'VivaLaFE'),
('Beth Doe', 'VivaLaFF'),
('Mel Doe', 'VivaLaFG'),
('Jay Doe', 'VivaLaFH'),
('Jordan Chase', 'FaFbFcFdFeFfFgFh');

INSERT INTO számlatípusok (név) VALUES
('A típus'),
('B típus'),
('C típus'),
('D típus'),
('E típus'),
('F típus'),
('G típus'),
('H típus'),
('I típus'),
('J típus');

INSERT INTO folyószámlák (típus_azonosító) VALUES
(3000),
(3000),
(3001),
(3002),
(3003),
(3004),
(3005),
(3006),
(3007),
(3008),
(3008),
(3009);

INSERT INTO kinek_a_számlája (felhasználó_azonosító, folyószámla_számlaszám) VALUES
(1000, 2000),
(1000, 2001),
(1001, 2002),
(1002, 2003),
(1003, 2004),
(1004, 2005),
(1005, 2006),
(1006, 2007),
(1007, 2008),
(1008, 2009),
(1009, 2010),
(1009, 2011);

INSERT INTO utalások (összeg, teljesítési_határidő, cél_számlaszám, forrás_számlaszám, ki_kezdeményezte) VALUES
(10000, '2024-03-29', 2000, 2001, 1000),
(10000, '2024-04-29', 2001, 2000, 1000),
(10000, '2024-05-29', 2010, 2002, 1001),
(10000, '2024-06-29', 2007, 2003, 1002),
(10000, '2024-07-29', 2008, 2004, 1003),
(10000, '2024-08-29', 2005, 2005, 1004),
(10000, '2024-09-29', 2004, 2006, 1005),
(10000, '2024-10-29', 2003, 2007, 1006),
(10000, '2024-11-29', 2002, 2008, 1007),
(10000, '2024-12-29', 2001, 2009, 1008),
(10000, '2024-12-29', 2000, 2010, 1009),
(10000, '2024-12-29', 2000, 2011, 1009);