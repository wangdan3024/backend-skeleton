<?php

return [
    'adminEmail' => 'admin@example.com',
    'user.passwordResetTokenExpire' => 1800, // 密码重置有效时间
    'uninstall.module.after.droptable' => false,// 卸载模块后是否同步删除相关表
    'api.db.cache.time' => 300, // 是否激活 API 数据库查询缓存，默认 5 分钟（以秒为单位），如果设置为 null 则表示不启用缓存，
    'fromMailAddress' => [
        'admin@example.com' => 'you name',
    ],
    // 微信公众号设置
    'wechat' => require(__DIR__ . '/wechat.php'),
    'modules' => [
        /**
        'app-models-Article' => [
            'id' => 'articles', // 控制器名称（唯一）
            'label' => 'Articles', //  需要翻译的文本（app.php）
            'url' => ['/articles/index'], // 访问 URL
            'activeConditions' => [], // 激活条件，填写控制器 id
            'forceEmbed' => true, // 是否强制显示在控制面板中
        ],
         */
        'System Manage' => [
            'app-models-User' => [
                'id' => 'users',
                'label' => 'Users',
                'url' => ['users/index'],
                'forceEmbed' => true,
            ],
            'app-models-Module' => [
                'id' => 'modules',
                'label' => 'Modules',
                'url' => ['modules/index'],
                'forceEmbed' => true,
            ],
            'app-models-meta' => [
                'id' => 'meta',
                'label' => 'Meta',
                'url' => ['meta/index'],
                'forceEmbed' => true,
            ],
            'app-models-Lookup' => [
                'id' => 'lookups',
                'label' => 'Lookups',
                'url' => ['lookups/form'],
                'forceEmbed' => true,
            ],
            'app-models-Category' => [
                'id' => 'categories',
                'label' => 'Categories',
                'url' => ['categories/index'],
                'forceEmbed' => true,
            ],
            'app-models-Label' => [
                'id' => 'labels',
                'label' => 'Labels',
                'url' => ['labels/index'],
                'forceEmbed' => true,
            ],
            'app-models-FileUploadConfig' => [
                'id' => 'file-upload-config',
                'label' => 'File Upload Configs',
                'url' => ['file-upload-configs/index'],
                'forceEmbed' => true,
            ],
            'app-models-UserGroup' => [
                'id' => 'user-group',
                'label' => 'User Groups',
                'url' => ['user-groups/index'],
                'forceEmbed' => true,
            ],
            'app-models-Member' => [
                'id' => 'member',
                'label' => 'Members',
                'url' => ['members/index'],
                'forceEmbed' => true,
            ],
        ],
    ],
    'gridColumns' => [
        'app-models-Ad' => [
            'space_id',
            'name',
            'url',
            'type',
            'begin_datetime',
            'end_datetime',
            'message',
            'views_count',
            'hits_count',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-AdSpace' => [
            'group_id',
            'alias',
            'name',
            'width',
            'height',
            'description',
            'ads_count',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Album' => [
            'ordering',
            'category_id',
            'group_id',
            'title',
            'short_title',
            'keywords',
            'tags',
            'photos_count',
            'hits_count',
            'status',
            'enabled',
            'task.status',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Article' => [
            'ordering',
            'alias',
            'title',
            'tags',
            'keywords',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-ClassicCase' => [
            'category_id',
            'alias',
            'title',
            'keywords',
            'tags',
            'hits_count',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Download' => [
            'ordering',
            'category_id',
            'group_id',
            'title',
            'tags',
            'keywords',
            'software_support_os',
            'software_copyright_type',
            'software_language',
            'software_version',
            'star_rating',
            'hits_count',
            'downloads_count',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Faq' => [
            'ordering',
            'category_id',
            'title',
            'tags',
            'keywords',
            'hits_count',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Feedback' => [
            'group_id',
            'username',
            'tel',
            'email',
            'title',
            'ip_address',
            'status',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
        'app-models-FriendlyLink' => [
            'ordering',
            'group_id',
            'type',
            'title',
            'description',
            'url',
            'url_open_target',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Lookup' => [
            'label',
            'description',
            'value',
            'return_type',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Meta' => [
            'model_name',
            'name',
            'form_field_type',
            'db_field_type',
            'validator_rule',
            'validator_required',
            'description',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-News' => [
            'ordering',
            'category_id',
            'title',
            'short_title',
            'keywords',
            'tags',
            'author',
            'source',
            'status',
            'enabled',
            'enabled_comment',
            'comments_count',
            'clicks_count',
            'up_count',
            'down_count',
            'published_at',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Product' => [
            'ordering',
            'category_id',
            'sn',
            'name',
            'alias',
            'keywords',
            'tags',
            'price',
            'pictures_count',
            'hits_count',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ],
        'app-models-Video' => [
            'ordering',
            'group_id',
            'category_id',
            'title',
            'short_title',
            'tags',
            'keywords',
            'path_type',
            'hits_count',
            'play_times',
            'status',
            'enabled',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'deleted_by',
            'deleted_at'
        ]
    ],
];
