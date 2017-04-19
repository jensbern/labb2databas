/*Here comes the schema*/

CREATE TABLE Patient
(	
	Name VARCHAR(50),
	Age NUMERIC CONSTRAINT AgeCheck
		CHECK(Age > 0),
	PatientID NUMERIC CONSTRAINT PatientKey PRIMARY KEY AUTOINCREMENT, 
	TeamID NUMERIC NOT NULL UNIQUE, /*Motsvarar "med" i ER diagrammet*/
	Priority NUMERIC CONSTRAINT PriorityCheck
		CHECK(Priority <6 and Priority >0), 
	ArrivalTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, /* SELECT DATE(Arrival_time) will return it in the format you appear to want, while still preserving the behavior you want for the column.*/
	Arrival VARCHAR(12) CONSTRAINT ArrivalCheck
		CHECK (Arrival = 'Ambulance' OR Arrival = 'On their own'), 
	AfterTreat VARCHAR(4) CONSTRAINT AfterTreatCheck
		CHECK (AfterTreat = NULL OR AfterTreat = 'Home' OR AfterTreat = 'Hospital'), 
	IssueID NUMERIC NOT NULL,
	Gender VARCHAR(6) CONSTRAINT GenderCheck
		CHECK (Gender = 'Female' OR Gender = 'Male' OR Gender = 'Other')
);

CREATE TABLE DrugsTaken
(	PatientID NUMERIC CONSTRAINT PatientKey PRIMARY KEY, 
	Drug1 NUMERIC, /*Är ett DrugID från Drugs*/ 
	Drug2 NUMERIC, 
	Drug3 NUMERIC
);

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

CREATE TABLE Queue
(	PatientID NUMERIC CONSTRAINT PatientKey PRIMARY KEY, 
	Priority NUMERIC CONSTRAINT PriorityCheck
		CHECK(Priority <6 and Priority >0),
	/*ArrivalTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,*/
	TeamID NUMERIC NOT NULL,
	Position NUMERIC CONSTRAINT PositionCheck
		CHECK (Position > 0)
);

CREATE TABLE EmergencyRoom
(	Team1 NUMERIC, /*TeamID Från Team*/
	Team2 NUMERIC,
	Team3 NUMERIC,
	Team4 NUMERIC,
	Team5 NUMERIC
);

CREATE TABLE Treats
(	TeamID NUMERIC CONSTRAINT TeamKey PRIMARY KEY, 
	IssueID1 NUMERIC, /*IssueID från MedicalIssue */
	IssueID2 NUMERIC, 
	IssueID3 NUMERIC
);

CREATE TABLE MedicalIssue
(	IssueID NUMERIC CONSTRAINT IssueKey PRIMARY KEY,
	Treatment VARCHAR(32) NOT NULL UNIQUE, 
	IssueName VARCHAR(32) NOT NULL UNIQUE, 
	Cost NUMERIC CONSTRAINT DrugCost
		CHECK (Cost > 0)

);

BEGIN; 
