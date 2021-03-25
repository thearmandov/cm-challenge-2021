# Creative Market Code Challenge (FS Engineer)

The goal of this project was to create a working application form that collects user data in a multi-step form in order to assess a potential 
seller on the platform. 


## Approach
I felt that given the best approach would be to utilize Laravel's API functionality that would interface with a Vue based front-end application. I chose
Laravel for it's natural compatibility with Vue with little set up required. 

My primary focus was completing all necessary business requirements while minimizing any implmentations that may take more time than necessary to facilitate (I.E implementing Vuex for a single form). 

Given that I didn't want to spend too much time on the setup, I opted for utilizing localStorage in order to maintain data across components for form submission. Given a larger scope project with more complexity, I would have followed a more robust and scalable state management pattern.

On the API, the implmentation is fairly simple. It is a single post request that takes a payload from the form component. All validation is handled via custom rule sets and requests that handle validation and special cases to ensure that all data ingested is complete and sanitized before loading into the DB. 

The API is throttled to thwart any abuse as a pre-caution. With a more robust implementation, I would have liked to add an IP tracking middleware and some form of JWT token in order to bolster defenses against abuse. 

## Setup
- clone project (https://github.com/thearmandov/cm-challenge-2021)

- cd <project-name>

- yarn / npm install

- composer install 

- cp .env.example .env

- Be sure to add your local database credentials for the next step

###  Database Migration

- Once initial setup is complete, from the command line, run `php artisan migrate`

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