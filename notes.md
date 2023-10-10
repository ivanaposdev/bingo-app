### Rules

- The player is given a bingo card
  - 5 columns and 5 rows
  - Each column head has a letter (B, I, N, G, O)
  - Each square in that 5x5 table will receive a randomly generated number
  - Every turn, the game will announce one of the five letters and a new randomly generated number
  - If the player has that letter-number combination, they can cross that square out
  - If every column has at least one square crossed out, the player wins

### Acceptance Criteria

- Build an app from scratch using PHP
- Create a function that can generate unique bingo card for each player
  - should follow bingo game rules in generating the range of associated numbers and characters
- Create a proper UI/UX
- Functionalities should be reusable - following DRY principle
- Players should be able to cross out a square from their bingo cards
- The application should be able to crosscheck / validate if the user input (crossing out the square) is valid

### Development Plan

#### Technologies to be used

- Backend

  - PHP 8
  - Laravel 10

- Frontend

  - React 18

- Database

  - MySQL

#### Steps

- Create a new Laravel project
- Create the database and its relationships
- Run migrations
- Create the models
- Create the controllers
- Create the routes (API)
