<?php

return [
    'maintenance_mode' => 'Mode maintenance',
    'message' => 'Message',
    'message_placeholder' => 'Un message pour vos utilisateurs',
    'retry_time_in_seconds' => 'Temps de nouvelle tentative (secondes)',
    'retry_time_placeholder' => 'Définir l\'en-tête Retry-After',
    'secs' => 'secs',
    'allowed_ip_address' => 'Adresses IP autorisées',
    'allowed_your_current_ip' => 'Autoriser votre IP actuelle',
    'allowed_your_current_ip_helper' => 'Si vous décochez cette case et n\'ajoutez pas votre adresse IP ci-dessus, vous perdrez également l\'accès à ce site',
    'enable_maintenance_mode' => 'Activer le mode maintenance',
    'disable_maintenance_mode' => 'Désactiver le mode maintenance',
    'application_live' => 'L\'application est maintenant en ligne',
    'application_down' => 'L\'application est maintenant en mode maintenance',
    'notice_enable' => 'Votre site web est actuellement en mode maintenance',
    'notice_disable' => 'Votre site web est maintenant en ligne',
    'secret' => 'Secret (Contourner le mode maintenance)',
    'secret_helper' => 'Même en mode maintenance, vous pouvez utiliser l\'option secrète pour spécifier un jeton de contournement du mode maintenance; <br />
                                        Après avoir mis l\'application en mode maintenance, vous pouvez naviguer vers l\'URL de l\'application correspondant à ce jeton et Laravel émettra un cookie de contournement du mode maintenance à votre navigateur:;',
    'redirect' => 'Redirection des requêtes en mode maintenance',
    'redirect_placeholder' => '/',
    'redirect_helper' => 'En mode maintenance, Laravel affichera la vue du mode maintenance pour toutes les URL de l\'application auxquelles l\'utilisateur tente d\'accéder. Si vous le souhaitez, vous pouvez demander à Laravel de rediriger toutes les requêtes vers une URL spécifique. Cela peut être accompli en utilisant l\'option de redirection.',
    'bypass_maintenance_mode' => 'Contourner le mode maintenance',
    'click_to_bypass_maintenance_mode' => 'Veuillez cliquer <a class="maintenance-mode-bypass" href="" target="_blank">ici</a> pour contourner le mode maintenance.',
    'close' => 'Fermer',
    'bypass_warning' => 'Le lien secret pour contourner le mode maintenance, <strong>VOUS DEVEZ SAUVEGARDER CE LIEN DANS UN ENDROIT SÛR</strong>',
];
