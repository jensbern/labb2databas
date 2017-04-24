BEGIN; 
/*(DrugID, Name, Cost)*/
INSERT INTO Drug VALUES
(1, 'Drug1', 10),
(2, 'Drug2', 20),
(3, 'Drug3', 30),
(4, 'Drug4', 40),
(5, 'Drug5', 50),
(6, 'Drug6', 60),
(7, 'Drug7', 70),
(8, 'Drug8', 80),
(9, 'Drug9', 90);

/*(TeamID, LeaderID)*/
INSERT INTO Team VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

/*(Team1, Team2, Team3, Team4, Team5)*/
INSERT INTO EmergencyRoom VALUES
(1),
(2),
(3),
(4),
(5);

/*(issueID, Name)*/
INSERT INTO MedicalIssue VALUES
(1, 'issue1'),
(2, 'issue2'),
(3, 'issue3'),
(4, 'issue4'),
(5, 'issue5'),
(6, 'issue6'),
(7, 'issue7'),
(8, 'issue8'),
(9, 'issue9'),
(10, 'issue10');

/*(ProcedureID, Cost)*/
INSERT INTO Procedure VALUES
('P1a', 10),
('P1b', 10),
('P1c', 10),
('P2a', 20),
('P2b', 20),
('P2c', 20),
('P3a', 30),
('P3b', 30),
('P3c', 30),
('P4a', 40),
('P4b', 40),
('P4c', 40),
('P5a', 50),
('P5b', 50),
('P5c', 50),
('P6a', 60),
('P6b', 60),
('P6c', 60),
('P7a', 70),
('P7b', 70),
('P7c', 70),
('P8a', 80),
('P8b', 80),
('P8c', 80),
('P9a', 90),
('P9b', 90),
('P9c', 90),
('P10a', 100),
('P10b', 100),
('P10c', 100);

/*(IssueID, Procedure1, Procedure2, Procedure3)*/
INSERT INTO Treatment VALUES
(1, 'P1a', 'P1b', 'P1c' ),
(2, 'P2a', 'P2b', 'P2c' ),
(3, 'P3a', 'P3b', 'P3c' ),
(4, 'P4a', 'P4b', 'P4c' ),
(5, 'P5a', 'P5b', 'P5c' ),
(6, 'P6a', 'P6b', 'P6c' ),
(7, 'P7a', 'P7b', 'P7c' ),
(8, 'P8a', 'P8b', 'P8c' ),
(9, 'P9a', 'P9b', 'P9c' ),
(10, 'P10a', 'P10b', 'P10c');
/*(TeamID, Issue1, Issue2, Issue3)
team1 (1, 2, 3)
team2 (3, 4, 5)
team3 (5, 6, 7)
team4 (7, 8, 9)
team5 (8, 9, 10)
*/
INSERT INTO Treats VALUES
(1, 1, 2, 3),
(2, 3, 4, 5),
(3, 5, 6, 7),
(4, 7, 8, 9),
(5, 8, 9, 10);
/*(name, age, PatientID, TeamID, Priority, ArrivalTime, Arrival, AfterTreat, IssueID, Gender)*/
INSERT INTO Patient VALUES
('name1', 20, 1, 1, 4, '2017-09-09 15:30:00', 'Ambulance', null, 1, 'Male' ),
('name2', 10, 2, 1, 3, '2017-09-09 18:30:00', 'Ambulance', null, 2, 'Female' ), 
('name3', 50, 3, 2, 1, '2017-10-09 01:30:12', 'On their own', 'Hospital', 3, 'Other'), 
('name4', 90, 4, 3, 2, '2017-10-09 04:30:12', 'Ambulance', 'Home', 5, 'Other'), 
('name5', 50, 5, 3, 5, '2017-10-09 12:30:12', 'On their own', null, 6, 'Other'), 
('name6', 4, 6, 4, 5, '2017-10-09 22:30:12', 'On their own', null, 8, 'Other');

/*(PatientID, TeamID, Position)*/
INSERT INTO Queue VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1),
(5, 3, 2),
(6, 4, 1);


/*(PatientID, Drug1, Drug2, Drug3)*/
INSERT INTO DrugsTaken VALUES
(1, null, null, null),
(2, 2, 6, null),
(3, 3, 5, 1),
(4, 4, 4, null),
(5, 5, null, null),
(6, 6, 2, null);








COMMIT;