ALTER TABLE  `progress` ADD PRIMARY KEY (  `uid` ) ;
UPDATE progress SET current_puzzle_serial=1,finished=0;