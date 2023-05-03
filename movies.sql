
-- movies.sql: sql file for creating and populating movies table
-- cre. tab.: create movies table
CREATE TABLE movies (
  id INT PRIMARY KEY AUTO_INCREMENT, -- id column with integer type, primary key constraint and auto increment attribute
  title VARCHAR(255) NOT NULL, -- title column with varchar type, 255 length and not null constraint
  genre VARCHAR(255) NOT NULL, -- genre column with varchar type, 255 length and not null constraint
  year INT NOT NULL, -- year column with integer type and not null constraint
  rating DECIMAL(2,1) NOT NULL, -- rating column with decimal type, 2 precision and 1 scale and not null constraint
  country VARCHAR(255) NOT NULL, -- country column with varchar type, 255 length and not null constraint
  plot TEXT NOT NULL, -- plot column with text type and not null constraint
  actors VARCHAR(255) NOT NULL, -- actors column with varchar type, 255 length and not null constraint
  director VARCHAR(255) NOT NULL -- director column with varchar type, 255 length and not null constraint
);
-- pop. tab.: populate movies table with sample data
INSERT INTO movies (title, genre, year, rating, country, plot, actors, director) VALUES 
("The Matrix", "Action,Sci-Fi", 1999, 8.7, "USA", "A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.", "Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss", "Lana Wachowski, Lilly Wachowski"),
("The Godfather", "Crime,Drama", 1972, 9.2, "USA", "An organized crime dynasty's aging patriarch transfers control of his clandestine empire to his reluctant son.", "Marlon Brando, Al Pacino, James Caan", "Francis Ford Coppola"),("The Shawshank Redemption", "Drama", 1994, 9.3, "USA", "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.", "Tim Robbins, Morgan Freeman, Bob Gunton", "Frank Darabont"),
("The Lord of the Rings: The Return of the King", "Adventure,Drama,Fantasy", 2003, 8.9, "New Zealand,USA", "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.", "Elijah Wood, Viggo Mortensen, Ian McKellen", "Peter Jackson"),
("The Dark Knight", "Action,Crime,Drama", 2008, 9.0, "USA,UK", "When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.", "Christian Bale, Heath Ledger, Aaron Eckhart", "Christopher Nolan");