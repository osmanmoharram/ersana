<?php

return [
    'dashboard' =>[
        'header' => 'Dashboard',
    ],
    'settings' => [
        'header' => 'Settings',
        'greeting' => 'Hi, please select one of the settings on the left.'
    ],
    'users' => [
        'index' => [
            'header' => 'Users',
            'table' => [ 'name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'role' => 'Role'],
        ],
        'create' => ['header' => 'Create New User'],
        'edit' => ['header' => 'Update The User :user'],
        'form' => [
            'name' => ['label' => 'Full Name', 'placeholder' => 'Please insert the user\'s full name',],
            'email' => ['label' => 'Email', 'placeholder' => 'user@example.com',],
            'phone' => ['label' => 'Phone', 'placeholder' => 'Please write the phone number with the country key'],
            'role' => ['label' => 'Role', 'placeholder' => 'Please select a role'],
        ],
        'flash' => [
            'created' => 'A new user with the name :user has been created',
            'updated' => 'The user :user data have been updated',
            'deleted' => 'The user :user has been deleted'
        ],
    ],
    'features' => [
        'index' => [
            'header' => 'Features',
            'table'  => ['description' => 'Description',],
            'actions' => [
                'add' => ['title' => 'Add New Feature', 'confirm' => 'Add'],
                'edit' => ['title' => 'Edit', 'confirm' => 'Update'],
                'delete' => [
                    'title' => 'Delete',
                    'confirm' => 'Confirm',
                    'warning' => [
                        'title' => 'Are you sure you want to delete this feature?',
                        'sentence' => 'The feature will be removed from the system permanently and you won\'t be able to get it back',
                    ]
                ],
            ],
        ],
        'create' => ['header' => 'Create New Feature'],
        'edit' => ['header' => 'Update The Feature'],
        'form' => [
            'description' => [
                'label' => 'Description',
                'placeholder' => 'Please write a simple and clear description of this feature'
            ],
            'buttons' => ['create' => 'Create', 'edit' => 'Update', 'back' => 'Back']
        ],
        'flash' => [
            'created' => 'A new feature has been created',
            'updated' => 'The feature has been updated',
            'deleted' => 'The feature has been deleted'
        ],
    ],
    'packages' => [
        'index' => [
            'header' => 'Packages',
        ],
        'create' => ['header' => 'Create New Package'],
        'edit' => ['header' => 'Update The Package :package'],
        'form' => [
            'name' => ['label' => 'Name', 'placeholder' => 'Please write the package name here.'],
            'features' => ['label' => 'Features',],
            'price' => [
                'label' => 'Price',
                'placeholder' => 'Please write the package price here.',
                'note' => 'If no price inserted, then the package price will be set as 0 automatically.'
            ]
        ],
        'flash' => [
            'created' => 'A new feature has been created',
            'updated' => 'The feature has been updated',
            'deleted' => 'The feature has been deleted'
        ],
    ],
    'clients' => [
        'index' => [
            'header' => 'Clients',
            'table' => [
                'name' => 'Name',
                'phone' => 'Phone',
                'email' => 'Email',
                'domain' => 'Domain',
                'address' => 'Work Address',
                'businessField' => 'Business Field'
            ],
        ],
        'create' => ['header' => 'Create New Client'],
        'edit' => ['header' => 'Update The Client :client'],
        'form' => [
            'name' => ['label' => 'Full Name', 'placeholder' => 'Please insert the client\'s full name',],
            'email' => ['label' => 'Email', 'placeholder' => 'client@example.com',],
            'phone' => ['label' => 'Phone', 'placeholder' => 'Please write the phone number with the country key'],
            'address' => ['label' => 'Address', 'placeholder' => 'Please write your business location'],
            'businessField' => ['label' => 'Business Field'],
            'domain' => ['label' => 'Domain', 'placeholder' => 'ersana.com'],
        ],
        'flash' => [
            'created' => 'A new client with the name :user has been created',
            'updated' => 'The client :client data have been updated',
            'deleted' => 'The client :client has been deleted'
        ],
    ],
    'subscriptions' => [
        'index' => [
            'header' => 'Subscriptions',
            'table' => [
                '#' => '#',
                'package' => 'Package',
                'client' => 'Client',
                'status' => 'Status',
            ],
        ],
        'create' => [ 'header' => 'Create New Subscription', ],
        'edit' => [ 'header' => 'Update Subscription :subscription', ],
        'form' => [
            'client' => ['label' => 'Client', 'placeholder' => 'Please select one of the available clients.'],
            'package' => ['label' => 'Package', 'placeholder' => 'Please select one of the available packages.'],
        ],
        'flash' => [
            'created' => 'A new subscription has been created with :subscription',
            'updated' => 'The subscription :subscription has been updated',
            'deleted' => 'Subscription :subscription is deleted'
        ],
    ],
    'businessFields' => [
        'index' => [
            'header' => 'Business Fields',
            'table' => ['field' => 'Field', 'type' => 'Type'],
        ],
        'create' => [ 'header' => 'Create New Business Field', ],
        'edit' => [ 'header' => 'Update :field Business Field', ],
        'form' => [
            'name' => ['label' => 'Name', 'placeholder' => 'Weddings and events.'],
            'type' => ['label' => 'Type', 'placeholder' => 'Please select one of the types below.'],
        ],
        'flash' => [
            'created' => 'A new business field with the title :field has been created.',
            'updated' => 'The business field :field has been updated.',
            'deleted' => 'The business field :field has been deleted.'
        ],
        'types' => [
            'advertisement' => 'Advertisement',
            'booking' => 'Booking'
        ]
    ],
    'halls' => [
        'index' => [
            'header' => 'Halls',
            'table' => ['#' => '#', 'period' => 'Period', 'from' => 'From', 'to' => 'To', 'price' => 'Price']
        ],
        'create' => ['header' => 'Create New Hall',],
        'edit' => [ 'header' => 'Update :hall Hall'],
        'form' => [
            'name' => ['label' => 'Name', 'placeholder' => 'The hall name'],
            'location' => ['label' => 'Location', 'placeholder' => 'City, Nabourhood, street name or number'],
            'capacity' => ['label' => 'Capacity', 'placeholder' => 'The number of people the hall can fit', 'person' => 'Person'],
            'bookingTimes' => [
                'enter' => ['label' => 'Determine Booking Times'],
                'display' => ['label' => 'Booking Times'],
                'period' => [
                    'label' => 'Period',
                    'items' => [
                        'day' => 'Day',
                        'evening' => 'Evening'
                    ],
                ],
                'from' => ['label' => 'From', 'placeholder' => 'Please insert time'],
                'to' => ['label' => 'To', 'placeholder' => 'Please insert time'],
                'price' => ['label' => 'Price', 'placeholder' => 'Please insert the booking time price']
            ]
        ],
        'flash' => [
            'created' => 'A new hall has been created',
            'updated' => 'The hall :hall information has been updated',
            'deleted' => 'The hall :hall is deleted'
        ],
    ],
    'customers' => [
        'index' => [
            'header' => 'Customers',
            'table' => [
                'name' => 'Name',
                'company' => 'Company',
                'email' => 'Email',
                'phone' => 'Phone',
                'address' => 'Address',
            ]
        ],
        'create' => ['header' => 'Create New Customer'],
        'edit' => [ 'header' => 'Update :customer Data', ],
        'form' => [
            'name' => ['label' => 'Name', 'placeholder' => 'Please write the customer\'s full name'],
            'company' => ['label' => 'Company', 'placeholder' => 'Please write the customer\'s company name'],
            'email' => ['label' => 'Email', 'placeholder' => 'customer@example.com'],
            'phone' => ['label' => 'Phone', 'placeholder' => 'Please write the customer\'s phone number'],
            'address' => ['label' => 'Address', 'placeholder' => 'Please write the customer\'s address',],
        ]
    ],
    'bookings' => [
        'index' => [
            'header' => 'Bookings',
            'table' => [
                '#' => '#',
                'customer' => 'Customer Name',
                'date' => 'Booking Date',
                'from' => 'From',
                'to' => 'To',
                'total' => 'Price',
                'status' => 'Status'
            ]
        ],
        'create' => ['header' => 'Create New Booking'],
        'edit' => ['header' => 'Update Booking :booking Data'],
        'form' => [
            'customer' => ['label' => 'Customer Name'],
            'date' => ['label' => 'Booking Date', 'placeholder' => 'Please select a date'],
            'bookingTimes' => ['label' => 'Available Booking Times', 'button' => 'Available Times'],
            'discount' => ['label' => 'Discount'],
            'insurance' => ['label' => 'Insurance'],
            'total' => ['label' => 'Total'],
            'status' => [
                'label' => 'Status',
                'items' => [
                    'confirmed' => 'Confirmed',
                    'temporary' => 'Temporary',
                ],
            ],
            'notes' => ['label' => 'Notes']
        ]
    ],
    'expenses' => [
        'index' => [
            'header' => 'Expenses',
            'table' => [
                '#' => '#',
                'date' => 'Date',
                'payment_method' => 'Payment Method',
                'amount' => 'Amount',
                'description' => 'Description',
            ]
        ],
        'create' => ['header' => 'Create New Expense'],
        'edit' => ['header' => 'Update Expense Number :expense'],
        'form' => [
            'date' => ['label' => 'Date', 'placeholder' => 'Please select date'],
            'payment_method' => [
                'label' => 'Payment Method',
                'placeholder' => 'Please select payment method',
                'items' => [
                    'cash' => 'Cash',
                    'bank' => 'Bank'
                ],
            ],
            'amount' => ['label' => 'Amount', 'placeholder' => 'Please insert amount'],
            'description' => ['label' => 'Description', 'placeholder' => 'Please write a detailed description']
        ],
        'flash' => [
            'created' => 'A new expense has been created',
            'updated' => 'The expense number :expense has been updated',
            'deleted' => 'The expense :expense is deleted'
        ],
    ],
    'Revenues' => [
        'index' => [
            'header' => 'Revenues',
            'table' => [
                '#' => '#',
                'date' => 'Date',
                'payment_method' => 'Payment Method',
                'amount' => 'Amount',
                'description' => 'Description',
            ]
        ],
        'create' => ['header' => 'Create New Revenue'],
        'edit' => ['header' => 'Update revenue Number :revenue'],
        'form' => [
            'date' => ['label' => 'Date', 'placeholder' => 'Please select date'],
            'payment_method' => [
                'label' => 'Payment Method',
                'placeholder' => 'Please select payment method',
                'items' => [
                    'cash' => 'Cash',
                    'bank' => 'Bank'
                ],
            ],
            'amount' => ['label' => 'Amount', 'placeholder' => 'Please insert amount'],
            'description' => ['label' => 'Description', 'placeholder' => 'Please write a detailed description']
        ],
        'flash' => [
            'created' => 'A new revenue has been created',
            'updated' => 'The revenue number :revenue has been updated',
            'deleted' => 'The revenue :revenue is deleted'
        ],
    ],
    'reports' => [
        'index' => [
            'header' => 'Reports',
            'table' => [
                '#' => '#',
                'from' => 'From',
                'to' => 'To',
                'type' => 'Type',
                'average' => 'Average',
                'total' => 'Total',
            ]
        ],
        'create' => ['header' => 'Create New Report'],
        'edit' => ['header' => 'Update Report Number :report'],
        'form' => [
            'from' => ['label' => 'From', 'placeholder' => 'Please insert the start date of the report'],
            'to' => ['label' => 'To', 'placeholder' => 'Please insert the end date of the report'],
            'type' => [
                'label' => 'Type',
                'placeholder' => 'Please select the type of the report',
                'items' => ['expenses' => 'Expenses', 'revenues' => 'Revenues', 'all' => 'All']
            ],
        ],
        'flash' => [
            'created' => 'A new report has been created',
            'updated' => 'The report number :report has been updated',
            'deleted' => 'The report :report is deleted'
        ],
    ],
    'advertisements' => [
        'index' => [
            'header' => 'Advertisements',
            'table' => [
                'name' => 'Name',
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'price' => 'Price',
                'status' => 'Status',
                'owner_name' => 'Owner Name',
            ]
        ],
        'create' => ['header' => 'Create New Advertisement'],
        'edit' => ['header' => 'Update The Advertisement :advertisement'],
        'form' => [
            'name' => 'Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'price' => 'Price',
            'status' => 'Status',
            'owner_name' => 'Owner Name',
            'owner_phone' => 'Owner Phone',
        ],
        'flash' => [
            'created' => 'A new advertisement has been created',
            'updated' => 'The advertisement :advertisement has been updated',
            'deleted' => 'The advertisement :advertisement is deleted'
        ],
    ],
];
