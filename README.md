# Devart SilverStripe Project
> Base starting project for SS4.x projects

## Getting started
* Copy `.env.example` to `.env` and set the environment variables for your environment
* Ensure that the Webpack browserSync proxy is set to the correct address by modifying `webpack.mix.js`
* Ensure using node version 12 i.e. `nvm use 12`
* Run `npm install` to install the client side dependencies
* Use `npm run watch` to run browsersync with webpack

## Committing your work
* Use `npm run production` every time **before committing your work** to generate production-ready versions of all .js and .css files. *Do not push dev versions of assets*

## Docker
`docker-compose -f "docker-compose.yml" up --build `

Now the app should be running at http://localhost
You may run a dev/build of the site i.e. `http://localhost/dev/build`


if you get permission errors you may need to run `chmod -R 777 public`


### Composer install:

To run a composer install:
`docker compose run --rm silverstripe composer install`

---
You can require future modules as per this example:
`docker compose run --rm silverstripe composer require dnadesign/silverstripe-elemental`

Or composer update:
`docker compose run --rm silverstripe composer update`