<?php

return [
    'maintenance_mode' => 'Modo de mantenimiento',
    'message' => 'Mensaje',
    'message_placeholder' => 'Un mensaje para tus usuarios',
    'retry_time_in_seconds' => 'Tiempo de reintento (segundos)',
    'retry_time_placeholder' => 'Establecer el encabezado Retry-After',
    'secs' => 'segs',
    'allowed_ip_address' => 'Direcciones IP permitidas',
    'allowed_your_current_ip' => 'Permitir tu IP actual',
    'allowed_your_current_ip_helper' => 'Si desmarcas esto y no añades tu dirección IP arriba, también perderás el acceso a este sitio',
    'enable_maintenance_mode' => 'Activar modo de mantenimiento',
    'disable_maintenance_mode' => 'Desactivar modo de mantenimiento',
    'application_live' => 'La aplicación está ahora en vivo',
    'application_down' => 'La aplicación está ahora en modo de mantenimiento',
    'notice_enable' => 'Tu sitio web está actualmente en modo de mantenimiento',
    'notice_disable' => 'Tu sitio web está ahora en vivo',
    'secret' => 'Secreto (Eludir el modo de mantenimiento)',
    'secret_helper' => 'Incluso en modo de mantenimiento, puedes usar la opción secreta para especificar un token de bypass del modo de mantenimiento; <br />
                                        Después de poner la aplicación en modo de mantenimiento, puedes navegar a la URL de la aplicación que coincida con este token y Laravel emitirá una cookie de bypass del modo de mantenimiento a tu navegador:;',
    'redirect' => 'Redirigir solicitudes en modo de mantenimiento',
    'redirect_placeholder' => '/',
    'redirect_helper' => 'Mientras está en modo de mantenimiento, Laravel mostrará la vista de modo de mantenimiento para todas las URL de la aplicación a las que el usuario intente acceder. Si lo deseas, puedes indicar a Laravel que redirija todas las solicitudes a una URL específica. Esto se puede lograr utilizando la opción de redirección.',
    'bypass_maintenance_mode' => 'Eludir el modo de mantenimiento',
    'click_to_bypass_maintenance_mode' => 'Por favor, haz clic <a class="maintenance-mode-bypass" href="" target="_blank">aquí</a> para eludir el modo de mantenimiento.',
    'close' => 'Cerrar',
    'bypass_warning' => 'El enlace secreto para eludir el modo de mantenimiento, <strong>NECESITAS HACER UNA COPIA DE SEGURIDAD DE ESTE ENLACE EN UN LUGAR SEGURO</strong>',
];
