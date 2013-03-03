INSERT INTO `puzzle` (`serial`, `photo`, `hint`, `ans`, `logic`) VALUES ('1', 'resources/images/a.jpg', 'HINT1', 'ANS1', 'LOGIC1');
INSERT INTO `puzzle` (`serial`, `photo`, `hint`, `ans`, `logic`) VALUES ('2', 'resources/images/b.jpg', 'HINT2', 'ANS2 ', 'LOGIC2');
INSERT INTO `puzzle` (`serial`, `photo`, `hint`, `ans`, `logic`) VALUES ('3', 'resources/images/c.jpg', 'HINT3', 'ANS3 ', 'LOGIC3');
INSERT INTO `puzzle` (`serial`, `photo`, `hint`, `ans`, `logic`) VALUES ('4', 'resources/images/d.jpg', 'HINT4', 'ANS4', 'LOGIC4');


SELECT uid,current_puzzle_serial ,last_correct_answer  FROM progress ORDER BY current_puzzle_serial DESC, last_correct_answer ASC;