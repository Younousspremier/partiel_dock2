README.txt
MEDIOUNA Younouss
FRANCESCO Alexis
ENGELS Lou

# Instructions pour déployer le projet Docker

Ce document vous guide à travers les étapes nécessaires pour tirer les images Docker de Docker Hub et exécuter les conteneurs à l'aide de Docker Compose.


## Prérequis

- Docker installé sur votre machine : [Installer Docker](https://docs.docker.com/get-docker/)
- Créer un compte Docker


## Étapes

# Authentification sur Docker Hub
Vous login à docker sur un PowerShell en utilisant : docker login

# Puller les images
docker pull younouss1/partiel_dock2:backend
docker pull younouss1/partiel_dock2:frontend
docker pull younouss1/partiel_dock2:mysql-5.7

# Exécuter les conteneurs
docker-compose build
docker-compose up -d

# Accéder aux applications
Front-end : http://localhost:8082/
Back-end : http://localhost:8083/back.php



