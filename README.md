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
The search request is also passed if present along with the number of cards request. To preserve a search query.

## Week 3
Added Patches table. This is where information about updates to games is stored. Has a foreign key referencing User table, with null on delete. This is so that a patch stays even if the user who wrote it deletes their account. Also references Games table to link certain patch to a certain game. 
One game can have many patches, one patch belongs to one game. One to Many relationship.

Added Developers table.

Factories created for Games and Patches. 
These allow seeders to generate lots of fake table rows in a given format. I define what columns I want with what kind of fake data and seeder runs N times to make that many rows.
Moved the games I already made in seeder to a separate JSON file to improve readability. 
Now I import this json file and seed with that and the factory.

Patches are collapsible on game show page. Using alpine.js.

Loading animated svg added to images so before they load something still shown to user.