CREATE TABLE `messages` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`respond_id` INT NULL ,
`from_id` INT NOT NULL ,
`to_id` INT NOT NULL ,
`subject` VARCHAR( 64 ) NOT NULL ,
`message` VARCHAR( 255 ) NOT NULL ,
`location` ENUM( 'inbox', 'sent', 'archived' ) NOT NULL ,
`created` TIMESTAMP NOT NULL
) ENGINE = MYISAM ;
