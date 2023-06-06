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

    //local é privado
    //public é aberto
    //s3 é a aws s3

    //define o disco em que vamos trabalhar default como o que esta definido em FILESYSTEM_DISK, caso não exista essa constante em .env, usa o que é definido no segundo parametro
    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */
    //discos que podemos trabalhar
    'disks' => [

        //upload para minha propria maquina. são aequivos que estão no projeto mas são arquivos que não estão disponiveis para o usuario. Ex: Arquivos de Configuração
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        //upload para minha propria maquina. são arquivos dospiniveis para os usuarios, até para download. Ex:Imagens
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        //upload para um servidor S3 da Amazon.
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
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

    //você cria links simbolicos de acesso usando artisan storage:link, mas da pra criar aqui na mão e apontar pra uma pasta externa, com isso a
    //chance de você perder documentos quando trocar o codigo no servidor é nula, by Anderson 
    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
