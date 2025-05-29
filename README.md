# Nextcloud + Docker + Caddy : Guide d'installation et d'administration

## 1. Lancement et gestion des conteneurs

```bash
docker compose up -d        # Démarrer les conteneurs en arrière-plan
docker compose down         # Arrêter tous les conteneurs
docker compose restart app  # Redémarrer uniquement le conteneur Nextcloud
docker compose restart caddy # Redémarrer le reverse proxy Caddy
```

## 2. Commandes Nextcloud (via OCC)

```bash
docker compose exec app php occ status                       # Statut de l'instance
docker compose exec app php occ user:list                    # Lister les utilisateurs
docker compose exec app php occ maintenance:mode --on        # Activer le mode maintenance
docker compose exec app php occ maintenance:mode --off       # Désactiver le mode maintenance
docker compose exec app php occ db:add-missing-indices       # Ajouter les index manquants
docker compose exec app php occ db:add-missing-columns       # Ajouter les colonnes manquantes
docker compose exec app php occ db:add-missing-primary-keys  # Ajouter les clés primaires manquantes
docker compose exec app php occ maintenance:repair --include-expensive # Réparations avancées
```

## 3. Configuration avancée

- Modifier le fichier de configuration :
  ```bash
  docker compose cp app:/var/www/html/config/config.php ./config.php
  # Modifier avec votre éditeur préféré
  docker compose cp ./config.php app:/var/www/html/config/config.php
  docker compose restart app
  ```

- Régénérer le .htaccess pour des URLs propres :
  ```bash
  docker compose exec app php occ maintenance:update:htaccess
  docker compose restart app
  ```

## 4. Tâches cron (recommandé)

- Éditer la crontab de www-data :
  ```bash
  sudo crontab -u www-data -e
  # Ajouter la ligne suivante :
  */5 * * * * php -f /var/www/html/cron.php
  ```

## 5. Redémarrage du reverse proxy après modification du Caddyfile

```bash
docker compose restart caddy
```

## 6. Maintenance et sécurité

- Ajouter la fenêtre de maintenance dans config.php :
  ```php
  'maintenance_window_start' => 1,
  ```
- Forcer le protocole HTTPS dans config.php :
  ```php
  'overwriteprotocol' => 'https',
  ```
- Définir la région par défaut pour les numéros de téléphone :
  ```php
  'default_phone_region' => 'FR',
  ```
- Ajouter les trusted_proxies et forwarded_for_headers :
  ```php
  'trusted_proxies' => ['caddy', '127.0.0.1', '::1'],
  'forwarded_for_headers' => ['HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP'],
  ```

## 7. Autres commandes utiles

- Voir les logs Nextcloud :
  ```bash
  docker compose logs app | tail -n 50
  ```
- Installer temporairement nano dans le conteneur :
  ```bash
  docker compose exec app apt update
  docker compose exec app apt install nano -y
  docker compose exec app nano /var/www/html/config/config.php
  ```

---

**Pensez à toujours sauvegarder vos données et votre base avant toute opération risquée !**

Pour toute question ou problème, consultez la documentation officielle Nextcloud et Caddy, ou demandez de l'aide à la communauté.