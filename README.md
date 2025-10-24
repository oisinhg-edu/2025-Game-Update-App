## Week 1/2
Added CRUD functionality

Game title text truncates to ... when page is smaller. 

When editing a game, you now aren't required to upload a new image.

Lots more games added to seeder.

## Week 3
Old images in public folder are now deleted when a game is deleted or when the image is updated from edit page.

Changed site logo from default laravel icon to new game controller svg. 

Working towards adding dark mode toggle. 
Tailwind defaults to reading device/browser theme settings for light/dark. Changed tailwind.config.js to use a manual class toggle instead.

Added button on login page to switch to register page.

Started customising the base url (http://127.0.0.1:8000/) as my home page, removing dashboard in the process.

## Week 4
Logged out users can now view all home page, all games and individual games. They still can't create edit or delete games. Middleware auth grouping added to certain routes in web.php and certain UI elements hidden behind @auth check.

Added new js file, theme.js to check for my data-theme-toggle buttons. When page clicked, checks if clicked on theme button, if so then toggles between dark/light classes. which affects my tailwind. 
Theme toggle button component created and added to navbar.

Navbar sticky.
More dark mode style adjustment.

Welcome page customised with some basic info.
New function created in GameController and linked in web.php to manage the welcome page. Also fetches most recent 3 games from db to populate "recently added games" list on welcome page.

Added search bar. This is part of the navbar.
Searches by creating a sql statement with where query. Returns matching table rows.

Added footer.

Added API call in my games.show page/controller. gets a random quote from a free api.