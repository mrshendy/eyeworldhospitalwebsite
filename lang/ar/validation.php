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

    'accepted'             => 'يجب قبول :attribute',
    'active_url'           => ':attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون :attribute ًمصفوفة',
    'before'               => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => ':attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'القيمة المحددة :attribute غير موجودة',
    'file'                 => 'الـ :attribute يجب أن يكون ملفا.',
    'filled'               => ':attribute إجباري',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر',
    ],
    'image'                => 'يجب أن يكون :attribute صورةً',
    'in'                   => ':attribute غير موجود',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'                 => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => ':attribute موجود',
    'not_regex'            => 'صيغة :attribute غير صحيحة.',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم :attribute',
    'regex'                => 'صيغة :attribute .غير صحيحة',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ':attribute مطلوب إذا توفّر :values.',
    'required_without'     => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط',
    ],
    'string'               => 'يجب أن يكون :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة :attribute مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'date_field' => [
            'before_or_equal' => 'يجب أن يكون :attribute تاريخًا يساوي أو قبل اليوم.',
        ],
    ],

    'name_required'   =>'الاسم مطلوب',
    'name_uniqe'      =>'هذا الاسم مسجل من قبل',
    'phone_unique'    =>'هذه الهاتف مسجل من قبل',
    'account_number'  =>'الحساب البنكي كسجل من قبل',
    'email_unique'    =>'البريد الالكتروني موجود من قبل',
    'phone_uniqe'     =>'هذا الهاتف  موجود من قبل',
    'password_confirmed'       =>'كلمه المرور غير متطابقه',


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

    'attributes' => [
        'id'                           =>'المعرف',
        'name'                         =>'الاسم',
        'old_password'                => 'كلمه المرور القديمه',
        'password'                    => 'كلمه المرور',
        'password_confirmation'       => 'تاكيد كلمه المرور',
        'phone'                       => 'الهاتف',
        'email'                       => 'البريد الالكتروني',
        'country_code'                => 'كود الدوله',
        'logo'                        => 'الشعار',
        'address'                      => 'العنوان',
        'lat'                          => 'خط العرض',
        'lon'                         => 'خط الطول',
        'otp'                         =>'كود التحقق',
        'argent_price'                =>'سعر المستعجل',
        'price'                       =>'السعر',
        'ar_name'                     =>'الاسم بالعربي',
        'en_name'                     =>'الاسم بالانجليزي',
        'member_id'                   =>'كود العضو',
        'national_id'                 =>'الرقم القومي',
        'mobile'                      =>'الهاتف',
        'syndicate_id'                =>'رقم النقابه',
        'sub_syndicate_id'            =>'رقم اللجنه ',


        'end_work_id'       =>'سبب انهاء الخدمه',
        'birth_date'        =>'تاريخ الميلاد',
        'end_work_date'     =>'تاريخ انهاء الخدمه',
        'register_number'   =>'رقم القيد',
        'sarf_type'         =>'نوع الصرف',
        'file_number'       =>'رقم الملف',
        'dead_member'       =>'عضو متوفي',
        'death_date'        =>'تاريخ الوفاه',
        'not_yasref_reason' =>'سبب عدم الصرف',
        'passport_number'   =>'رقم جواز السفر',
        'sarf_reason'       =>'سبب الصرف',
        'yasref'            =>'يصرف',
        'activate_date'     =>'تاريخ التفعيل',
        'nationality_id'    =>'الجنسيه',
        'inheritor_type'    =>'نوع الوريث',
        'date'              =>'التاريخ',
        'ids'               =>'المعرفات',
        'deserving'         =>'المستحق',
        'deliver_date'      =>'معاد التوصيل',
        'visa_delivery_id'  =>'معرف تسليم التأشيرة',
        'member_status'     =>'حاله العضو',
        'date_from'         =>'تاريخ البدء',
        'date_to'           =>'تاريخ الانتهاء',
        'visa_type'         =>'نوع الفيزا',
        're_print_reason'   =>'سبب اعاده الطباعه',
        'issue_type'        =>'نوع الاصدار',
        'request_id'        =>'معرف الطلب',
        'model'             =>'نموذج',
        'payroll_id'        =>'معرف الصرفيه',
        'payroll_date_from' =>'تاريخ بدء المرتبات',
        'payroll_date_to'   =>'تاريخ انتهاء المرتبات',
        'payroll'           =>'الصرفيه',
        'confirmed'         =>'مؤكد',
        'amount'            =>'الكميه',
        'iteration_number'  =>'رقم التكرار',
        'username'          =>'اسم المستخدم',
        'permissions'       => 'أذونات',
        'member_type'       =>'نوع العضو',
        'visa_id'           =>'معرف الفيزا',
        'role_id'           =>'معرف الدور',
        'date_file_warasa'  =>'تاريخ ملف الورثه',
        'file_number_wrasa' =>'رقم ملف الورثه',
        'payroll_id'        =>'كود دفعه الصرف',
        'to_payroll_id'     =>'الي دفعه صرف',
        'from_payroll_id'   =>'الي دفعه صرف',
        'type'              =>'النوع' ,
        'today'             => 'اليوم',
        'member_statuses'   => 'حاله العضو ',
        'inheritor_id'      =>'معرف الوريث',
        'remark' => 'ملاحظات العضو'
    ],

    'General'  => [
        'wrong_data'      =>'لقد ارسلت بيانات خاطئه'
    ],

    'Rules'  => [
        'age'                             =>'سن الرقم القومي غير مطابق لسن لتاريخ الميلاد المدخل',
        'dead_member'     => 'حقل حاله الوفاه يجب ان يكون مفعل لوجود تاريخ وفاه',
        'end_work_date'   =>  'تاريخ انهاء الخدمه يجب ان يكون 60 عام من تاريخ الميلاد',
        'inheritor_national_id_inheritor'=>'هذا الرقم القومي يوجد لوريث اخر',
        'inheritor_national_id_member'=>'هذا الرقم القومي يوجد لعضو اخر',
        'inheritor_mobile_11'            => 'يجب ان يكون رقم الهاتف مكون من 11 رقم',
        'inheritor_mobile_required'            => 'رقم الهاتف مطلوب',
        'threeWordName'             => 'يجب ان يكون الاسم ثلاثي',
        'birth_date'                =>'تاريح الميلاد',
        'death_date'                =>'يوجد خطأ في تاريخ الوفاه  ',
        'death_date_not_equal_end_work_date'  =>'تاريخ الوفاه لا يساوي تاريخ انهاء الخدمه',
    ],

    'inheritor_validation'=>[

        'age'                                  => 'لقد تخطيت السن المسموح بدون سبب استثناء',
        'birthdate_identical_with_national'    => 'تاريخ الميلاد غير متطابق مع الرقم القومي',
        'Exceeding_legal_age'                  => 'لقد تخطيت السن المسموح بدون سبب استثناء',
        'national_id_required'                 =>'الرقم القومي مطلوب',
        'passport_number'                      =>'رقم الجواز مطلوب',
        'syndicate_identical'                  =>'النقابه غير متطابقه',
        'sub_syndicate_identical'              =>'النقابه الفرعيه غير متطابقه',
        'not_yasref_reason_required'           =>'سبب عدم الصرف مطلوب',
        'yasref_reason_required'               =>'سبب الصرف مطلوب',
        'not_yasref_reason_not_nullable'       =>'سبب عدم الصرف لا يمكن ان يكون قيمه فارغه',
        'yasref_reason_not_nullable'           =>'سبب الصرف لا يمكن ان يكون قيمه فارغه',
        'sarf_responsible_required'            =>'المسؤل مطلوب',
        'mobile_required'                      =>'رقم الهاتف مطلوب',
        'more_than_responsible'                =>'لا يمكنك ارسال اكثر من وريث',
        'responsible_id_required'              =>'رقم مسؤل الصرف الزامي'

        ]


];
