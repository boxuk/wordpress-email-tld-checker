WordPress Email TLD Checker
===========================

[![Build Status](https://travis-ci.com/boxuk/wordpress-email-tld-checker.svg?token=3rRfYiN6sMupp1z6RpzN&branch=master)](https://travis-ci.com/boxuk/wordpress-email-tld-checker)

A small WordPress plugin to validate email addresses against valid TLDs.

[https://github.com/BoxUk/wordpress-email-tld-checker](https://github.com/BoxUk/wordpress-email-tld-checker)

[License](LICENSE)


Installation
------------

Installation is handled via [Composer](http://getcomposer.org).

```bash
composer require boxuk/wordpress-email-tld-checker
```

> Make sure you have [composer/installers](https://github.com/composer/installers) configured to install within the plugins dir.

Activate the plugin.

```bash
wp plugin activate wordpress-email-tld-checker
```

> Or via the plugins section of the admin UI.

Usage
-----

Once the plugin is activated, an email validation (`is_email()`) will now check that the TLD (the .com bit for example) is valid according to [the official IANA database](https://www.iana.org/domains/root/db).
