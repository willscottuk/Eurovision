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

We've used this for two years now and v2 is a big backend improvement on 2018.

Steps to make it work:
1. Add the competing countries & their act details into the `countries` database. The Flag column should contain the 2 letter ISO Alpha-2 codes (https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). If you're doing this early (as I normally do) then position at this stage will be `NULL` for all.
2. Edit the 'settings' table to put your values in - there are fields for the year, host country and city as well as your URL and guest wifi details.
3. When the final running order is known, update the `position` column with the running order (where 1 is the first act).
4. The experience is made a lot better by having the "second screen" - I used an old monitor hooked up to my laptop for the 2018 Eurovision. To get to this, you need to go to yourdomain.com/screen
5. During the night, someone needs to let the app know when each song starts. To do this, you need "God Mode" - yourdomain.com/control/god. Just as the song starts, hit the big "next" button and within 5 seconds (see below for how it works) the second screen will update with the 3 minute timer.
6. Once the 3 minute timer elapses, a summary of the votes and comments entered will display on the screen. Make sure to tell people their votes need to be in by the time the song ends!
6. NB - this bit is currently hard-coded so would need to be tweaked if there are more/less than 26 finalists. Once all acts have performed and you've been through the voting for all, God mode will start a 5 minute countdown to the final results - these show the 12, 10, 8, 7, 6, 5, 4, 3, 2, 1 points as if you were a national jury.
8. (There is no step 8 - enjoy!)

## How it works

The control table will increment from default (0,0 - shows the rotating welcome screen) to (1,1 - shows the voting screen for act 1) to (1,2 - shows the result screen for act 1) to (2,1 - voting for act 2) etc.

The screen view (yourdomain.com/screen) uses jquery to ping out every 5 seconds to see if the control table has changed. If it has, it'll refresh to the new display. At the end of the 3 minute voting timer, a status like (2,1) will automatically be updated to (2,2) therefore showing the results.

At the start of a new song, it's up to the user of God Mode to hit that button to move from e.g (2,2) to (3,1).

## Work in progress

TODO:
1. Add emoji support (already changed the databases to UTF-8 in preparation)
2. Add a nicer admin backend
3. Add a way for remote participants to see our voting! Let's make it a bigger thing next year!
