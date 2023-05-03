# Movie Predictor
This is a PHP script that uses generative filtering and neural network to predict movies based on user input.

## How it works
- The script takes user input as a string and tries to find movies that match the input criteria or keywords.
- The script generates random filters for genre, year, rating and country and applies them to a database of movies.
- The script uses a neural network that is trained on synthetic data to predict the rating and review for each filtered movie.
- The script also parses movie data from IMDb by id or title using IMDb-PHP-API and updates the database with the parsed data.
- The script outputs the predicted movies with their title, rating and review on the screen.

## How to use
- Download or clone this repository to your local machine.
- Create a database named "movies" and import the movies.sql file to populate it with movie data. You can also modify the file to add or remove movies as you like.
- Run the parser.php file on your web server to get movie data from IMDb and update the database. You can also run this file periodically to keep the database updated.
- Run the main.php file on your web server and enter your input in the form.
- Enjoy the predicted movies!

# Прогнозатор фильмов
Это PHP-скрипт, который использует генеративную фильтрацию и нейронную сеть для предсказания фильмов на основе пользовательского ввода.

## Как это работает
- Скрипт принимает пользовательский ввод в виде строки и пытается найти фильмы, которые соответствуют введенным критериям или ключевым словам.
- Скрипт генерирует случайные фильтры по жанру, году, рейтингу и стране и применяет их к базе данных фильмов.
- Скрипт использует нейронную сеть, которая обучается на синтетических данных, чтобы предсказать рейтинг и отзыв для каждого отфильтрованного фильма.
- Скрипт также парсит данные о фильмах с IMDb по id или названию с помощью IMDb-PHP-API и обновляет базу данных с распарсенными данными.
- Скрипт выводит предсказанные фильмы с их названием, рейтингом и отзывом на экран.

## Как использовать
- Скачайте или клонируйте этот репозиторий на свой локальный компьютер.
- Создайте базу данных с именем "movies" и импортируйте файл movies.sql, чтобы заполнить ее данными о фильмах. Вы также можете изменить файл, чтобы добавить или удалить фильмы по своему желанию.
- Запустите файл parser.php на своем веб-сервере, чтобы получить данные о фильмах с IMDb и обновить базу данных. Вы также можете запускать этот файл периодически, чтобы поддерживать базу данных в актуальном состоянии.
- Запустите файл main.php на своем веб-сервере и введите свой ввод в форму.
- Наслаждайтесь предсказанными фильмами!
