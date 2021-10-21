# PAYMENTS #

### Web Port:`8060` | MongoDB Port:`27060` (no Auth) | Redis Port:`6360` | Debug Port:`10060` 

## Docker Compose Project Setup

1. Clone/pull project.
2. In terminal go to project directory.
3. Add `.env` file (from `.env.dist`) in root directory with:

``HOST_IP=172.17.0.1``
``USER_ID=1000``

    Where USER_IP is your local user uid  (type `id` in linux system to see)

4. Add `/suite/.env.local` (NEVER COMMIT THAT FILE!) by copying content of `/suite/.env` and later overriding specific variables with real values that you will have.
5. Type and run: `docker-compose up`
6. To install dependencies run: `docker-compose run gcp-php-cli /bin/bash`
   and type: `composer install`

WARNING: if it shows:

``Cannot create cache directory /home/php-user/.composer/cache/repo/https---repo.packagist.org/, or directory is not writable. Proceeding without cache.``

Change chown for your local .composer and re-run compose install

    $ sudo chown -R $USER:$GROUP .composer

7. To install assets go to container with node: `docker-compose run gcp-encore /bin/bash`
8. install yarn by typing `yarn`
9. type and run : `yarn encore dev` or `yarn encore dev --watch`
10. In browser go to http://localhost:8060 where project is running.


#### To initialize database with data
in cli container using  `docker-compose run gcp-php-cli /bin/bash`  run

#### Generating encore assets:

encore documentation: `https://symfony.com/doc/current/frontend/encore/simple-example.html`

- Stop and restart encore each time you update your webpack.config.js file:

      $ yarn run encore dev --watch

- DUMPING/UPDATING js routes in public:

       $ bin/console fos:js-routing:dump --format=json --target=public/js/fos_js_routes.json

- updating public on prod:

        yarn encore production

- reformat code to common standards:

         vendor/bin/cs-fixer-fix

##### MongoDB management

in cli container using  `docker-compose run gcp-php-cli /bin/bash` :

- generate indexes:

  bin/console doctrine:mongodb:schema:create --index

## DOCKER:

- rebuild just one container `docker-compose up --build <containerName>` , for example:

        `docker-compose up --build gcp-php-fpm`