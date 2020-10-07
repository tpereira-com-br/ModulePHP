CREATE TABLE IF NOT EXISTS Users (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(64),
  `Nome` varchar(64),
  `AccessLevel` varchar(64) DEFAULT 'publico',
  `Pw` varchar(255),
  `RecoveryCode` varchar(255),
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Sessions (
  `SessionID` int(11),
  `PHPsession_id` varchar(64),
  `UserID` int(11),
  `UserIP` varchar(64),
  PRIMARY KEY (`SessionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Logins (
  `LoginID` int(11),
  `UserID` int(11),
  `Pw` varchar(255),
  `Approved` boolean,
  PRIMARY KEY (`LoginID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Raffles (
  `RaffleID` int(11),
  `Title` varchar(64),
  `Description` varchar(255),
  `Numbers` int(11),
  `Awards` varchar(255),
  `Rules` varchar(255),
  `CreationDate` timestamp,
  `ClosingDate` timestamp,
  `Status` varchar(255),
  PRIMARY KEY (`RaffleID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Tickets (
  `TicketID` int(11),
  `Name` varchar(255),
  `E-mail` varchar(32),
  `Phone` varchar(32),
  `CPF` varchar(255),
  `Rules` varchar(255),
  `CreationDate` timestamp,
  `ProofofPaymentDay` timestamp,
  `PayDay` timestamp,
  `Status` varchar(255),
  PRIMARY KEY (`TicketID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS DrawingResults (
  `DrawingResultsID` int(11),
  `TicketID` int(11),
  `Date` timestamp,
  `Number` int(11),
  `Link` varchar(255),
  `Status` varchar(255),
  PRIMARY KEY (`TicketID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;