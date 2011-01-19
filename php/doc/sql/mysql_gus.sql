SET GLOBAL TRANSACTION ISOLATION LEVEL SERIALIZABLE;
SET GLOBAL sql_mode = 'ANSI';
-- virtual table
DROP VIEW if exists gus.group_pages;
-- virtual table
DROP VIEW if exists gus.groups_in;
-- virtual table
DROP VIEW if exists gus.master_roster;
DROP TABLE if exists gus.tbl_rle_guest;
DROP TABLE if exists gus.tbl_rle_description;
DROP TABLE if exists gus.tbl_rl_event;
DROP TABLE if exists gus.tbl_post;
DROP TABLE if exists gus.tbl_page;
DROP TABLE if exists gus.tbl_membership;
DROP TABLE if exists gus.tbl_group;
DROP TABLE if exists gus.tbl_user;

CREATE TABLE gus.tbl_user
(
  u_id        INTEGER      NOT NULL AUTO_INCREMENT,
  f_name      VARCHAR(32)  NOT NULL,
  l_name      VARCHAR(32)  NOT NULL,
  user_name   VARCHAR(128) NOT NULL,
  email       VARCHAR(128) NOT NULL,
  phone       CHAR(10)  NOT NULL,
  pass_word   CHAR(20)  NOT NULL,
  hash_str    CHAR(20)  NOT NULL,
  CONSTRAINT pk_user_id
     PRIMARY KEY (u_id),
  CONSTRAINT unq_user_name
     UNIQUE (user_name),
  CONSTRAINT unq_user_email
     UNIQUE (email)
)
ENGINE = InnoDB;

CREATE TABLE gus.tbl_group
(
  g_id        SMALLINT     NOT NULL AUTO_INCREMENT,
  g_name      VARCHAR(128) NOT NULL,
  acronym     VARCHAR(10)  NOT NULL,
  category    VARCHAR(20)  NOT NULL,
  email       VARCHAR(128) NOT NULL,
  CONSTRAINT pk_group_id
    PRIMARY KEY (g_id),
  CONSTRAINT chk_grp_cat
    CHECK (category IN ('academic', 'honorary',
      'community_service', 'civic_action',
      'cultural', 'ethnic', 'graduate',
      'professional','greek_life', 'career',
      'recreational','sport','special_interest',
      'spiritual','religious'))
)
ENGINE = InnoDB;
-- membership table
-- -----------------
-- usr_id is the user's ID
-- grp_id is the group's ID

-- mem role is the role of the member with respect to the group: member, officer, sponsor
-- Higher level users such as, Information Technology Service or the Associated Students
-- of University of Idaho will get their escalated privaledges granted through GRANTING

-- pk_mem ensures a person is not entered into the same group twice,
--     every membership has both a member and a group

