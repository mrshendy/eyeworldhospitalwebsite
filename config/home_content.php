<?php

/*
|--------------------------------------------------------------------------
| Homepage editable content
|--------------------------------------------------------------------------
| Every field below can be edited from the dashboard ("Homepage content").
| `default` is the translation key that was previously hard-coded in the
| homepage template, so the site looks exactly the same until an admin
| changes something.
|
| Field types: text, textarea, lines (one item per line), image, toggle.
| Toggle fields are not translatable (one value for both languages).
*/

return [
    'achievement' => [
        'label' => 'Intro section',
        'fields' => [
            'achievement.pre_title' => ['type' => 'text', 'label' => 'Small title', 'default' => "Egypt's Leading Ophthalmology Center for Advanced Eye Care"],
            'achievement.title' => ['type' => 'text', 'label' => 'Main title', 'default' => 'Dunia Al-Oyoun Hospital: Leading ophthalmology center in Egypt with amazing statistics.'],
            'achievement.desc' => ['type' => 'textarea', 'label' => 'Description', 'default' => 'At Dunia Al-Oyoun Hospital, we are Egypt’s leading ophthalmology center. We specialize in cataract surgery, LASIK, retinal care, and advanced vision health services. Since 2004, we have delivered thousands of successful eye surgeries. We also provide medical examinations. This proves our commitment to premium patient care. We focus on long-term visual health.'],
            'about.image' => ['type' => 'image', 'label' => 'About section image', 'default' => 'siteassets/images/about.webp'],
        ],
    ],

    'counter' => [
        'label' => 'Numbers counter',
        'fields' => [
            'counter.visible' => ['type' => 'toggle', 'label' => 'Show the numbers counter', 'default' => '1'],
            'counter.1.number' => ['type' => 'text', 'label' => 'Number 1', 'default' => '1000+'],
            'counter.1.label' => ['type' => 'text', 'label' => 'Label 1', 'default' => 'Successful surgical procedure.'],
            'counter.2.number' => ['type' => 'text', 'label' => 'Number 2', 'default' => '5000+'],
            'counter.2.label' => ['type' => 'text', 'label' => 'Label 2', 'default' => 'Cataract surgery with utmost precision.'],
            'counter.3.number' => ['type' => 'text', 'label' => 'Number 3', 'default' => '748+'],
            'counter.3.label' => ['type' => 'text', 'label' => 'Label 3', 'default' => 'LASIK surgery for vision correction.'],
            'counter.4.number' => ['type' => 'text', 'label' => 'Number 4', 'default' => '1+'],
            'counter.4.label' => ['type' => 'text', 'label' => 'Label 4', 'default' => 'One million comprehensive medical examinations.'],
        ],
    ],

    'services' => [
        'label' => 'Top care services section',
        'fields' => [
            'services.visible' => ['type' => 'toggle', 'label' => 'Show this section', 'default' => '1'],
            'services.title' => ['type' => 'text', 'label' => 'Title', 'default' => 'TOP CARE SERVICES'],
            'services.para1' => ['type' => 'textarea', 'label' => 'Paragraph 1', 'default' => 'Medical services provided by Dunia Al-Oyoun Hospital, specialized in ophthalmology and eye surgery, offering healthcare for eye patients in diagnostic and therapeutic care, LASIK and laser treatments, and surgical procedures related to eye health and vision.'],
            'services.para2' => ['type' => 'textarea', 'label' => 'Paragraph 2', 'default' => 'It includes a distinguished group of professors and consultants specializing in various ophthalmic fields, such as cataracts, glaucoma, corneal and strabismus surgery, retinal diseases, tear duct and eyelid conditions, cosmetic surgeries, eye tumors, and pediatric retinal tumors (Retinoblastoma).'],
            'services.list_title' => ['type' => 'text', 'label' => 'List title', 'default' => 'In addition to the mentioned ophthalmology services, other services include:'],
            'services.list' => ['type' => 'lines', 'label' => 'Services list (one per line)', 'default' => [
                'Cosmetic surgeries for the face and head.',
                'Oral and maxillofacial surgeries',
                'Dermatology and laser services',
                'Nutrition services',
                'Laboratory services',
                'Pharmacy services',
                'Accommodation services',
                'Other services',
            ]],
            'services.image' => ['type' => 'image', 'label' => 'Background image', 'default' => 'siteassets/images/services.webp'],
        ],
    ],

    'specialties' => [
        'label' => 'Specialties section',
        'fields' => [
            'specialties.visible' => ['type' => 'toggle', 'label' => 'Show this section', 'default' => '1'],
            'specialties.pre_title' => ['type' => 'text', 'label' => 'Small title', 'default' => 'Explore various medical specialties to meet your healthcare needs.'],
            'specialties.title' => ['type' => 'text', 'label' => 'Main title', 'default' => 'Choose the right medical specialty for your health needs from our diverse specialties.'],
            'specialties.desc' => ['type' => 'textarea', 'label' => 'Description', 'default' => 'Description: We offer you a wide range of medical specialties, including ophthalmology, dentistry, dermatology, surgery, and more. Receive comprehensive healthcare from experienced specialists to help you maintain your health and well-being.'],
        ],
    ],

    'conferences' => [
        'label' => 'Conferences section',
        'fields' => [
            'conferences.visible' => ['type' => 'toggle', 'label' => 'Show this section', 'default' => '1'],
            'conferences.pre_title' => ['type' => 'text', 'label' => 'Small title', 'default' => 'Explore our key achievements and participation in medical events and conferences.'],
            'conferences.title' => ['type' => 'text', 'label' => 'Main title', 'default' => ['Our outstanding contributions and achievements in major medical', 'and scientific events and conferences.']],
            'conferences.desc' => ['type' => 'textarea', 'label' => 'Description', 'default' => ['We take pride in our participation in medical events and conferences, where we showcase the latest technologies', 'and share our expertise with the medical community. Our goal is to exchange knowledge and highlight our leadership', 'in ophthalmology and eye surgery through these distinguished events.']],
        ],
    ],

    'app' => [
        'label' => 'Mobile app section',
        'fields' => [
            'app.visible' => ['type' => 'toggle', 'label' => 'Show this section', 'default' => '1'],
            'app.pre_title' => ['type' => 'text', 'label' => 'Small title', 'default' => 'app 1'],
            'app.title' => ['type' => 'text', 'label' => 'Main title', 'default' => 'app 2'],
            'app.desc' => ['type' => 'textarea', 'label' => 'Description', 'default' => 'app 3'],
            'app.image' => ['type' => 'image', 'label' => 'Image', 'default' => 'siteassets/images/experience/main.webp'],
        ],
    ],

    'faq' => [
        'label' => 'FAQ section',
        'fields' => [
            'faq.visible' => ['type' => 'toggle', 'label' => 'Show this section', 'default' => '1'],
            'faq.pre_title' => ['type' => 'text', 'label' => 'Small title', 'default' => 'quetion 1'],
            'faq.title' => ['type' => 'text', 'label' => 'Main title', 'default' => 'quetion 2'],
            'faq.desc' => ['type' => 'textarea', 'label' => 'Description', 'default' => 'quetion 3'],
        ],
    ],

    'partners' => [
        'label' => 'Insurance partners section',
        'fields' => [
            'partners.visible' => ['type' => 'toggle', 'label' => 'Show this section', 'default' => '1'],
            'partners.pre_title' => ['type' => 'text', 'label' => 'Small title', 'default' => 'Our trusted partners'],
            'partners.title' => ['type' => 'text', 'label' => 'Main title', 'default' => 'Insurance Partners: Renowned'],
            'partners.desc' => ['type' => 'textarea', 'label' => 'Description', 'default' => 'Our company takes'],
        ],
    ],
];
