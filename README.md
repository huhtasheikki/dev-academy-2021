# dev-academy-2021 exercise - Name Application

## How does it work?
- The test environment is run by Docker.
  - docker-compose.yml and Dockerfile are written so that it will automaticly build working test environment.
  - containers used:
    - php for running the php server
    - MySQL for running the database
    - phpmyadmin for possiblity to administrate database
- For the first time the site is opened, it read names.json to MySQL database.
- Default sorting is by popularity (amount). You can choose sorting by name or amount. By clicking the same option second time it starts from the other end.
- You can search how many names there are by writing the name in the field and clicking 'Check the amount'. It will print it.
- The number of names and number of people in the list are dynamic. You should Add Heikki to Dev Academy!

## HOW TO TEST :
Open the cloned folder in terminal and use command:
$> docker-compose up -d

After build is complete, use command and enjoy:
$> open http://localhost


### DOCKER, PHP, MYSQL
