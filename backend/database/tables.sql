CREATE TABLE Users(
    name VARCHAR(32) PRIMARY KEY
);

CREATE TABLE Courses(
    name VARCHAR(32) PRIMARY KEY
);

CREATE TABLE Posts(
    id SERIAL,
    course VARCHAR(32),
    title TEXT NOT NULL,
    score INTEGER NOT NULL,
    FOREIGN KEY (course) REFERENCES Courses(name),
    PRIMARY KEY (id, course)
);

CREATE TABLE Comments(
    id SERIAL,
    user VARCHAR(32),
    postID BIGINT UNSIGNED,
    postCourse VARCHAR(32),
    PRIMARY KEY (id, user),
    FOREIGN KEY (user) REFERENCES Users(name),
    FOREIGN KEY (postID, postCourse) REFERENCES Posts(id, course)
);