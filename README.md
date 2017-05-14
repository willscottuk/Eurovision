# Eurovision

A simple Eurovision party / voting app based on [CakePHP](http://cakephp.org).

## Requirements

1. Apache with `mod_rewrite`
2. PHP 5.3 or higher
3. MySQL 4.1 or higher
4. CakePHP requirements: `mcrypt`, `mbstring` and `intl`

## Installation using composer

1. `composer create-project willscottuk/eurovision eurovision`
2. `cd eurovision`
3. `composer install`
4. Run `eurovision.sql` on your database to set up the necessary tables
5. Modify `config/app.php` to include your database details.
6. Set `eurovision/webroot` to be your webroot
7. Go to `yourdomain.com/users/add` to create the admin user.

## Usage

This was used successfully for Eurovision 2017 with a group of about 10 people.

## Things to know

`countries.position` is used to specify the running order. Only countries with a position are included in the user-viewable front-end.

## Work in progress

While this worked well this year, the docs and back-end are definitely a work in progress!