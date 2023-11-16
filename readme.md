# Product Management
This is a demo of stock management system.

## Features
  - Stock Adding
  - Stock Manage 
  - Supplier Management
  - Category Manage
  - Low stock alert
  - Upcoming expiration alert
  - Telegram alerts
  - Product input and output charts
  
## Run
  Copy .env.example to .env and setup your Database information.

  ``` bash
  # Composer install
  composer install

  # Laravel init
  php artisan key:generate
  php artisan migrate
  php artisan db:seed

  # serve at localhost:8000
  php artisan serve
  ```
  ## Screenshot
![Captura de tela de 2019-12-13 20-51-55](https://user-images.githubusercontent.com/44074498/70839326-049adf00-1deb-11ea-9411-c846d97fc67d.png)

![Captura de tela de 2019-12-13 19-32-34(1)](https://user-images.githubusercontent.com/44074498/70838948-53477980-1de9-11ea-822c-59ae150ff8d5.png)

![Captura de tela de 2019-12-13 20-49-37](https://user-images.githubusercontent.com/44074498/70839154-36f80c80-1dea-11ea-9629-9f22e5e4e9e5.png)
