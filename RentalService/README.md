# Tutoriel Docker : Déploiement de l'application RentalService

## Description
Ce projet démontre l'utilisation de Docker pour conteneuriser une application Java Spring Boot (RentalService). Il couvre les étapes depuis l'installation de Docker jusqu'au déploiement de l'image sur Docker Hub.

## Étapes réalisées

### 1. **Installation et premiers pas avec Docker**
```bash
# Test de l'installation Docker
docker run hello-world

# Recherche d'images Docker
docker search ubuntu

# Téléchargement de l'image Ubuntu
docker pull ubuntu

# Liste des images locales
docker images

# Exécution interactive d'un conteneur Ubuntu
docker run -it ubuntu
```

### 2. **Gestion des images et conteneurs**
```bash
# Voir les conteneurs en cours d'exécution
docker ps

# Voir tous les conteneurs
docker ps -a

# Arrêter un conteneur
docker stop [ContainerID]

# Supprimer toutes les images
docker rm $(docker ps -aq)
docker rmi $(docker images -q)
```

### 3. **Récupération et configuration du projet**
```bash
# Clonage du dépôt original
git clone https://github.com/charroux/ingnum.git
cd ingnum/RentalService

# Configuration du dépôt Git personnel
git remote remove origin
git remote add origin [ADRESSE_DE_VOTRE_DEPOT_GIT]
```

### 4. **Test sans Docker**
```bash
# Installation de Java JDK 21
# (Dépend de votre système d'exploitation)

# Compilation du projet
./gradlew build

# Exécution de l'application
java -jar build/libs/RentalService-0.0.1-SNAPSHOT.jar

# Vérification dans le navigateur
http://localhost:8080/bonjour
```

### 5. **Création du Dockerfile**
Création du fichier `Dockerfile` dans le dossier `RentalService` :
```dockerfile
FROM eclipse-temurin:21
VOLUME /tmp
EXPOSE 8080
ADD ./build/libs/RentalService-0.0.1-SNAPSHOT.jar app.jar
ENTRYPOINT ["java","-Djava.security.egd=file:/dev/./urandom","-jar","/app.jar"]
```

### 6. **Construction et test avec Docker**
```bash
# Construction de l'image Docker
docker build -t rentalservice .

# Exécution du conteneur
docker run -p 8080:8080 rentalservice

# Vérification
http://localhost:8080/bonjour
```

### 7. **Publication sur Docker Hub**
```bash
# Connexion à Docker Hub
docker login

# Tag de l'image
docker tag rentalservice [VOTRE_NOM_DH]/rentalservice:1.0

# Push vers Docker Hub
docker push [VOTRE_NOM_DH]/rentalservice:1.0
```

### 8. **Mise à jour du dépôt Git**
```bash
# Ajout des fichiers modifiés
git add Dockerfile README.md

# Commit des modifications
git commit -m "Ajout Dockerfile et documentation"

# Push vers le dépôt personnel
git push origin main
```

## Architecture du projet
```
RentalService/
├── src/                    # Code source de l'application
├── build/libs/            # Fichiers JAR générés
├── Dockerfile            # Configuration Docker
├── build.gradle          # Configuration Gradle
└── README.md            # Documentation
```

## 🔧 Prérequis
- Docker Desktop installé
- Java JDK 21
- Git
- Compte Docker Hub

## Commandes Docker essentielles
| Commande | Description |
|----------|-------------|
| `docker build -t nom .` | Construire une image |
| `docker run -p hote:conteneur image` | Lancer un conteneur |
| `docker ps` | Lister les conteneurs actifs |
| `docker images` | Lister les images locales |
| `docker push user/image:tag` | Publier une image |

## Dépannage courant

**Problème** : Port 8080 déjà utilisé  
**Solution** :  
```bash
docker run -p 8081:8080 rentalservice
```

**Problème** : Image non trouvée  
**Solution** :  
```bash
./gradlew clean build
docker build -t rentalservice .
```

## Objectifs atteints
- [x] Découverte des commandes Docker de base
- [x] Construction d'une application web Java
- [x] Déploiement dans un conteneur Docker
- [x] Création et personnalisation d'images Docker
- [x] Publication sur Docker Hub
- [x] Gestion de version avec Git

## Liens utiles
- [Documentation Docker officielle](https://docs.docker.com/)
- [Docker Hub](https://hub.docker.com/)
- [Spring Boot Documentation](https://spring.io/projects/spring-boot)

## Résumé des compétences acquises
1. **Docker** : Maîtrise des images, conteneurs et Dockerfile
2. **CI/CD** : Pipeline de build et déploiement automatisé
3. **Java/Spring** : Application web conteneurisée
4. **DevOps** : Pratiques de déploiement modernes
5. **Versionning** : Gestion avec Git et collaboration
