# Comments System with Laravel Livewire

This project implements a real-time comments system using Laravel and Livewire. It allows users to post comments, reply to existing comments, and see updates in real-time without page reloads.

## Features

- Real-time comments posting and updating
- Nested replies
- User authentication
- Pagination

## Screenshots

![screenshot (3)](https://github.com/user-attachments/assets/0f20370a-f8f3-47a4-9834-054f332ea8aa)

![screenshot](https://github.com/user-attachments/assets/65487cb0-1ef1-4e18-9b20-e75971bbc97d)

![screenshot (1)](https://github.com/user-attachments/assets/f1f03b73-bf10-4591-baf5-643463cfc1e9)

![screenshot (2)](https://github.com/user-attachments/assets/73b659f9-b8b3-4f57-946b-d36bc85620d5)


## Requirements

- PHP 8.2+
- Laravel 11.x
- Livewire 3.x
- MySQL 5.7+

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/comments-system-with-laravel-livewire.git
   ```

2. Navigate to the project directory:
   ```
   cd comments-system-with-laravel-livewire
   ```

3. Install dependencies:
   ```
   composer install
   npm install
   ```

4. Copy the `.env.example` file to `.env` and configure your database settings.


5. Run migrations:
   ```
   php artisan migrate
   ```

6. Compile assets:
   ```
   npm run dev
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

## Usage

1. Register a new user account or log in with existing credentials.
2. Navigate to a post or page with comments enabled.
3. Use the comment form to post new comments or reply to existing ones.
4. Comments will update in real-time for all users viewing the page.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
