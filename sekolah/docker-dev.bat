@echo off
echo ====================================
echo   Sekolah SDN B1 - Docker Helper
echo ====================================
echo.

if "%1"=="" goto help
if "%1"=="start" goto start
if "%1"=="stop" goto stop
if "%1"=="restart" goto restart
if "%1"=="build" goto build
if "%1"=="logs" goto logs
if "%1"=="mysql-logs" goto mysql-logs
if "%1"=="shell" goto shell
if "%1"=="mysql" goto mysql
if "%1"=="migrate" goto migrate
if "%1"=="seed" goto seed
if "%1"=="key" goto key
if "%1"=="clear" goto clear
goto help

:start
echo Starting containers...
docker-compose up -d
goto end

:stop
echo Stopping containers...
docker-compose down
goto end

:restart
echo Restarting containers...
docker-compose restart
goto end

:build
echo Building and starting containers...
docker-compose up --build -d
goto end

:logs
echo Showing logs...
docker-compose logs -f app
goto end

:mysql-logs
echo Showing MySQL logs...
docker-compose logs -f mysql
goto end

:shell
echo Opening shell in app container...
docker-compose exec app bash
goto end

:mysql
echo Opening MySQL shell...
docker-compose exec mysql mysql -u root -p sdnb1
goto end

:migrate
echo Running migrations...
docker-compose exec app php artisan migrate
goto end

:seed
echo Running seeders...
docker-compose exec app php artisan db:seed
goto end

:key
echo Generating application key...
docker-compose exec app php artisan key:generate
goto end

:clear
echo Clearing cache...
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
goto end

:help
echo Usage: docker-dev.bat [command]
echo.
echo Available commands:
echo   start      - Start containers
echo   stop       - Stop containers
echo   restart    - Restart containers
echo   build      - Build and start containers
echo   logs       - Show container logs
echo   mysql-logs - Show MySQL logs
echo   shell      - Open shell in app container
echo   mysql      - Open MySQL shell
echo   migrate    - Run database migrations
echo   seed       - Run database seeders
echo   key        - Generate application key
echo   clear      - Clear application cache
echo.

:end
echo.
echo Done!