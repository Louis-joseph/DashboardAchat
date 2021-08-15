# DashboardAchat

C'est une plateforme d'achat de matériel

## Environnement de développement

### Pré-requis

- PHP 7.4
- Composer
- Symfony CLI
- Docker
- Docker-compose

* npm

Vérifiez les pré-requis (sauf Docker et Docker-compose) avec la commande (de la CLI Symfony) :

```bash
symfony check:requirements
```

### Lancer l'environnement de développement

```bash
composer install
npm install
npm run build
docker-compose up -d
symfony serve -d
```

### Ajouter des données de Tests

```bash
mysql -p
use main
symfony console doctrine:fixtures:load
```

## Lancer des tests

```bash
php bin/phpunit --testdox
```
