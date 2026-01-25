<?php
/**
 * CLICOM - Déconnexion CRM
 * Fichier: crm/logout.php
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

logout_user();
redirect('/crm/login.php');
