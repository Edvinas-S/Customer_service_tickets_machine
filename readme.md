# Ticket machine with PHP and MySQL
###### *not fully working ("pic a time" does not work (for now i hope :))

### Features
AS Customer:
1. Choose a specialist (1 of 3);
2. Take a ticket;
3. See how many poeple are waiting to this specialist;
4. Cancel ticket;

AS Specialist:
1. Log in with your credentials to see customers
    (username = spec1, spec2, spec3; password = spec1, spec2, spec3)
2. Invite to meeting;
3. Cancel invitation;
4. Complete/delete ticket;
5. See active ticket to that specialist you login (specialist can have only one active at a time);
6. Enter display board (to see 5 nearest tickets by number of all specialist);
7. Log Out :)

### Instalation
- Clone/save project to the root directory of your local server e.g.(AMPPS, XAMPP);
- if you change the name of folder change defined `path` in folder `includes/` on files `config.php` and `functions.php`;
- Create MySQL database with "waiting_db.sql" dump file provided in dump folder;

#### Author [Edvinas](https://github.com/Edvinas-S)
