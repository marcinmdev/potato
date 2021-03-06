🥔

[![Potato Code Validator](https://github.com/marcinmdev/potato/actions/workflows/php.yml/badge.svg)](https://github.com/marcinmdev/potato/actions/workflows/php.yml)

## DESCRIPTION
Example Symfony project with tested and simple code.

## REQUIREMENTS
```shell
#.zshrc/bashrc equivalent
export UID=$(id -u)
export GID=$(id -g)
```

## OPINIONATED SETUP
* copy ./docker/bin contents to ~/bin
* dxp = docker exec project
* dxpt = docker exec project test
* Remember to set executable bit (chmod+x) to both files

#### TOOLS
* https://archlinux.org/ (btw)
* https://github.com/junegunn/fzf
* https://docs.docker.com/compose/
* https://grml.org/zsh/

```shell
docker compose run -w /var/www/potato node npm install
docker compose run -w /var/www/potato node npm run build
```

```shell
# Commands below must be run in project directory
mkdir -p docker/data/home/${USER}
wget -O ./docker/data/home/${USER}/.zshrc https://git.grml.org/f/grml-etc-core/etc/zsh/zshrc
cp ./docker/.zshrc.local to ./docker/data/home/${USER}/.zshrc.local
```

#### TEST DB SETUP

```sh
docker exec -it potato-db /bin/bash
su postgres
psql -U potato
CREATE DATABASE potato_test;
GRANT ALL PRIVILEGES ON DATABASE potato_test to potato;
```

#### WORKFLOW
```shell
# While being in project dir: running below command should be automated, no need to repeat it every system boot
docker compose start
# preapre regular database
dxp-reset
# prepare test database
dxp-reset test
# test
dxpt
# lets go into php CLI with our nifty shell command which we set up before
dxp
# grml zsh shell inside docker php
# use <ctr-r> and thanks to fzf we have access to very useful history browser
# code check
composer code-validator
```
