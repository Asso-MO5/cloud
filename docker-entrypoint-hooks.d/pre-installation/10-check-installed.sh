#!/bin/bash

# Vérifier si le fichier config.php existe et contient 'installed' => true
if [ -f /var/www/html/config/config.php ] && grep -q "'installed' => true" /var/www/html/config/config.php; then
    echo "Nextcloud is already installed, skipping installation"
    # Créer un fichier vide pour indiquer que l'installation n'est pas nécessaire
    touch /var/www/html/config/.installed
    exit 0
fi

echo "Nextcloud is not installed, proceeding with installation"
exit 1 