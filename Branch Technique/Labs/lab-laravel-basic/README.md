# Lab-laravel-basic

## travail a faire
Le projet implique la mise en place des opérations CRUD pour gérer les tâches, l'intégration d'une recherche dynamique avec AJAX, l'ajout de la pagination pour une navigation efficace, et l'inclusion de la table des projets dans les seeders pour assurer la persistance des données. Ces éléments sont essentiels pour développer une application robuste et conviviale

### Critere de validation  :

1. Créer le CRUD des tâches
2. Inclure la recherche en utilisant AJAX
3. Ajouter la pagination
4. Ajouter la base de données incluant la table des projets dans les seeders


## Comment créer l'environnement de développement


1. Commencez par installer Laravel via le terminal avec cette commande :

```
composer create-project laravel/laravel lab-laravel-basic
```

2. Ensuite, créez le fichier .env en utilisant la commande :
```
cp .env.example .env
```
3. Ajoutez le nom de la base de données au fichier .env.

4. Procédez à la création des tables en exécutant ces commandes :
```
php artisan make:migration Projects

php artisan make:migration Tasks

```
5. Une fois que les noms de colonnes pour les tables sont définis, migrez-les vers la base de données :
```
php artisan migrate
```

6. Remplissez la base de données avec des informations sur les projets en créant un seeder et en exécutant :
```
php artisan db:seed

```

7. Avec la table des tâches et le seeder configurés, générez des modèles pour tasks et projects :

```
php artisan make:model Project

php artisan make:model Task
```
8. Créez des contrôleurs pour gérer les données de la base de données :
```
php artisan make:controller ProjectsController 

php artisan make:controller TasksController 

```
9. Pour visualiser la progression de votre projet en local, exécutez cette commande :
```
php artisan serve

```
