<?php

use Cake\Cache\Engine\FileEngine;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;

return [
    'Datasources' => [
        /*
         * These configurations should contain permanent settings used
         * by all environments.
         *
         * The values in app_local.php will override any values set here
         * and should be used for local and per-environment configurations.
         *
         * Environment variable based configurations can be loaded here or
         * in app_local.php depending on the applications needs.
         */
        'default' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'timezone' => 'Asia/Tokyo',
            'host' => 'database-local',
            // // 'port' => 'non_standard_port_number',
            'username' => 'root',
            'password' => 'password',
            'database' => 'webagre',
            'encoding' => 'utf8',
            /*
             * For MariaDB/MySQL the internal default changed from utf8 to utf8mb4, aka full utf-8 support, in CakePHP 3.6
             */
            //'encoding' => 'utf8mb4',

            /*
             * If your MySQL server is configured with `skip-character-set-client-handshake`
             * then you MUST use the `flags` config to set your charset encoding.
             * For e.g. `'flags' => [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4']`
             */
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,

            /*
             * Set identifier quoting to true if you are using reserved words or
             * special characters in your table or column names. Enabling this
             * setting will result in queries built using the Query Builder having
             * identifiers quoted when creating SQL. It should be noted that this
             * decreases performance because each query needs to be traversed and
             * manipulated before being executed.
             */
            'quoteIdentifiers' => false,

            /*
             * During development, if using MySQL < 5.6, uncommenting the
             * following line could boost the speed at which schema metadata is
             * fetched from the database. It can also be set directly with the
             * mysql configuration directive 'innodb_stats_on_metadata = 0'
             * which is the recommended value in production environments
             */
            //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
        ],
        'hotel' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'timezone' => 'Asia/Tokyo',
            'host' => 'database-local',
            // // 'port' => 'non_standard_port_number',
            'username' => 'root',
            'password' => 'password',
            'database' => 'hotel',
            'encoding' => 'utf8',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
            'quoteIdentifiers' => false,
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'timezone' => 'Asia/Tokyo',
            'host' => 'database-local',
            // 'port' => 'non_standard_port_number',
            'username' => 'root',
            'password' => 'password',
            'database' => 'test',
            //'encoding' => 'utf8mb4',
            'flags' => [],
            'cacheMetadata' => true,
            'quoteIdentifiers' => false,
            'log' => false,
            //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
        ],
    ],
    'Cache' => [
        'default' => [
            'className' => FileEngine::class,
            'path' => dirname(__DIR__) . '/tmp/cache/',
            'url' => env('CACHE_DEFAULT_URL', null),
        ],

        /*
         * Configure the cache used for general framework caching.
         * Translation cache files are stored with this configuration.
         * Duration will be set to '+2 minutes' in bootstrap.php when debug = true
         * If you set 'className' => 'Null' core cache will be disabled.
         */
        '_cake_core_' => [
            'className' => FileEngine::class,
            'prefix' => 'myapp_cake_core_',
            'path' => dirname(__DIR__) . '/tmp/cache/persistent/',
            'serialize' => true,
            'duration' => '+1 years',
            'url' => env('CACHE_CAKECORE_URL', null),
        ],

        /*
         * Configure the cache for model and datasource caches. This cache
         * configuration is used to store schema descriptions, and table listings
         * in connections.
         * Duration will be set to '+2 minutes' in bootstrap.php when debug = true
         */
        '_cake_model_' => [
            'className' => FileEngine::class,
            'prefix' => 'myapp_cake_model_',
            'path' => dirname(__DIR__)  . '/tmp/cache/models/',
            'serialize' => true,
            'duration' => '+1 years',
            'url' => env('CACHE_CAKEMODEL_URL', null),
        ],

        /*
         * Configure the cache for routes. The cached routes collection is built the
         * first time the routes are processed through `config/routes.php`.
         * Duration will be set to '+2 seconds' in bootstrap.php when debug = true
         */
        '_cake_routes_' => [
            'className' => FileEngine::class,
            'prefix' => 'myapp_cake_routes_',
            'path' => dirname(__DIR__) . '/tmp/cache/',
            'serialize' => true,
            'duration' => '+1 years',
            'url' => env('CACHE_CAKEROUTES_URL', null),
        ],
    ],
    'TableLocations' => [
        'Model/Table',
    ],
];
