Complete REST API in Laravel 8 for scanning Folder Directories.

# How to use

## Prerequisite - PHP 8

1. Clone the repository into your working environment

2. `git clone https://github.com/IlijaAngelov/FileScannerAPI.git`

3. Change directory to FileScanner `cd FileScanner`

4. Open the project in your favourite IDE

5. Copy the `.env.example` file and rename it to `.env`

6. Configure the Database - variables starting with `DB`

7. Run `composer install`

8. Run `php artisan key:generate`

9. Run `php artisan migrate`

10. Run `php artisan serve`

Note: Make Sure Laravel backend Project Run In Background 
(Entry point: http://127.0.0.1:8000/ )

Testing the app: https://127.0.0.1:8000/filebrowser?params

Params are:

- *folder* which you want to be scanned,

- *depth_search* if you want the directories to be shown as flatten ( value = 0) or recursive ( value = 1) - by default value = 1

- *cut_date* - returns the files that are modified before this date

- *cut_date_end* - returns the files that are modified after this date

Example: https://127.0.0.1:8000/filebrowser ?folder=/home/ilija/Documents/Books&depth_search=0

Key Features

BackEnd API using Laravel for Scanning the passed Directory through the URL.

FrontEnd View to display the folders and their subfolders.
