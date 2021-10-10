## About Every So Often

A recurring reminder app. You can schedule regular tasks and receive an email notification on the day they come due.

Use case example; remember to change your furnace filter every 4 months.

Tasks can be recurring exactly on schedule, or based on completion of the previous reminder. (ie: I only need to change the furnace filter 3 months *after* the last time.)

Fun fact: This is my first ever *public* project on GitHub!

### Built as part of the first LaraJam!

I heard about [LaraJam.dev](https://app.larajam.dev) hosting a Laravel hack-a-thon with the theme of "Personal Productivity" and jumped in!

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

### Installation

This is a standard Laravel site. You can clone this git and see ['Laravel install documentation'](https://laravel.com/docs/8.x/installation)

The reminders and emails require the work queue to be running (there are two daily tasks), and email configured to be sent properly.

Note: You may need to run  **composer install --ignore-platform-reqs**  as the package goldspecdigital/laravel-eloquent-uuid is wanting PHP 7.3

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
