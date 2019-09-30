# Seus Direitos WebAPI

## Requirements

- **Install [Docker](https://docs.docker.com/install/)**
- **[Post Install Linux](https://docs.docker.com/install/linux/linux-postinstall/)**
- **Install [Docker Compose](https://docs.docker.com/compose/install/)**
- **Install [Yarn](https://yarnpkg.com/lang/pt-br/docs/install/#debian-stable)**

The Rest of the tools will run from inside the containers.

## Clone the repository

```bash
git clone https://github.com/grupotesseract/seus-direitos-webapi.git
cd seus-direitos-webapi
```

## Setup

```bash
# Start Vessel and prepare the environment:

cp .env.example .env
./vessel start
./vessel composer install
./vessel artisan key:generate
./vessel artisan migrate --seed

# Prepare de Assets
yarn install
yarn run watch
```

**Access [http://localhost](http://localhost)**

### Alternative - [Laradock](https://laradock.io)

- [Laradock Setup](https://laradock.io/getting-started/#A1)

## Troubleshooting

### In case of Docker errors

```bash
# Stop Containers:
docker stop $(docker ps -a -q)

# Remove Containers:
docker rm $(docker ps -a -q)

# Remove Volumes:
docker volume rm $(docker volume ls -qf dangling=true)

# Remove all Images:
docker rmi $(docker images -a -q)
```

### In case you need to unistall LAMP

```bash
sudo apt-get remove --purge apache2 mysql-server phpmyadmin

sudo apt autoremove
```

### In case of port errors

```bash
# Show ports in use:
netstat -antup

# Free the ports you need, example:
sudo fuser -k local_address/protocol
sudo fuser -k 80/tcp6
```
