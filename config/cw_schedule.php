<?php

return [
    'layout' => env('CW_LAYOUT', 'layouts.app'),
    'views' => env('CW_VIEWS', ''),

    'what_list' => [
        'create_task' => 'Criar Tarefa',
        'create_user' => 'Criar Pessoa',
        'send_email' => 'Enviar Email',
        'send_notification' => 'Enviar Notificação'
    ],
    'where_list' => [
        'user' => 'Usuários',
        'task' => 'Tarefas'
    ],
    'when_list' => [
        //'retrieved' => 'Depois que um registro foi recuperado',
        //'creating' => 'Antes de um registro ser criado',
        'created' => 'Depois que um registro foi criado',
        //'updating' => 'Antes de um registro ser atualizado',
        'updated' => 'Depois que um registro foi atualizado',
        //'saving' => 'Antes que um registro seja salvo (criado ou atualizado)',
        'saved' => 'Depois que um registro foi salvo (criado ou atualizado)',
        //'deleting' => 'Antes de um registro ser deletado',
        'deleted' => 'Depois de um registro ser deletado',
        //'restoring' => 'Antes que um registro deletado seja restaurado (soft-deleted)',
        //'restored' => 'Depois que um registro deletado foi restaurado (soft-deleted)'
    ],
    'type_list' => [
        'synchronous' => 'Síncrono',
        'scheduled' => 'Agendamento'
    ],
    'when_fields' => [
        'name' => 'Nome',
        'email' => 'E-mail',
        'type_id' => 'ID tipo de tarefa',
        'status_id' => 'Status'
    ],
    'when_ifs' => [
        '' => 'Escolha',
        'equal' => 'Igual',
        'different' => 'Diferente',
        'like' => 'Parecido'
    ],
    'when_frequency' => [
        'everyMinute' => 'Execute a tarefa a cada minuto',
        'everyFiveMinutes' => 'Execute a tarefa a cada cinco minutos',
        'everyTenMinutes' => 'Execute a tarefa a cada dez minutos',
        'everyFifteenMinutes' => 'Execute a tarefa a cada quinze minutos',
        'everyThirtyMinutes' => 'Execute a tarefa a cada trinta minutos',
        'hourly' => 'Execute a tarefa a cada hora',
        'daily' => 'Execute a tarefa todos os dias à meia-noite',
        'weekly' => 'Execute a tarefa toda semana',
        'monthly' => 'Execute a tarefa todos os meses',
        'quarterly' => 'Execute a tarefa a cada trimestre',
        'yearly' => 'Execute a tarefa todos os anos'
    ],
    'when_week' => [
        'monday' => 'Segunda feira',
        'tuesday' => 'Terça feira',
        'wednesday' => 'Quarta feira',
        'thursday' => 'Quinta feira',
        'friday' => 'Sexta feira',
        'saturday' => 'Sabado',
        'sunday' => 'Domingo'
    ]
];
