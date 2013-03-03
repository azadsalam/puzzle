CREATE TABLE user 
(
        uid                  INT NOT NULL AUTO_INCREMENT,
        mail                VARCHAR(50) NOT NULL,
        student_id       VARCHAR(12) NOT NULL ,
        uname              VARCHAR(40) ,
        ulevel               INT ,
        uterm                INT ,
        password 	 VARCHAR(100) NOT NULL,
        PRIMARY KEY(uid)
);

CREATE TABLE puzzle
(
        serial  INT NOT NULL ,
        photo TEXT NOT NULL,
        hint TEXT NOT NULL,
        ans TEXT NOT NULL,
        logic TEXT NOT NULL,
        PRIMARY KEY (serial)
        
);


CREATE TABLE progress
(
    uid INT NOT NULL,
    current_puzzle_serial INT NOT NULL,
    last_correct_answer           TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (uid) REFERENCES user(uid)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
      FOREIGN KEY (current_puzzle_serial) REFERENCES puzzle(serial)
		ON DELETE CASCADE
		ON UPDATE CASCADE

);

CREATE TABLE log
 (
       uid INT NOT NULL,
       puzzle_serial INT NOT NULL,
       given_answer TEXT NOT NULL,
       answer_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      FOREIGN KEY (uid) REFERENCES user(uid)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
      FOREIGN KEY (puzzle_serial) REFERENCES puzzle(serial)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);


ALTER TABLE  `user` CHANGE  `student_id`  `student_id` VARCHAR( 11 ) NOT NULL;
ALTER TABLE progress ADD finished BOOLEAN DEFAULT false;
ALTER TABLE  `user` ADD UNIQUE (
`student_id`
);

ALTER TABLE  `user` ADD UNIQUE (
`mail`
);

ALTER TABLE `progress` CHANGE `current_puzzle_serial` `current_puzzle_serial` INT(11) NOT NULL DEFAULT 1