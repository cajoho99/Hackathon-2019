CREATE TABLE Users(
    name VARCHAR(32) PRIMARY KEY NOT NULL,
    password CHAR(64) NOT NULL,
    score INTEGER
);

CREATE TABLE Courses(
    code VARCHAR(10) PRIMARY KEY,
    name VARCHAR(64),
    description TEXT
);

CREATE TABLE Posts(
    id SERIAL,
    course VARCHAR(64),
    title TEXT NOT NULL,
    score INTEGER NOT NULL,
    FOREIGN KEY (course) REFERENCES Courses(name),
    PRIMARY KEY (id, course)
);

CREATE TABLE Comments(
    id SERIAL,
    user VARCHAR(32),
    postID BIGINT UNSIGNED,
    score INT,
    postCourse VARCHAR(32),
    PRIMARY KEY (id, user),
    FOREIGN KEY (user) REFERENCES Users(name),
    FOREIGN KEY (postID, postCourse) REFERENCES Posts(id, course)
);