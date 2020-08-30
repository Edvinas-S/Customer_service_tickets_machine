# Ticket machine with PHP and MySQL
###### *not fylly working ("pic a time" does not work (for now i hope :))

### Features
AS Customer:
1. Choose a specialist (1 of 3);
2. Take a ticket;
3. See how many poeple are waiting to this spec;
4. Cancel ticket;

AS Specialist:
1. Log in with your credetials to see customers
    (username = spec1, password = spec1;
     username = spec2, password = spec2;
     username = spec3, password = spec3)
2. Invite to meeteing;
3. Cancel invitation;
4. Complete/delete ticket;
5. See active ticket to you (spec can have only one active at a time);
6. Enter display board (to see 5 nearest ticket by them number of all spec);
7. Log Out :)

### Instalation
- Clone/save project to the root directory of your local server e.g.(AMPPS, XAMPP);
- if you change the name of folder change `path` names in `includes/config.php`;
- Create MySQL database with "waiting_db.sql" dump file provided in dump folder;

#### Author [Edvinas](https://github.com/Edvinas-S)