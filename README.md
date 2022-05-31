Installation
---------------

### Requirements

`multiplica` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `multiplica`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'_multiplica'` (inside single quotations) to capture the text domain and replace with: `'multiplica'`.
2. Search for `_multiplica_` to capture all the functions names and replace with: `multiplica`.
3. Search for `Text Domain: multiplica` in `style.css` and replace with: `Text Domain: multiplica`.
4. Search for <code>&nbsp;multiplica</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `_multiplica-` to capture prefixed handles and replace with: `multiplica-`.
6. Search for `_MULTIPLICA_` (in uppercase) to capture constants and replace with: `MULTIPLICA`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_multiplica.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using all the tools that come with `multiplica`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`multiplica` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
- `npm run start` : watches all SASS files and recompiles them to css when they change, also with JS files.
- `npm run build` : generates all files for production.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
# multiplica-wp
