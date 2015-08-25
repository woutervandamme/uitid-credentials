# UiTID Credentials.

[![Build Status](https://travis-ci.org/cultuurnet/uitid-credentials.svg?branch=master)](https://travis-ci.org/cultuurnet/uitid-credentials) [![Coverage Status](https://coveralls.io/repos/cultuurnet/uitid-credentials/badge.svg?branch=master&service=github)](https://coveralls.io/github/cultuurnet/uitid-credentials?branch=master)

## Installation

You can install the CultuurNet\uitid-credentials PHP library in different ways:

* Standalone. Clone or download from github and use [Composer][composer]. Run ``composer install`` from
  the root of the clone to download the necessary dependencies. Standalone usage is probably only useful for testing
  purposes.
* Inside your project: require the cultuurnet/uitid-credentials package (it is
  [registered on Packagist][packagist]) and run ``composer update``.

```json
{
    "require": {
        "cultuurnet/uitid-credentials": "~0.1",
    }
}
```

## How it works

This library allows you to interact with the UiTID Auth API, in order to fetch service consumer and access token.
