/*Here comes the schema*/


CREATE TABLE Drug
(	DrugID NUMERIC CONSTRAINT DrugKey PRIMARY KEY, 
	DrugName VARCHAR(35),
	Cost NUMERIC CONSTRAINT DrugCost
		CHECK (Cost > 0)
);


CREATE TABLE Team
(	TeamID NUMERIC CONSTRAINT TeamKey PRIMARY KEY, 
	LeaderID NUMERIC NOT NULL UNIQUE
);


CREATE TABLE EmergencyRoom
(	Team1 NUMERIC References Team(TeamID), /*TeamID Från Team*/
	Team2 NUMERIC References Team(TeamID),
	Team3 NUMERIC References Team(TeamID),
	Team4 NUMERIC References Team(TeamID),
	Team5 NUMERIC References Team(TeamID)
);

CREATE TABLE MedicalIssue
(	IssueID NUMERIC CONSTRAINT IssueKey PRIMARY KEY,
	IssueName VARCHAR(32) NOT NULL UNIQUE
);

CREATE TABLE Procedure
(	ProcedureID VARCHAR(4) CONSTRAINT ProcedureKey PRIMARY KEY,
	Cost NUMERIC CONSTRAINT ProcedureCost
		CHECK (Cost > 0)
);

CREATE TABLE Treatment
(	IssueID NUMERIC References MedicalIssue(IssueID),
	ProcedureID1 VARCHAR(4) References Procedure(ProcedureID),
	ProcedureID2 VARCHAR(4) References Procedure(ProcedureID), 
	ProcedureID3 VARCHAR(4) References Procedure(ProcedureID) 
);

CREATE TABLE Treats
(	TeamID NUMERIC References Team(TeamID), 
	IssueID1 NUMERIC References MedicalIssue(IssueID), /*IssueID från MedicalIssue */
	IssueID2 NUMERIC References MedicalIssue(IssueID), 
	IssueID3 NUMERIC References MedicalIssue(IssueID)
);

CREATE TABLE Patient
(Name VARCHAR(50),
	Age NUMERIC CONSTRAINT AgeCheck
		CHECK(Age > 0),
	PatientID NUMERIC CONSTRAINT PatientKey PRIMARY KEY, 
	TeamID NUMERIC References Team(TeamID), /*Motsvarar "med" i ER diagrammet*/
	Priority NUMERIC CONSTRAINT PriorityCheck
		CHECK(Priority <6 and Priority >0), 
	ArrivalTime TIMESTAMP NOT NULL, /* YYYY-MM-DD HH:MI:SS    SELECT DATE(Arrival_time) will return it in the format you appear to want, while still preserving the behavior you want for the column.*/
	Arrival VARCHAR(12) CONSTRAINT ArrivalCheck
		CHECK (Arrival = 'Ambulance' OR Arrival = 'On their own'), 
	AfterTreat VARCHAR(8) CONSTRAINT AfterTreatCheck
		CHECK (AfterTreat = NULL OR AfterTreat = 'Home' OR AfterTreat = 'Hospital'), 
	IssueID NUMERIC References MedicalIssue(IssueID),
	Gender VARCHAR(6) CONSTRAINT GenderCheck
		CHECK (Gender = 'Female' OR Gender = 'Male' OR Gender = 'Other'));


CREATE TABLE Queue
(	PatientID NUMERIC References Patient(PatientID), 
	/*ArrivalTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,*/
	TeamID NUMERIC References Team(TeamID),
	Position NUMERIC CONSTRAINT PositionCheck
		CHECK (Position > 0)
);

CREATE TABLE DrugsTaken
(	PatientID NUMERIC References Patient(PatientID), 
	Drug1 NUMERIC References Drug(DrugID), /*Är ett DrugID från Drugs*/ 
	Drug2 NUMERIC References Drug(DrugID), 
	Drug3 NUMERIC References Drug(DrugID)
);
/*
team1 (1, 2, 3)
team2 (3, 4, 5)
team3 (5, 6, 7)
team4 (7, 8, 9)
team5 (8, 9, 10)
YYYY-MM-DD HH:MI:SS
*/


