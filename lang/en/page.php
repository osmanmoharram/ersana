<?php

return [
    'dashboard' => 'Dashboard',
    'users' => [
        'index' => [
            'header' => 'Users',
            'table' => [ 'name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'role' => 'Role'],
        ],
        'create' => ['header' => 'Create New User'],
        'edit' => ['header' => 'Update The User :user'],
        'form' => [
            'name' => ['label' => 'Full Name', 'placeholder' => 'Please enter the user\'s full name',],
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
    'roles' => [
        'index' => [
            'header' => 'Roles',
            'table' => ['name' => 'Name'],
        ],
        'show' => ['header' => 'Role :role'],
        'edit' => ['header' => 'Choose The Permissions For Role :role'],
        'form' => [
            'name' => ['label' => 'Name', 'placeholder' => 'Please write the name of the role']
        ],
        'flash' => [
            'created' => 'A new role has been created',
            'updated' => 'the role :role has been updated',
            'deleted' => 'the role :role is deleted'
        ],
    ],
    'permissions' => [
        'index' => [
            'header' => 'Permissions',
            'table' => ['name' => 'Name', 'placeholder' => 'Please write the name of the permission'],
        ],
        'create' => [ 'header' => 'Create New Permission' ],
        'edit' => ['Update the permission :permission'],
        'form' => [
            'name' => ['label' => 'Name']
        ],
        'flash' => [
            'created' => 'A new permission has been created',
            'updated' => 'The permission :permission has been updated',
            'deleted' => 'The permission :permission is deleted'
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
                'note' => 'If no price entered, then the package price will be set as 0 automatically.'
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
            'name' => ['label' => 'Full Name', 'placeholder' => 'Please enter the client\'s full name',],
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
        'index' => [ 'header' => 'Halls', ],
        'create' => [
            'header' => 'Create New Hall',
            'table' => ['period' => 'Period', 'from' => 'From', 'to' => 'To' ]
        ],
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
                'from' => ['label' => 'From', 'placeholder' => 'Please enter time'],
                'to' => ['label' => 'To', 'placeholder' => 'Please enter time'],
            ]
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
                'start' => 'Booking Start At',
                'end' => 'Booking End At',
                'type' => 'Type',
                'price' => 'Price',
                'status' => 'Status'
            ]
        ],
        'create' => ['header' => 'Create New Booking'],
        'edit' => ['header' => 'Update Booking :booking Data'],
        'form' => [
            'customer' => ['label' => 'Customer Name'],
            'date' => ['label' => 'Booking Date', 'placeholder' => 'Please select a date'],
            'start_time' => ['label' => 'Booking Start At', 'placeholder' => 'Please select time'],
            'end_time' => ['label' => 'Booking End At', 'placeholder' => 'Please select time'],
            'type' => [
                'label' => 'Type',
                'items' => [
                    'weddings' => 'Weddings',
                    'events' => 'Events',
                    'occassions' => 'Occassions'
                ]
            ],
            'guest_type' => [
                'label' => 'Guest Type',
                'items' => [
                    'men' => 'Men',
                    'women' => 'Women',
                    'men_women' => 'Men & Women'
                ]
            ],
            'food_menu' => ['label' => 'Food Menu'],
            'price_type' => [
                'label' => 'Price Type',
                'items' => [
                    'fixed' => 'Fixed',
                    'individual' => 'Individual'
                ]
            ],
            'fixed_price' => ['label' => 'Fixed Price'],
            'individual_price' => ['label'=> 'Individual Price'],
            'number_of_guests' => ['label' => 'Number Of Guests'],
            'discount' => ['label' => 'Discount'],
            'insurance' => ['label' => 'Insurance'],
            'vat' => ['label' => 'Vat'],
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
    ]
];
