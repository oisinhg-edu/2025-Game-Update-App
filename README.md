## ERD
<img width="532" height="377" alt="erd" src="https://github.com/user-attachments/assets/437d6a16-cea3-48a5-871e-dcc0e040f526" />


## Week 1
Added new role to user to differentiate admins. 
New seeders created for user and admin accounts.
Added logic to make it so only admins can use crud functionality.

New gate created for permission checks. This allows for specific things e.g creating, updating to have their own permission rules. 
New auth file created in app/providers with gate logic.
Gates created in here.

Middleware edited to use gate.
Custom 403 unauthorized error page created. 

## Week 2
Added pagination.
This uses laravel's built in pagination function. First retrieve all games from the db then use paginate() to tell laravel how many to display per page. 
Defaults to 18 game cards per page.
Selection box created to allow user to choose different number of cards per page.
This value is passed to the gamecontroller in the request in a similar way to how search is handled.


