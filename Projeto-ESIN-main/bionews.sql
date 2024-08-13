PRAGMA foreign_keys = ON;
.headers on
.mode columns

DROP TABLE IF EXISTS TagNews;
DROP TABLE IF EXISTS Tag;
DROP TABLE IF EXISTS ReactionNews;
DROP TABLE IF EXISTS ReactionComment;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Report;
DROP TABLE IF EXISTS Save;
DROP TABLE IF EXISTS News;
DROP TABLE IF EXISTS AdmAppeal;
DROP TABLE IF EXISTS Appeal;
DROP TABLE IF EXISTS Banishment;
DROP TABLE IF EXISTS Adm;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Person;

CREATE TABLE Person(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT UNIQUE NOT NULL,
    name TEXT NOT NULL,
    birthdate TEXT NOT NULL,
    phone_number TEXT NOT NULL,
    password TEXT NOT NULL,
    enrollment_date TEXT NOT NULL,
    photo BLOB
);

CREATE TABLE User (
    id INTEGER PRIMARY KEY REFERENCES Person          
);

CREATE TABLE Adm (
    id INTEGER PRIMARY KEY REFERENCES Person          
);

CREATE TABLE Banishment (                  
    id INTEGER PRIMARY KEY AUTOINCREMENT,                 
    end_date TEXT, 
    start_date TEXT, 
    user INTEGER NOT NULL REFERENCES User, 
    adm INTEGER NOT NULL REFERENCES Adm,
    CHECK(end_date IS NULL OR strftime('%s',end_date) > strftime('s%',start_date))
);

CREATE TABLE Appeal (                  
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    text TEXT NOT NULL, 
    status TEXT NOT NULL, 
    banishment INTEGER NOT NULL REFERENCES Banishment,             
    CHECK (status = 'to analyse' OR status = 'rejected' OR status = 'accepted')          
);

CREATE TABLE AdmAppeal (              
    adm INTEGER REFERENCES Adm, 
    appeal INTEGER REFERENCES Appeal,
    PRIMARY KEY(adm, appeal)
);

CREATE TABLE News (              
    id INTEGER PRIMARY KEY AUTOINCREMENT, 
    photo BLOB, 
    publication_date TEXT NOT NULL,  
    title TEXT NOT NULL,
    content TEXT NOT NULL, 
    summary TEXT NOT NULL,
    adm INTEGER NOT NULL REFERENCES Adm
);

CREATE TABLE Save (
    person INTEGER REFERENCES Person, 
    news INTEGER REFERENCES News,
    PRIMARY KEY(person, news)
);

CREATE TABLE Comment (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    publication_date TEXT NOT NULL,
    text TEXT NOT NULL,
    person INTEGER NOT NULL REFERENCES Person,
    news INTEGER NOT NULL REFERENCES News
);

CREATE TABLE Report (
    user INTEGER REFERENCES User,
    comment INTEGER REFERENCES Comment,
    reason TEXT NOT NULL CHECK (reason = 'spam' OR reason = 'sexual activity' OR reason = 'fraud' OR reason = 'hateful speech or symbols' OR reason = 'false information' OR reason = 'bullying or harassment' OR reason = 'violence or dangerous organizations' OR reason = 'intellectual property infringement' OR reason = 'suicide or self-harm'),
    status TEXT NOT NULL CHECK (status = 'to analyse' OR status = 'analysed'),
    PRIMARY KEY (user, comment)
);

CREATE TABLE ReactionNews (
    news INTEGER REFERENCES News, 
    person INTEGER REFERENCES Person,
    type TEXT NOT NULL, 
    PRIMARY KEY(news, person),
    CHECK (type = 'like' OR type = 'dislike' OR type = 'love')
);

CREATE TABLE ReactionComment (
    comment INTEGER REFERENCES Comment, 
    person INTEGER REFERENCES Person,
    type TEXT NOT NULL, 
    PRIMARY KEY(comment, person),
    CHECK (type = 'like' OR type = 'dislike' OR type = 'love') 
    
);

CREATE TABLE Tag(
    name TEXT PRIMARY KEY
);

CREATE TABLE TagNews(
    tag TEXT REFERENCES Tag, 
    news INTEGER REFERENCES News,
    PRIMARY KEY(tag, news)
);




