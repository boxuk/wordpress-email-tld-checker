WordPress Email TLD Checker
===========================

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

Troubleshooting
---------------

The plugin is designed to be installed with [Composer](http://getcomposer.org) and assumes you are including somewhere the autoloader that comes with composer, if you're not then you may run into some issues. The easiest way to resolve is to include the `autolaod.php` from composer, but failing that you may be able to manually require the following files:

* `$vendor_dir . '/symfony/polyfill-intl-idn/Idn.php'`
* `$vendor_dir . '/symfony/polyfill-intl-idn/bootstrap.php'`
* `$vendor_dir . '/arubacao/tld-checker/src/RootZoneDatabase.php'`
* `$vendor_dir . '/arubacao/tld-checker/src/Validator.php'`

---

Contributing
---

Please do not submit any Pull Requests here. They will be closed.

Please submit your PR here instead: https://github.com/boxuk/wp-packages

This repository is what we call a "subtree split": a read-only subset of that main repository.
We're looking forward to your PR there!
