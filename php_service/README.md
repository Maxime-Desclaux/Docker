## Deuxième microservice PHP - TERMINÉ ✅

**Fichiers créés :**
- php_service/index.php
- php_service/Dockerfile

**Image Docker créée :** maxime-php-service (local)
**Image Docker Hub :** maximedesclaux/maxime-php-service:latest

**Commandes utilisées :**
```bash
# Build
docker build -t maxime-php-service .

# Test local
docker run -p 8081:80 maxime-php-service

# Publication Docker Hub
docker tag maxime-php-service maximedesclaux/maxime-php-service:latest
docker push maximedesclaux/maxime-php-service:latest

# Test depuis Docker Hub
docker pull maximedesclaux/maxime-php-service:latest
docker run -p 8082:80 maximedesclaux/maxime-php-service:latest