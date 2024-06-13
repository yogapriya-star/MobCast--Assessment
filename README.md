# MobCast Assessment

This repository contains the completed assignment for the MobCast interview process. The task was to fetch data from a given API endpoint and display it in a data table with additional functionalities like searching, sorting, and pagination.

## Task Description

Write a code to get and display data in the data table using this endpoint: 
[https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json](https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json)

### Additional Requirements:
- Searching
- Sorting
- Pagination

## Technologies Used

- **PHP**
- **JavaScript**
- **HTML**
- **CSS**
- **Laravel** (PHP Framework)
- **DataTables** (jQuery plugin for table functionalities)
- **Bootstrap** (CSS Framework)

## Project Setup

To run this project locally, follow these steps:

### Prerequisites

- PHP 7.4 or higher
- Composer
- Laravel CLI

### Installation

1. Clone the repository:
    ```bash
    git clone [GitHub Repository URL]
    cd [repository-name]
    ```

2. Install the PHP dependencies:
    ```bash
    composer install
    ```

3. Serve the application:
    ```bash
    php artisan serve
    ```

4. Open your browser and navigate to:
    ```
    http://127.0.0.1:8000
    ```

## Implementation Details

- **Data Fetching**: Data is fetched from the provided API endpoint using AJAX.
- **Data Parsing**: The description field in the API response contains HTML content. This content is parsed to extract plain text and image URLs.
- **Data Display**: The parsed data is displayed in a table using the DataTables jQuery plugin.
- **Table Functionalities**: Searching, sorting, and pagination are enabled using DataTables.

### File Structure

- `resources/views/welcome.blade.php`: The main view file containing the HTML and JavaScript for displaying the table.

a. To Use this Command while run:
    ```
    composer update

    php artisan serve    
    ```
