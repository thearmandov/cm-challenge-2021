# Creative Market Code Challenge (FS Engineer)

The goal of this project was to create a working application form that collects user data in a multi-step form in order to assess a potential 
seller on the platform. 


## Approach
I felt that given the best approach would be to utilize Laravel's API functionality that would interface with a Vue based front-end application. I chose
Laravel for it's natural compatibility with Vue with little set up required. 

My primary focus was completing all necessary business requirements while minimizing any implmentations that may take more time than necessary to facilitate (I.E implementing Vuex for a single form). 

Given that I didn't want to spend too much time on the setup, I opted for utilizing localStorage in order to maintain data across components for form submission. Given a larger scope project with more complexity, I would have followed a more robust and scalable state management pattern.

On the API, the implmentation is fairly simple. It is a single post request that takes a payload from the form component. All validation is handled via custom rule sets and requests that handle validation and special cases to ensure that all data ingested is complete and sanitized before loading into the DB. 

While Validation is handled via the API, there is a message that shows for the user, so they have some feedback on what they need to correct in order to successfully submit their application.

The API is throttled to thwart any abuse as a pre-caution. With a more robust implementation, I would have liked to add an IP tracking middleware and some form of JWT token in order to bolster defenses against abuse. 

## Setup
- clone project (https://github.com/thearmandov/cm-challenge-2021)

- cd <project-name>

- yarn / npm install (Node version >= 10)

- composer install (php 7.2+)

- cp .env.example .env

- Be sure to add your local database credentials  to the newly copied `.env` file for the next step

update the following with your local DB credentials:

```
    DB_DATABASE=cm_local
    DB_USERNAME=root
    DB_PASSWORD=secret
```

###  Database Migration

- Once initial setup is complete, from the command line, run `php artisan migrate`
- Mysql version 5.6+ required.

*Note:* Migrations can be viewed in the `database\migrations` directory. 

| Column                        |      Type      |  Default |
|-------------------------------|:-------------:|------:|
| Id                            |    BIGINT    |       |
| first_name                    |    VARCHAR   |    |
| last_name                     |    VARCHAR   |     |
| shop_category                 |    VARCHAR   |  |
| portfolio_link                |    VARCHAR   |    |
| online_stores                 |    VARCHAR   |    NULL |
| quality_perspective           |    VARCHAR   |  |
| online_sales_experience       |    VARCHAR   |    |
| business_marketing_experience |    VARCHAR   |    |
| created_at                    |    TIMESTAMP |   NULL |
| updated_at                    |    TIMESTAMP |    NULL |

### Running the project locally

- yarn dev && php artisan serve

### API
| API           |      Type  |  URL                |
|---------------|:----------:|--------------------:|
| process-form  |    POST    |  /api/form/submit   |

**Payload example**
```
{
    firstName: 'Test',
    lastName: 'McTestFace',
    shopCategory: '3D',
    portfolioLink: 'https://mydopeportfolio.com',
    listOfStores: 'test1.com, test2.com, test3.com',
    qualityPerspective: '...',
    onlineSalesExperience: '...',
    businessMarketingExp: '...'
}
```

**Successful response 200 Status Code**
```
{
    succss: true,
    message: 'Seller successfully saved.'
}
```

**Validtation Erro 422 Status Code**
```
{
    "message":"The given data was invalid.",
    "errors":{
        "firstName":["The first name field is required."],
        "lastName":["The last name field is required."],
        "shopCategory":["The shop category field is required."]
        }
}
```

### Application Structure

API controller can be found in the `app\Http\Controllers` Directory named `FormController.php`

Custom Form Requests (which handles validation rules) can be found in: `app\Http\Requests\CustomFormRequest.php`

Custom Rules can be found in `app\Http\Rules\portfolioOwnership.php` and `app\Http\Rules\uniquePortfolio.php`

Vue components can be found in `resources\js\components` and the blade template used can be found in `resources\views\welcome.blade.php`

All styles are located in `resources\sass`. Each component is in it's own directory. 

