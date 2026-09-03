# Garage Révélation

Application web de gestion de garage développée en PHP, MySQL, Bootstrap et AdminLTE.

## Fonctionnalités

- gestion des clients et des véhicules ;
- suivi des mécaniciens et des interventions ;
- gestion des pièces détachées, des ventes et des factures ;
- tableaux de bord et exports DataTables.

## Installation locale

1. Placez le projet dans le répertoire web de WAMP/XAMPP.
2. Créez une base MySQL nommée `garage_revelation`.
3. Importez le schéma [`BD/garage_revelation.sql`](BD/garage_revelation.sql).
4. Adaptez les paramètres de connexion dans `connexion.php` si nécessaire.
5. Créez un utilisateur dans la table `users`, puis ouvrez `index.php`.

Le fichier SQL versionné contient uniquement le schéma de la base. Les données de production et les identifiants ne doivent pas être ajoutés au dépôt.

## Organisation des ressources

Les ressources partagées AdminLTE sont centralisées dans `dist/` et `plugins/`. Les modules sous `pages/` les référencent directement afin d’éviter de versionner plusieurs copies identiques.

## Vérification

Pour contrôler la syntaxe d’un fichier PHP :

```bash
php -l chemin/du/fichier.php
```

## Licence

Voir [LICENSE](LICENSE).
