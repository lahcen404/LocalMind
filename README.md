
# 🧠 LocalMind – Application Web Communautaire

## 📌 Description

**LocalMind** est une application web communautaire développée avec **Laravel**, permettant aux utilisateurs de poser des **questions localisées** et d’obtenir des **réponses d’utilisateurs proches**, afin de favoriser l’entraide locale.

---

## 🛠️ Technologies

* PHP / Laravel
* PostgreSQL
* Blade Templates
* MVC & Eloquent ORM

---

## ⚙️ Fonctionnalités

* 🔐 Authentification (Utilisateur / Admin)
* 💬 Questions : création, modification, suppression, recherche par lieu ou mot-clé
* 💡 Réponses aux questions
* ⭐ Favoris
* 📊 Statistiques (optionnel)

---

## 🗄️ Base de données

Tables : `users`, `questions`, `responses`, `favorites`

Relations principales :

```php
User hasMany Questions
Question hasMany Responses
Response belongsTo Question
User hasMany Favorites
```

---
