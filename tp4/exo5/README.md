# Documentation de l'API Gestion des Utilisateurs

Cette API permet de gérer les utilisateurs via des requêtes HTTP (GET, POST, PUT, DELETE). Elle utilise une base de données avec PDO pour effectuer les opérations CRUD (Create, Read, Update, Delete).

## Configuration
L'API s'attend à ce que les données soient transmises au format JSON dans le corps des requêtes HTTP. Elle renvoie les réponses également au format JSON avec les en-têtes appropriés pour gérer les accès cross-origin (`Access-Control-Allow-Origin: *`).

## Routes et Méthodes

### 1. Récupérer la liste des utilisateurs

- **Méthode** : `GET`
- **URL** : `/`
- **Description** : Récupère la liste complète des utilisateurs.
- **Paramètres** : Aucun.
- **Exemple de réponse** :
  ```json
  [
      {
          "id": 1,
          "login": "user1",
          "email": "user1@example.com"
      },
      {
          "id": 2,
          "login": "user2",
          "email": "user2@example.com"
      }
  ]
  ```
- **Code de réponse** : `200 OK`

### 2. Récupérer un utilisateur par login

- **Méthode** : `GET`
- **URL** : `/`
- **Description** : Récupère les informations d'un utilisateur en fonction de son login.
- **Paramètres** :
  - `login` (obligatoire) : Le login de l'utilisateur à récupérer.
- **Exemple de requête** :
  ```json
  {
      "login": "user1"
  }
  ```
- **Exemple de réponse** :
  ```json
  [
      {
          "id": 1,
          "login": "user1",
          "email": "user1@example.com"
      }
  ]
  ```
- **Codes de réponse** :
  - `200 OK` : Si l'utilisateur est trouvé.
  - `404 Not Found` : Si l'utilisateur n'existe pas.

### 3. Ajouter un nouvel utilisateur

- **Méthode** : `POST`
- **URL** : `/`
- **Description** : Ajoute un nouvel utilisateur.
- **Paramètres** :
  - `login` (obligatoire) : Le login du nouvel utilisateur.
  - `email` (obligatoire) : L'adresse e-mail du nouvel utilisateur.
- **Exemple de requête** :
  ```json
  {
      "login": "user3",
      "email": "user3@example.com"
  }
  ```
- **Exemple de réponse** :
  ```json
  [
      {
          "id": 3,
          "login": "user3",
          "email": "user3@example.com"
      }
  ]
  ```
- **Codes de réponse** :
  - `201 Created` : Si l'utilisateur a été ajouté avec succès.
  - `409 Conflict` : Si l'utilisateur existe déjà.

### 4. Modifier un utilisateur

- **Méthode** : `PUT`
- **URL** : `/`
- **Description** : Modifie les informations d'un utilisateur existant.
- **Paramètres** :
  - `old_login` (obligatoire) : Le login de l'utilisateur à modifier.
  - `new_login` (optionnel) : Le nouveau login à attribuer.
  - `new_email` (optionnel) : La nouvelle adresse e-mail à attribuer.
- **Exemple de requête** :
  ```json
  {
      "old_login": "user1",
      "new_login": "user1_new",
      "new_email": "newemail@example.com"
  }
  ```
- **Exemple de réponse** :
  ```json
  [
      {
          "id": 1,
          "login": "user1_new",
          "email": "newemail@example.com"
      }
  ]
  ```
- **Codes de réponse** :
  - `200 OK` : Si la modification a été effectuée avec succès.
  - `404 Not Found` : Si l'utilisateur n'existe pas.
  - `204 No Content` : Si les paramètres fournis sont invalides.

### 5. Supprimer un utilisateur

- **Méthode** : `DELETE`
- **URL** : `/`
- **Description** : Supprime un utilisateur en fonction de son login.
- **Paramètres** :
  - `login` (obligatoire) : Le login de l'utilisateur à supprimer.
- **Exemple de requête** :
  ```json
  {
      "login": "user1"
  }
  ```
- **Exemple de réponse** :
  ```json
  {
      "status": "ok",
      "message": "successful operation"
  }
  ```
- **Codes de réponse** :
  - `200 OK` : Si la suppression a été effectuée avec succès.
  - `404 Not Found` : Si l'utilisateur n'existe pas.
  - `204 No Content` : Si les paramètres fournis sont invalides.

## En-têtes de Réponses

- **Content-Type** : `application/json; charset=utf-8`
- **Access-Control-Allow-Origin** : `*` (pour autoriser les requêtes Cross-Origin)

## Gestion des Erreurs

L'API retourne des messages d'erreurs sous la forme d'un objet JSON. Exemple :
```json
{
    "status": "error",
    "message": "user not found"
}
```

Les codes d'état HTTP renvoyés par l'API incluent :
- `200 OK` : Requête réussie.
- `201 Created` : Ressource créée avec succès.
- `204 No Content` : Entrée invalide ou manque de paramètres requis.
- `404 Not Found` : Ressource non trouvée.
- `409 Conflict` : Conflit, utilisateur déjà existant.

## Exemples de Requêtes

### Exemple d'une requête GET pour récupérer un utilisateur :
```bash
curl -X GET -d '{"login": "user1"}' http://localhost/api.php
```

### Exemple d'une requête POST pour ajouter un utilisateur :
```bash
curl -X POST -d '{"login": "user3", "email": "user3@example.com"}' http://localhost/api.php
```

### Exemple d'une requête PUT pour modifier un utilisateur :
```bash
curl -X PUT -d '{"old_login": "user1", "new_login": "user1_new", "new_email": "newemail@example.com"}' http://localhost/api.php
```

### Exemple d'une requête DELETE pour supprimer un utilisateur :
```bash
curl -X DELETE -d '{"login": "user1"}' http://localhost/api.php
```