-- fk_mem_grp ensures a
CREATE TABLE gus.tbl_membership
(
  u_id        INTEGER      NOT NULL,
  g_id        SMALLINT     NOT NULL,
  status      VARCHAR(10)  NOT NULL,
  CONSTRAINT pk_membership
      PRIMARY KEY (u_id, g_id),
  CONSTRAINT fk_member
    FOREIGN KEY fk_member_user (u_id)
    REFERENCES tbl_user (u_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_group
    FOREIGN KEY fk_member_group (g_id)
    REFERENCES tbl_group (g_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT status_chk
    CHECK (status IN ('member', 'officer',
                      'sponsor'))
)
ENGINE = InnoDB;

CREATE TABLE gus.tbl_page
(
  p_id        INTEGER      NOT NULL AUTO_INCREMENT,
  url         VARCHAR(255) NOT NULL,
  g_id        SMALLINT     NOT NULL,
  u_id        INTEGER      NOT NULL,
  CONSTRAINT page_pk
     PRIMARY KEY (p_id),
  CONSTRAINT fk_page_group
     FOREIGN KEY fk_page_group (g_id)
       REFERENCES gus.tbl_group (g_id)
         ON DELETE CASCADE
         ON UPDATE CASCADE,
  CONSTRAINT fk_page_owner
     FOREIGN KEY fk_page_owner (u_id)
       REFERENCES gus.tbl_user (u_id)
         ON DELETE CASCADE
         ON UPDATE CASCADE
)
ENGINE = InnoDB;

CREATE TABLE gus.tbl_post
(
  po_id       INTEGER      NOT NULL AUTO_INCREMENT,
  body        VARCHAR(999) NOT NULL,
  parent_id   INTEGER,
  title       VARCHAR(128) NOT NULL,
  instant     TIMESTAMP    NOT NULL,
  category    VARCHAR(6)   NOT NULL,
  p_id        INTEGER      NOT NULL,
  u_id        INTEGER      NOT NULL,
  CONSTRAINT post_pk
    PRIMARY KEY (po_id),
  CONSTRAINT post_type_chk
     CHECK (category IN ('forum', 'topic', 'thread',
                         'post')),
  CONSTRAINT fk_post_author
    FOREIGN KEY fk_post_author (u_id)
      REFERENCES tbl_user (u_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
  CONSTRAINT fk_post_page
    FOREIGN KEY fk_post_page (p_id)
      REFERENCES tbl_page (p_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB;

CREATE TABLE gus.tbl_rl_event
(
  rle_id      INTEGER AUTO_INCREMENT,
  rl_time     TIMESTAMP,
  place       VARCHAR(32),
  summary     VARCHAR(128),
  g_id        SMALLINT,
  u_id        INTEGER,
  CONSTRAINT rl_event_pk
    PRIMARY KEY (rle_id),
  CONSTRAINT fk_rl_group
    FOREIGN KEY fk_rl_group (g_id)
      REFERENCES tbl_group (g_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
  CONSTRAINT fk_rl_coordinator
    FOREIGN KEY fk_rl_coordinator (u_id)
      REFERENCES tbl_user (u_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB;

-- reduce the loading time for searching events
CREATE TABLE gus.tbl_rle_description
(
  rle_id      INTEGER NOT NULL,
  description TEXT NOT NULL,
  CONSTRAINT rle_description_pk
    PRIMARY KEY (rle_id),
  CONSTRAINT fk_rle_description
    FOREIGN KEY fk_rle_description (rle_id)
      REFERENCES tbl_rl_event (rle_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB;

CREATE TABLE gus.tbl_rle_guest
(
  rle_id      INTEGER NOT NULL,
  u_id        INTEGER NOT NULL,
  CONSTRAINT rle_guest_pk
    PRIMARY KEY (rle_id, u_id),
  CONSTRAINT fk_rle_rle
    FOREIGN KEY fk_rle_rle (rle_id)
      REFERENCES tbl_rl_event (rle_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
  CONSTRAINT fk_rle_guest
    FOREIGN KEY fk_rle_guest (u_id)
      REFERENCES tbl_user (u_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB;
CREATE TABLE gus.tbl_email
(
  email_id      INTEGER NOT NULL,
  u_id        INTEGER NOT NULL,
  email_content INTEGER NOT NULL,

  CONSTRAINT rle_guest_pk
    PRIMARY KEY (rle_id, u_id),
  CONSTRAINT fk_rle_rle
    FOREIGN KEY fk_rle_rle (rle_id)
      REFERENCES tbl_rl_event (rle_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
  CONSTRAINT fk_rle_guest
    FOREIGN KEY fk_rle_guest (u_id)
      REFERENCES tbl_user (u_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)
ENGINE = InnoDB;
-- guser columns: id, fname, lname, username, email, phone
INSERT INTO gus.tbl_user (u_id, f_name, l_name, user_name, email, phone) VALUES
('', 'Tyrone', 'Insley', 'insl3318', 'insl3318@vandals.uidaho.edu', '2083014065'),
('', 'Sofia', 'Quarterman', 'quar5690', 'quar5690@vandals.uidaho.edu', '2088854065'),
('', 'Nelson', 'Triche','tric9902', 'tric9902@uidaho.edu', '2088825381'),
('', 'Guy', 'Volker','volk4622', 'volk4622@uidaho.edu', '2088826147'),
('', 'Clayton', 'Sherk','sher1676', 'sher1676@uidaho.edu', '2088829891'),
('', 'Nelson', 'Bamber','bamb6464', 'bamb6464@uidaho.edu', '2088826156'),
('', 'Darren', 'Henne','henn5147', 'henn5147@uidaho.edu', '2088822405'),
('', 'Poplar', 'Poplar','popl9007', 'popl9007@uidaho.edu', '2088822648'),
('', 'Jami', 'Suazo','suaz9038', 'suaz9038@uidaho.edu', '2088826122'),
('', 'Dollie', 'Ackerley','acke7776', 'acke7776@yahoo.com','2088835727');

--    CHECK (grp_cat IN ('academic', 'honorary',
--      'community_service', 'civic_action',
--      'cultural', 'ethnic', 'graduate',
--      'professional','greek_life', 'career',
--      'recreational','sport','special_interest',
--      'spiritual','religious'))

-- ggroup columns: id, name, acronym, category, email
INSERT INTO gus.tbl_group VALUES
('', 'Ambitious Women of Excellence, Strength, Unity, and Motivation',
     'AWESUM', 'special_interest','awesum_ui@yahoo.com'),
('', 'Ecology and Conservation Biology Club', 'ECB',
     'academic', 'nrecb-club@uidaho.edu'),
('', 'Tau Beta Pi', 'TBP', 'honorary','awixom@vandals.uidaho.edu'),
('', 'Lutheran Campus Ministry', 'LCM', 'religious','lcm@ccc.org');

-- gmembership columns: u_id, g_id, status
INSERT INTO gus.tbl_membership VALUES
('1', '4', 'member'),
('1', '2', 'officer'),
('2', '2', 'member'),
('2', '4', 'officer'),
('3', '4', 'member'),
('4', '4','sponsor'),
('5', '2','sponsor'),
('7', '3','sponsor'),
('8', '3', 'officer');

SELECT u.user_name, g.g_name, m.status
  FROM gus.tbl_membership m
    INNER JOIN gus.tbl_group g
    INNER JOIN gus.tbl_user u
      ON g.g_id=m.g_id AND u.u_id=m.u_id;


-- gpage columns: gpage_id, gpage_url, ggroup_id, guser_id
INSERT INTO gus.gpage VALUES
('', 'gus.uidaho.edu/bpa', '3','1'),
('', 'coe.uidaho.edu/uitech', '2','2'),
('', 'gus.uidaho.edu/bpa.forum', '1','3'),
('', 'googlepages.com/uianime', '1','2');

-- gforum columns: id, body, parent_id, title, time,
-- type ENUM('forum', 'topic', 'thread', 'post'), gpage_id, guser_id
INSERT INTO gus.gpost VALUES
('', 'This is a cool forum body', '','Forum: The first title','','forum', '1', '2'),
('', 'Forum body 2'             , '','Title 2 Forum'         ,'','forum', '1', '2'),
('', 'Yet another forum body'   , '','Forum 3'               ,'','forum', '3', '3'),
('', 'Forum body 4'             , '','4th Forum'             ,'','forum', '1', '2');

-- Stored procedures, for more info see http://www.learn-sql-tutorial.com/StoredProcedures.cfm
-- The procedure has two parameters defined @CategoryName, which is required, and @OrdYear, which has a default value of 1998.
-- The stored procedure can be called with the EXEC command:

-- CREATE PROCEDURE SalesByCategory
-- @CategoryName nvarchar(15),
-- @OrdYear int = 1998
-- AS

-- SELECT ProductName, SUM(OD.Quantity * (1-OD.Discount) * OD.UnitPrice) AS TotalPurchase
-- FROM "Order Details" od, Orders o, Products p, Categories c
-- WHERE od.OrderID = o.OrderID
-- AND od.ProductID = p.ProductID
-- AND p.CategoryID = c.CategoryID
-- AND c.CategoryName = @CategoryName
-- AND DATEPART(year,OrderDate) = @OrdYear
-- GROUP BY ProductName
-- ORDER BY ProductName
DELIMITER //
 CREATE PROCEDURE gus.GetAllUsers()
   BEGIN
   SELECT *  FROM gus.tbl_user;
   END //
 DELIMITER ;

-- Discard once figured out
-- Make a table of all usernames in the membership role table

-- Makes a virtual table for fast retrieval of call rosters
CREATE VIEW gus.master_roster AS
   SELECT m.ggroup_id as gid, m.guser_id as uid, gmembership_role as status, guser_fname as fname, guser_lname as lname, guser_email email, guser_phone as phone
      FROM gus.gmembership m
      INNER JOIN gus.guser u
      ON m.guser_id=u.guser_id
      GROUP BY status
      ORDER BY lname;
SELECT * FROM gus.master_roster;

-- Makes a virtual table for fast retrieval of groups a user is in
CREATE VIEW gus.groups_in AS
   SELECT m.guser_id as uid, m.ggroup_id as gid, gmembership_role as status, ggroup_name as group_name, ggroup_email as group_email
   FROM gus.gmembership m
   INNER JOIN gus.ggroup g
   ON m.ggroup_id=g.ggroup_id;

-- Makes a virtual table
CREATE VIEW gus.group_pages AS
   SELECT p.gpage_id as pid, p.gpage_url as url, p.ggroup_id as gid
   FROM gus.gpage p
   INNER JOIN gus.ggroup g
   ON p.ggroup_id=g.ggroup_id;

SELECT * FROM gus.groups_in;
SELECT * FROM gus.group_pages;

