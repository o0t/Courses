<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'videos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/videos'),
            'url' => env('APP_URL').'/storage/videos',
            'visibility' => 'public',
        ],


        'texts' => [
            'driver' => 'local',
            'root' => storage_path('app/public/texts'),
            'url' => env('APP_URL').'/storage/texts',
            'visibility' => 'public',
        ],



        'introductory_video' => [
            'driver' => 'local',
            'root' => storage_path('app/public/introductory_video'),
            'url' => env('APP_URL').'/storage/introductory_video',
            'visibility' => 'public',
        ],


        // 's3' => [
        //     'driver' => 's3',
        //     'key' => env('AWS_ACCESS_KEY_ID'),
        //     'secret' => env('AWS_SECRET_ACCESS_KEY'),
        //     'region' => env('AWS_DEFAULT_REGION'),
        //     'bucket' => env('AWS_BUCKET'),
        //     'url' => env('AWS_URL'),
        //     'endpoint' => env('AWS_ENDPOINT'),
        //     'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        // ],


        'minio' => [
            'driver' => 's3',
            'key' => 'm8wvYGGvFzHCnwvqwXQd',
            'secret' => 'fkcasTJvcRRiZYESGC2HCQjCRZ2VViMAq7vx4zyw',
            'region' => 'us-east-1',
            'bucket' => 'raqeeb',
            'endpoint' => 'http://143.42.49.97:9000',
            'use_path_style_endpoint' => true,
            'version' => 'latest',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
