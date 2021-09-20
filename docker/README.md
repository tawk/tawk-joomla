Joomla 3.8
============
Docker containers for Joomla 3.

## Information
- Current Joomla Version: 3.8, 3.9, 3.10, 4.0
- PHP Versions: 5.6, 7.2, 7.3, 7.4, 8.0
- MySQL Version: 5.7

## Pre-Requisites
- install docker-compose [http://docs.docker.com/compose/install/](http://docs.docker.com/compose/install/)

## Usage
Start the container:
- ```docker-compose --env-file envs/<env-file> up```

Stop the container:
- ```docker-compose --env-file envs/<env-file> stop```

Destroy the container and start from scratch:
- ```docker-compose --env-file envs/<env-file> down```
- ```docker volume rm joomla-<volume-name>```
    - ex. ```docker volume rm joomla-38-php56-apache-web_data joomla-38-php-56-apache-db_data```

## Plugin setup
You can follow the instruction in the [Joomla Github Repo](https://github.com/tawk/tawk-joomla)
