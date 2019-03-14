<?php
return [
    'servername' => 'http://127.0.0.1/',
    'languages' => [
        'available' => [
        ],
        'default' => 'fr',
    ],
    'main' => [
        'maintenance' => false,
        'key' => 'k6SXqKaMI18KqILa',
        'api_require_ssl' => true,
        'database' => [
            'host' => 'db',
            'port' => '3306',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'db',
            'driver' => 'pdo_mysql',
            'charset' => 'UTF8',
        ],
        'database-test' => [
            'driver' => 'pdo_sqlite',
            'path' => '/tmp/db.sqlite',
            'charset' => 'UTF8',
        ],
        'cache' => [
            'type' => 'ArrayCache',
            'options' => [
            ],
        ],
        'search-engine' => [
            'type' => 'elasticsearch',
            'options' => [
                'host' => 'elasticsearch',
                'port' => 9200,
                'index' => 'phraseanet_jwdka9r5woc3haws_20181208235115.108836',
                'shards' => 1,
                'replicas' => 1,
                'minScore' => 1,
                'highlight' => false,
                'maxResultWindow' => 500000,
                'populate_order' => 'RECORD_ID',
                'populate_direction' => 'DESC',
                'activeTab' => null,
                'base_aggregate_limit' => 0,
                'collection_aggregate_limit' => 0,
                'doctype_aggregate_limit' => 0,
                'camera_model_aggregate_limit' => 0,
                'iso_aggregate_limit' => 0,
                'aperture_aggregate_limit' => 0,
                'shutterspeed_aggregate_limit' => 0,
                'flashfired_aggregate_limit' => 0,
                'framerate_aggregate_limit' => 0,
                'audiosamplerate_aggregate_limit' => 0,
                'videocodec_aggregate_limit' => 0,
                'audiocodec_aggregate_limit' => 0,
                'orientation_aggregate_limit' => 0,
                'colorspace_aggregate_limit' => 0,
                'mimetype_aggregate_limit' => 0,
            ],
        ],
        'task-manager' => [
            'status' => 'started',
            'enabled' => true,
            'options' => [
                'protocol' => 'tcp',
                'host' => '127.0.0.1',
                'port' => 6660,
                'linger' => 500,
            ],
            'logger' => [
                'max-files' => 10,
                'enabled' => true,
                'level' => 'INFO',
            ],
        ],
        'session' => [
            'type' => 'file',
            'options' => [
            ],
            'ttl' => 86400,
        ],
        'binaries' => [
            'php_binary' => '/usr/local/bin/php',
            'swf_extract_binary' => '/usr/bin/swfextract',
            'pdf2swf_binary' => '',
            'swf_render_binary' => '/usr/bin/swfrender',
            'unoconv_binary' => '/usr/bin/unoconv',
            'ffmpeg_binary' => '/usr/bin/ffmpeg',
            'mp4box_binary' => '/usr/bin/MP4Box',
            'pdftotext_binary' => '/usr/bin/xpdf',
        ],
        'storage' => [
            'subdefs' => '/var/Phraseanet/datas',
            'cache' => '/var/Phraseanet/cache',
            'log' => '/var/Phraseanet/logs',
            'download' => '/var/Phraseanet/tmp/download',
            'lazaret' => '/var/Phraseanet/tmp/lazaret',
            'caption' => '/var/Phraseanet/tmp/caption',
        ],
        'bridge' => [
            'youtube' => [
                'enabled' => false,
                'client_id' => null,
                'client_secret' => null,
                'developer_key' => null,
            ],
            'flickr' => [
                'enabled' => false,
                'client_id' => null,
                'client_secret' => null,
            ],
            'dailymotion' => [
                'enabled' => false,
                'client_id' => null,
                'client_secret' => null,
            ],
        ],
    ],
    'trusted-proxies' => [
    ],
    'debugger' => [
        'allowed-ips' => [
        ],
    ],
    'border-manager' => [
        'enabled' => true,
        'extension-mapping' => [
        ],
        'checkers' => [
            [
                'type' => 'Checker\Sha256',
                'enabled' => true,
            ],
            [
                'type' => 'Checker\UUID',
                'enabled' => true,
            ],
            [
                'type' => 'Checker\Colorspace',
                'enabled' => false,
                'options' => [
                    'colorspaces' => [
                        'cmyk',
                        'grayscale',
                        'rgb',
                    ],
                ],
            ],
            [
                'type' => 'Checker\Dimension',
                'enabled' => false,
                'options' => [
                    'width' => 80,
                    'height' => 160,
                ],
            ],
            [
                'type' => 'Checker\Extension',
                'enabled' => false,
                'options' => [
                    'extensions' => [
                        'jpg',
                        'jpeg',
                        'bmp',
                        'tif',
                        'gif',
                        'png',
                        'pdf',
                        'doc',
                        'odt',
                        'mpg',
                        'mpeg',
                        'mov',
                        'avi',
                        'xls',
                        'flv',
                        'mp3',
                        'mp2',
                    ],
                ],
            ],
            [
                'type' => 'Checker\Filename',
                'enabled' => false,
                'options' => [
                    'sensitive' => true,
                ],
            ],
            [
                'type' => 'Checker\MediaType',
                'enabled' => false,
                'options' => [
                    'mediatypes' => [
                        'Audio',
                        'Document',
                        'Flash',
                        'Image',
                        'Video',
                    ],
                ],
            ],
        ],
    ],
    'authentication' => [
        'auto-create' => [
            'templates' => [
            ],
        ],
        'captcha' => [
            'enabled' => true,
            'trials-before-display' => 9,
        ],
        'providers' => [
            'facebook' => [
                'enabled' => false,
                'options' => [
                    'app-id' => '',
                    'secret' => '',
                ],
            ],
            'twitter' => [
                'enabled' => false,
                'options' => [
                    'consumer-key' => '',
                    'consumer-secret' => '',
                ],
            ],
            'google-plus' => [
                'enabled' => false,
                'options' => [
                    'client-id' => '',
                    'client-secret' => '',
                ],
            ],
            'github' => [
                'enabled' => false,
                'options' => [
                    'client-id' => '',
                    'client-secret' => '',
                ],
            ],
            'viadeo' => [
                'enabled' => false,
                'options' => [
                    'client-id' => '',
                    'client-secret' => '',
                ],
            ],
            'linkedin' => [
                'enabled' => false,
                'options' => [
                    'client-id' => '',
                    'client-secret' => '',
                ],
            ],
        ],
    ],
    'registration-fields' => [
        [
            'name' => 'company',
            'required' => true,
        ],
        [
            'name' => 'lastname',
            'required' => true,
        ],
        [
            'name' => 'firstname',
            'required' => true,
        ],
        [
            'name' => 'geonameid',
            'required' => true,
        ],
    ],
    'xsendfile' => [
        'enabled' => false,
        'type' => 'nginx',
        'mapping' => [
        ],
    ],
    'h264-pseudo-streaming' => [
        'enabled' => false,
        'type' => 'nginx',
        'mapping' => [
        ],
    ],
    'plugins' => [
    ],
    'api_cors' => [
        'enabled' => false,
        'allow_credentials' => false,
        'allow_origin' => [
        ],
        'allow_headers' => [
        ],
        'allow_methods' => [
        ],
        'expose_headers' => [
        ],
        'max_age' => 0,
        'hosts' => [
        ],
    ],
    'session' => [
        'idle' => 0,
        'lifetime' => 604800,
    ],
    'crossdomain' => [
        'allow-access-from' => [
            [
                'domain' => '*.cooliris.com',
                'secure' => 'false',
            ],
        ],
    ],
    'embed_bundle' => [
        'video' => [
            'player' => 'videojs',
            'autoplay' => false,
            'coverSubdef' => 'thumbnail',
            'available-speeds' => [
                1,
                '1.5',
                3,
            ],
        ],
        'audio' => [
            'player' => 'videojs',
            'autoplay' => false,
        ],
        'document' => [
            'player' => 'flexpaper',
            'enable-pdfjs' => true,
        ],
    ],
    'registry' => [
        'general' => [
            'title' => 'Phraseanet',
            'keywords' => null,
            'description' => null,
            'analytics' => null,
            'allow-indexation' => true,
            'home-presentation-mode' => 'GALLERIA',
            'default-subdef-url-ttl' => 7200,
        ],
        'modules' => [
            'thesaurus' => true,
            'stories' => true,
            'doc-substitution' => true,
            'thumb-substitution' => true,
            'anonymous-report' => false,
        ],
        'actions' => [
            'download-max-size' => 120,
            'validation-reminder-days' => 2,
            'validation-expiration-days' => 10,
            'auth-required-for-export' => true,
            'tou-validation-required-for-export' => false,
            'export-title-choice' => false,
            'default-export-title' => 'title',
            'social-tools' => 'none',
            'enable-push-authentication' => false,
            'force-push-authentication' => false,
            'enable-feed-notification' => true,
            'export-stamp-choice' => false,
            'download-link-validity' => 24,
        ],
        'ftp' => [
            'ftp-enabled' => false,
            'ftp-user-access' => false,
        ],
        'registration' => [
            'auto-select-collections' => true,
            'auto-register-enabled' => false,
        ],
        'maintenance' => [
            'message' => 'The application is down for maintenance',
            'enabled' => false,
        ],
        'api-clients' => [
            'api-enabled' => true,
            'navigator-enabled' => true,
            'office-enabled' => true,
        ],
        'webservices' => [
            'google-charts-enabled' => true,
            'geonames-server' => 'http://geonames.alchemyasp.com/',
            'captchas-enabled' => false,
            'recaptcha-public-key' => '',
            'recaptcha-private-key' => '',
        ],
        'executables' => [
            'h264-streaming-enabled' => false,
            'auth-token-directory' => null,
            'auth-token-directory-path' => null,
            'auth-token-passphrase' => null,
            'php-conf-path' => null,
            'imagine-driver' => '',
            'ffmpeg-threads' => 2,
            'pdf-max-pages' => 5,
        ],
        'searchengine' => [
            'min-letters-truncation' => 1,
            'default-query' => '',
            'default-query-type' => 0,
        ],
        'email' => [
            'emitter-email' => 'phraseanet@example.com',
            'prefix' => null,
            'smtp-enabled' => false,
            'smtp-auth-enabled' => false,
            'smtp-host' => null,
            'smtp-port' => null,
            'smtp-secure-mode' => 'tls',
            'smtp-user' => null,
            'smtp-password' => null,
        ],
        'web-applications' => [
            'email-optional-for-login' => false,
        ],
        'custom-links' => [
            [
                'linkName' => 'Phraseanet store',
                'linkLanguage' => 'fr',
                'linkUrl' => 'https://alchemy.odoo.com/shop',
                'linkLocation' => 'help-menu',
                'linkOrder' => '1',
            ],
            [
                'linkName' => 'Phraseanet store',
                'linkLanguage' => 'en',
                'linkUrl' => 'https://alchemy.odoo.com/en_US/shop',
                'linkLocation' => 'help-menu',
                'linkOrder' => '1',
            ],
        ],
    ],
];
