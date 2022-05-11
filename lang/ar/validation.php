<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        // Admin Validation Rules
        'name' => [
            'required' => 'يجب تعبئة حقل الإسم.',
            'string' => 'الإسم يجب أن يكون من نوع بيانات نصية',
            'unique' => 'هذا الإسم موجود مسبقاً بالنظام! الرجاء اختيار اسم آخر.',
            'max' => 'أقصى عدد للحروف المسموح بها هو 225'
        ],
        'email' => [
            'required' => 'يجب تعبئة حقل الإيميل.',
            'string' => 'الإيميل يجب أن يكون من نوع بيانات نصية.',
            'email' => 'صيغة الإيميل غير صحيحة.',
            'max:255' => 'أقصى عدد للحروف المسموح بها هو 225',
            'unique' => 'يوجد حساب مسجل مسبقاً بهذا الإيميل! الرجاء كتابة إيميل آخر.'
        ],
        'phone' => [
            'required' => 'يجب تعبئة حقل الهاتف.',
            'string' => 'الهاتف يجب أن يكون من نوع بيانات نصية.',
            'unique' => 'يوجد حساب مسجل مسبقاً بهذا الهاتف! الرجاء كتابة رقم هاتف آخر.',
            'phone' => 'صيغة رقم الهاتف غير صحيحة! الرجاء التأكد منها ثم إدخال الرقم مرة أخرى.'
        ],
        'address' => [
            'required' => 'يجب تعبئة حقل العنوان.',
        ],
        'role' => [
            'required' => 'يجب تعبئة حقل الدور.',
        ],
        'description' => [
            'required' => 'يجب تعبئة حقل الوصف.',
            'string' => 'الوصف يجب أن يكون من نوع بيانات نصية.',
            'unique' => 'هذه الميزة موجودة مسبقاً في النظام! الرجاء إدخال ميزة جديدة.',
        ],
        'photo' => [
            'file' => 'الصورة يجب أن تكون من نوع ملف.',
            'mimes:png,jpg,jpeg' => 'الصورة يجب أن تكون بإحدى الصيغ التالية .png, .jpg, .jpeg'
        ],
        'features' => [
            'required' => 'يجب اختيار ميزة واحدة على الأقل.',
            'exists' => 'الميزات المختارة غير موجودة بالنظام.'
        ],
        'price' => [
            'required' => 'يجب تعبئة حقل السعر.',
            'numeric' => 'السعر يجب أن يكون رقماً.'
        ],
        'domain' => [
            'required' => 'يجب تعبئة حقل رابط الموقع.',
            'string' => 'الوصف يجب أن يكون من نوع بيانات نصية.'
        ],
        'client' => [
            'required' => 'يجب اختيار عميل.',
            'exists' => 'العميل المختار غير موجود بالنظام.'
        ],
        'package' => [
            'required' => 'يجب اختيار باقة.',
            'exists' => 'الباقة المختارة غير موجودة بالنظام.'
        ],

        // Client validation Rules
        'customer_id' => [
            'required' => 'يجب اختيار صاحب حجز من القائمة',
            'exists' => 'صاحب الحجز المختار غير موجود في قاعدة البيانات'
        ],
        'start_date' => [
            'required' => 'يجب اختيار تاريخ',
            'date' => 'تاريخ البداية يجب أن يكون من نوع تاريخ',
            'after' => 'تاريخ بداية الحجز يجب أن يكون بعد تاريخ اليوم'
        ],
        'end_date' => [
            'required' => 'يجب اختيار تاريخ',
            'date' => 'تاريخ الانتهاء يجب أن يكون من نوع تاريخ',
            'after' => 'تاريخ انتهاء الحجز يجب أن يكون بعد تاريخ بداية الحجز'
        ],
        'type' => ['required' => 'يجب اختيار نوع الحجز'],
        'guest_type' => ['required' => 'يجب اختيار نوع الحضور'],
        'food_menu' => ['required' => 'يجب اختيار قائمة الطعام'],
        'price_type' => [
            'required' => 'يجب تحديد نوع التسعير',
            'in' => 'هذا النوع من التسعير غير موجود في القائمة'
        ],
        'discount' => ['numeric' => 'قيمة سعر الخصم يجب أن تكون من نوع رقم'],
        'insurance' => ['numeric' => 'قيمة التأمين يجب أن تكون من نوع رقم'],
        'vat' => [
            'required' => 'يجب تحديد قيمة الضريبة',
            'numeric' => 'قيمة الضريبة يجب أن تكون من نوع رقم'
        ],
        'total' => [
            'required' => 'يجب إدخال إجمالي الحجز',
            'numeric' => 'قيمة الإجمالي يجب أن تكون من نوع رقم',
        ],
        'status' => [
            'required' => 'يجب تحديد حالة الحجز',
            'in' => 'حالة الحجز يجب أن تكون واحدة من الحالات المحددة في قائمة الحالات'
        ],
        'notes' => ['string' => 'الملاحظات يجب أن تكون من نوع بيانات نصية']
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
