#TestCase

Plain PHP and Ajax handling task

MVC pattern is used.
Challenge is in data directory.

### -----------------

Steps for task estimation:
- Make PDO database connection
- Create database with id, year and day text fields
- Create html form with input text
- Make POST request 
- Create Year Model class
- Make function that checks if the Number is Prime
- Make function that gets 30 prime years/numbers looping from the input year till 
30 years are fetched
- Use Carbon library to get the Christmas dates
- Make function that gets the days that is Christmas in words.
- Make save function which saves the refactored POST data to the database with json_encode method used.
- Make validation method that doesn't allow you to input the same year twice.
- Make another ajax.php where you handle the stored data in the database as a JSON object
- Make table-data.js function where you parse the data in the html table.