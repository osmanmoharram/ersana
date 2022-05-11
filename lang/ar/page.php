<?php

return [
    'dashboard' => 'لوحة التحكم',

    'users' => [
        'index' => [
            'header'=> 'المستخدمون',
            'table' => ['name' => 'الاسم', 'email' => 'البريد الإلكتروني', 'phone' => 'الهاتف', 'role' => 'الدور'],
        ],
        'create'=> ['header' => 'إنشاء مستخدم جديد'],
        'edit' => ['header' => 'تحديث بيانات المستخدم :user'],
        'form' => [
            'name' => ['label' => 'الإسم الكامل', 'placeholder' => 'الرجاء إدخال اسم المستخدم الكامل'],
            'email' => ['label' => 'الإيميل', 'placeholder' => 'user@example.com'],
            'phone' => ['label' => 'الهاتف', 'placeholder' => 'الرجاء كتابة رقم الجوال متضمناً مفتاح البلد'],
            'role' => ['label' => 'الدور', 'placeholder' => 'الرجاء اختيار واحد من الأدوار التالية',],
        ],
        'flash' => [
            'created' => 'تم إنشاء مستخدم جديد',
            'updated' => 'تم تحديث بيانات المستخدم :user',
            'deleted' => 'تم حذف المستخدم :user'
        ],
        'roles' => ['admin' => 'مدير', 'accountant' => 'محاسب', 'employee' => 'موظف']
    ],
    'features' => [
        'index' => ['header' => 'الميزات', 'table' => ['description' => 'الوصف']],
        'create' => ['header' => 'إنشاء ميزة جديدة'],
        'edit' => ['header' => 'تحديث الميزة', ],
        'form' => ['description' => ['label' => 'الوصف', 'placeholder' => 'اكتب شرحا مبسطا لهذه الميزة']],
        'flash' => [
            'created' => 'تم إنشاء ميزة جديدة ',
            'updated' => 'تم تحديث بيانات الميزة',
            'deleted' => 'تم حذف الميزة'
        ]
    ],
    'packages' => [
        'index' => ['header' => 'الباقات'],
        'create' => [ 'header' => 'إنشاء باقة جديدة', ],
        'edit' => ['header' => 'تحديث الباقة :package', ],
        'form' => [
            'name' => ['label' => 'الإسم', 'placeholder' => 'اكتب إسم الباقة هنا.'],
            'features' => ['label' => 'الميزات'],
            'price' => [
                'label' => 'السعر',
                'placeholder' => 'اكتب سعر الباقة هنا.',
                'note' => 'إذا لم يدخل رقم في حقل السعر فسيتم إدخال سعر الباكج صفر تلقائياً'
            ],
        ],
        'flash' => [
            'created' => 'تم إنشاء باقة جديدة ',
            'updated' => 'تم تحديث بيانات الباقة :package',
            'deleted' => 'تم حذف الباقة :package'
        ]
    ],
    'clients' => [
        'index' => [
            'header' => 'العملاء',
            'table' => [
                'name' => 'الاسم',
                'email' => 'البريد الإلكتروني',
                'phone' => 'الهاتف',
                'domain' => 'رابط الموقع',
                'address' => 'عنوان مقر العمل',
                'business_field' => 'مجال العمل'
            ],
        ],
        'create' => ['header' => 'إنشاء عميل جديد'],
        'edit' => ['header' => 'تحديث بيانات العميل :client'],
        'form' => [
            'name' => ['label' => 'الإسم الكامل', 'placeholder' => 'الرجاء إدخال اسم العميل الكامل'],
            'phone' => ['label' => 'الهاتف', 'placeholder' => 'الرجاء كتابة رقم الجوال متضمناً مفتاح البلد'],
            'email' => ['label' => 'البريد الإلكتروني', 'placeholder' => 'client@example.com'],
            'address' => ['label' => 'عنوان مقر العمل', 'placeholder' => 'الرجاء كتابة عنوان مقر العمل'],
            'business-field' => ['label' => 'مجال العمل'],
            'domain' => ['label' => 'رابط الموقع', 'placeholder' => 'ersana.com'],
        ],
        'flash' => [
            'created' => 'تم إنشاء عميل جديد باسم :client',
            'updated' => 'تم تحديث بيانات العميل :client',
            'deleted' => 'تم حذف العميل :client'
        ],
    ],
    'subscriptions' => [
        'index' => [
            'header' => 'الإشتراكات',
            'table' => ['#' => '#', 'package' => 'الباقة', 'client' => 'العميل', 'status' => 'الحالة'],
        ],
        'create' => ['header' => 'إنشاء إشتراك جديد'],
        'edit' => ['header' => 'تحديث بيانات الإشتراك :subscription'],
        'form' => [
            'client' => ['label' => 'العميل', 'placeholder' => 'الرجاء اختيار واحد من العملاء الموجودين.'],
            'package' => ['label' => 'الباقة', 'placeholder' => 'الرجاء اختيار واحدة من الباقات الموجودة.'],
        ],
        'flash' => [
            'created' => 'تم إنشاء إشتراك جديد برقم :subscription',
            'updated' => 'تم تحديث بيانات الإشتراك رقم :subscription',
            'deleted' => 'تم حذف الإشتراك رقم :subscription'
        ],
    ],
    'business-fields' => [
        'index' => ['header' => 'مجالات العمل', 'table' => ['field' => 'المجال', 'type' => 'النوع']],
        'create' => [ 'header' => 'إنشاء مجال عمل جديد', ],
        'edit' => ['header' => 'تحديث بيانات مجال العمل :field'],
        'form' => [
            'title' => ['label' => 'المسمى', 'placeholder' => 'الأعراس والمناسبات'],
            'type' => ['label' => 'النوع', 'placeholder' => 'الرجاء اختيار واحدة من الأنواع الموجودة.'],
        ],
        'flash' => [
            'created' => 'تم إنشاء مجال عمل جديد بمسمى :field',
            'updated' => 'تم تحديث بيانات مجال العمل :field',
            'deleted' => 'تم حذف مجال العمل :field'
        ],
        'types' => ['advertisement' => 'إعلان', 'booking' => 'حجز']
    ],
    'halls' => [
        'index' => [ 'header' => 'القاعات', ],
        'create' => [ 'header' => 'إنشاء قاعة جديدة', ],
        'edit' => ['header' => 'تحديث بيانات القاعة :hall'],
        'form' => [
            'name' => ['label' => 'إسم القاعة', 'placeholder' => 'اسم القاعة'],
            'location' => ['label' => 'الموقع', 'placeholder' => 'المدينة، الحي، اسم أو رقم الشارع'],
            'capacity' => ['label' => 'السعة', 'placeholder' => 'عدد الأشخاص الذين تسعهم القاعة', 'person' => 'شخص'],
            'start_time' => ['label' => 'وقت ابتداء عمل القاعة', 'placeholder' => 'الرجاء اختيار وقت'],
            'end_time' => ['label' => 'وقت انتهاء عمل القاعة', 'placeholder' => 'الرجاء اختيار وقت'],
            'average_time' => ['label' => 'متوسط زمن المناسبة (ساعة)', 'placeholder' => 'الرجاء تحديد زمن المناسبة'],
        ],
        'flash' => [
            'created' => 'تم إنشاء قاعة جديدة باسم :hall',
            'updated' => 'تم تحديث بيانات القاعة :hall',
            'deleted' => 'تم حذف القاعة :hall'
        ],
        'types' => ['wedding' => 'أعراس', 'events' => 'مناسبات', 'theatre' => 'مسرح']
    ],
    'customers' => [
        'index' => [
            'header' => 'أصحاب الحجوزات',
            'table' => [
                'name' => 'الاسم',
                'company' => 'الشركة',
                'email' => 'البريد الإلكتروني',
                'phone' => 'الهاتف',
                'address' => 'العنوان',
            ]
        ],
        'create' => ['header' => 'إنشاء صاحب حجز جديد'],
        'edit' => ['header' => 'تحديث بيانات صاحب الحجز :customer'],
        'form' => [
            'name' => ['label' => 'إسم صاحب الحجز', 'placeholder' => 'الإسم الكامل لمن قام بالحجز'],
            'company' => ['label' => 'الشركة', 'placeholder' => 'الرجاء كتابة إسم الشركة التابعة من قام بالحجز إن وجدت'],
            'email' => ['label' => 'البريد الإلكتروني', 'placeholder' => 'customer@example.com'],
            'phone' => ['label' => 'الهاتف', 'placeholder' => 'الرجاء كتابة رقم هاتف صاحب الحجز'],
            'address' => ['label' => 'العنوان', 'placeholder' => 'الرجاء كتابة عنوان صاحب الحجز',],
        ],
        'flash' => [
            'created' => 'تم إنشاء صاحب حجز جديد باسم :customer',
            'updated' => 'تم تحديث بيانات صاحب الحجز :customer',
            'deleted' => 'تم حذف صاحب الحجز :customer'
        ],
    ],
    'bookings' => [
        'index' => [
            'header' => 'الحجوزات',
            'table' => [
                '#' => '#',
                'customer' => 'إسم صاحب الحجز',
                'start' => 'بداية الحجز',
                'end' => 'انتهاء الحجز',
                'type' => 'نوع الحجز',
                'price' => 'سعر الحجز',
                'status' => 'حالة الحجز'
            ]
        ],
        'create' => ['header' => 'إنشاء حجز جديد'],
        'edit' => ['header' => 'تحديث بيانات الحجز رقم :booking'],
        'form' => [
            'customer' => ['label' => 'إسم صاحب الحجز'],
            'date' => ['label' => 'تاريخ الحجز', 'placeholder' => 'الرجاء اختيار تاريخ'],
            'start_time' => ['label' => 'وقت ابتداء الحجز', 'placeholder' => 'الرجاء اختيار وقت'],
            'end_time' => ['label' => 'وقت انتهاء الحجز', 'placeholder' => 'الرجاء اختيار وقت'],
            'type' => [
                'label' => 'نوع الحجز',
                'items' => [
                    'weddings' => 'أعراس',
                    'events' => 'احتفالات',
                    'occassions' => 'مناسبات'
                ]
            ],
            'guest_type' => [
                'label' => 'نوع الحضور',
                'items' => [
                    'men' => 'رجالي',
                    'women' => 'نسائي',
                    'men_women' => 'رجالي و نسائي'
                ]
            ],
            'food_menu' => ['label' => 'قائمة الطعام'],
            'price_type' => [
                'label' => 'نوع التسعير',
                'items' => [
                    'fixed' => 'ثابت',
                    'individual' => 'بالفرد'
                ]
            ],
            'fixed_price' => ['label' => 'سعر ثابت'],
            'individual_price' => ['label'=> 'سعر الفرد'],
            'number_of_guests' => ['label' => 'عدد الحضور'],
            'discount' => ['label' => 'سعر الخصم'],
            'insurance' => ['label' => 'سعر التأمين'],
            'vat' => ['label' => 'القيمة المضافة'],
            'total' => ['label' => 'الإجمالي'],
            'status' => [
                'label' => 'حالة الحجز',
                'items' => [
                    'confirmed' => 'مؤكد',
                    'temporary' => 'مؤقت',
                ],
            ],
            'notes' => ['label' => 'ملاحظات']
        ],
        'flash' => [
            'created' => 'تم إنشاء حجز جديد برقم :booking',
            'updated' => 'تم تحديث بيانات الحجز رقم :booking',
            'deleted' => 'تم حذف الحجز رقم :booking'
        ],
    ]
];
