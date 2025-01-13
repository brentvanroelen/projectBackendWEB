# Movie List Manager

Welcome to the **Movie List Manager** project! This Laravel-based web application allows users to manage their personalized movie lists. Users can track movies they want to see, mark movies they've already watched, and share their reviews and ratings with other users. The platform offers a rich feature set for both regular users and administrators, including user management, content moderation, and dynamic FAQ management.

---

## Features

- **User Authentication**: Secure login and registration.
- **Movie Lists**:
  - Add movies to "To See" and "Seen" lists.
  - Review and rate movies.
  - View other users' movie lists and reviews.
- **Admin Panel**:
  - Manage users, FAQs, and latest movie news.
- **Search Functionality**: Quickly find movies and users.
- **Responsive Design**: A modern interface styled with the help of Copilot.

---

## Installation

1. Clone the repository:
   ```bash
   git clone <repository_url>
   cd <project_directory>
   ```
2. Install dependencies:
   ```bash
   composer install
   
   ```
3. Set up the `.env` file:
   - Add your API key from The Movie Database (TMDB):
   ```env
   TMDB_API_KEY=your_api_key_here
   ```
4. Run migrations and seeders:
   ```bash
   php artisan migrate:fresh --seed
   ```
   

5. Start the application:
   ```bash
   php artisan serve
   ```

---

## API Integration

This application relies heavily on **The Movie Database (TMDB) API** for movie data. To use the TMDB API:

1. Visit [The Movie Database](https://www.themoviedb.org) to obtain an API key.
2. Declare the API key in your `.env` file:
   ```env
   TMDB_API_KEY=your_api_key_here
   ```
3. TMDB API documentation: [TMDB API Docs](https://developers.themoviedb.org/3/getting-started)

---

## Usage

### User Management
- Register a new user account or log in using pre-seeded credentials.
- Access the admin panel (if logged in as an admin) for additional management options.

### Managing Movie Lists
- Add movies to your "To See" or "Seen" lists using search.
- Leave reviews and rate movies.
- Browse other users' reviews and ratings.

### Admin Features
- Create and manage news articles.
- Manage FAQ content.
- View and manage user roles.

---

## Troubleshooting and Debugging

Several issues were resolved during development, with detailed assistance from tools like Copilot and ChatGPT. All the css styling on the site is done with Copilot. Some key solutions include:

- **File Upload and Display**: [Solution Reference](https://chatgpt.com/share/672f439f-3950-8011-9c92-a64ff1149648)
- **GitHub Repository Creation**: [Guide](https://chatgpt.com/share/6784ee38-8e94-8011-9a1e-742745a476fb)
- **CSS Questions and Solutions**: [Styling Reference](https://chatgpt.com/share/672f3e37-d8b4-8011-89cb-964fc5b12a58)

---

## Sources and References

1. The Movie Database API: [TMDB](https://www.themoviedb.org)
2. Laravel Relationships Documentation: [Laravel Docs](https://laravel.com/docs/11.x/eloquent-relationships#one-to-one)
3. Client-side Form Validation: [MDN Web Docs](https://developer.mozilla.org/en-US/docs/Learn/Forms/Form_validation)
4. Debugging and Support:
   - [FAQ and Contact Assistance](https://chatgpt.com/share/674ae76d-0d1c-8011-b5f7-f386ab214d2c)
   - [File Upload Display](https://chatgpt.com/share/672f439f-3950-8011-9c92-a64ff1149648)
   - [CSS and Styling](https://chatgpt.com/share/673382e6-cd34-8011-8474-a1129cc7ec59)
5. GitHub Commands Help: [GitHub Creation](https://chatgpt.com/share/6784ee38-8e94-8011-9a1e-742745a476fb)
6. Database Commands: [Artisan Migrations](https://www.educative.io/answers/what-are-the-most-used-artisan-commands-for-migration-in-laravel)
7. Password Reset and Search Bar Assistance:
   - [Password Reset Guide](https://chatgpt.com/share/6784ecff-0c7c-8011-a988-7bf87712c23)
   - [Search Functionality](https://chatgpt.com/share/6784eced-b838-8011-a62c-abff06f0fb0a)

---

Thank you for using Movie List Manager! We hope it enhances your movie-watching experience.

