## Monday 22-12-2025
- Installed Laravel Herd and Laravel Breeze and created a new Laravel project.
- Changed the .env file to adjust the app name and app URL.
- Made an ERD:
![ERD.png](_changelog\images\ERD.png)
- Created user stories:
    1. As a visitor, I want to register and log in, so that I can access user-only functionality.
    2. As a user, I want to access protected pages, so that non-authenticated users cannot use restricted features.
    3. As a user, I want to upload my own games, so that other users can see them on the site.
    4. As a user, I want to edit my games, so that I can add new information and such.
    5. As a user, I want to delete my games, so my game is no longer on the website.
    6. As a user, I want to edit only the games that I have uploaded, so that other users cannot modify my content.
    7. As a system, I want to block unauthorized users from editing or deleting items they do not own, even when accessing URLs directly.
    8. As an user, I want to activate or deactivate a game using a button, so that I can control its visibility.
    9. As a user, I want input fields to be validated on the server, so that invalid or incomplete data cannot be submitted.
    10. As a user, I want to see clear validation error messages, so that I know how to correct my input.
    11. As a user, I want to search for indie games using free text, so that I can find games by title or description.
    12. As a user, I want to filter games by genre using filter buttons, so that I can easily narrow down the results.
    13. As a user, I want to combine search and filters, so that I can find specific games more efficiently.
    14. As an administrator, I want to access an admin-only section, so that I can manage games and users.
    15. As an administrator, I want to delete games uploaded by users, so that inappropriate content can be removed.
    16. As an administrator, I want users to be able to submit a review only after logging in on at least five different days, so that spam and low-effort reviews are reduced.
    17. As an administrator, I want to see an overview dashboard, so that I can quickly monitor platform activity.
    18. As an administrator, I do not want visitors to be able to access any user or admin functionality without authentication.
    19. As a user, I want to edit my profile information, so that I can keep my personal data up to date.
    20. As a user, I want to save games as favorites, so that I can easily find them later.
    21. As a user, I want to write reviews for games, so that I can share my opinion with others.
    22. As a user, I want to adjust my reviews, so that I can remove spelling errors.
    23. As a user, I want to delete my reviews, so that I can remove my previous thoughts on the game.
    24. As an administrator, I want to delete reviews by users, so that inappropiate content can be removed.
    25. As a visitor, I want to browse through games, so I can find new games to play.
- Made a global planning:
    - 22-12-2025
        - Laravel project + Git repository.
        - ERD.
        - User stories.
        - Planning.
        - Changelog.
        - Migrations
    - 23-12-2025
        - Login/register
        - Validation
        - Roles
    - 24-12-2025
        - Games CRUD
        - Favorites
    - 27-12-2025
        - Filtering and searching
    - 28-12-2025
        - User settings
        - Admin pages
    - 29-12-2025
        - Turning games on and off
    - 30-12-2025
        - Games reviews CRUD
    - 31-12-2025
        - Deeper validation (5 days login) -> Eloquent
    - 02-01-2026
        - Security (OWASP top 10)
    - 03-01-2026
        - Polish and test
- Made a changelog.
- Made migrations based on my ERD.