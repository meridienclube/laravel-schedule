@inject('taskType', 'ConfrariaWeb\Task\Services\TaskTypeService')

<div class="portlet">
    <div class="portlet__head">
        <div class="portlet__head-label">
            <h3 class="portlet__head-title">
                Informações adicionais para schedule
            </h3>
        </div>
    </div>
    <div class="portlet__body">
        <div class="form-group">
            <label class="control-label">Que Tipo de tarefa</label>
            {{ Form::select2('options[task][type_id]', [], [], ['id' => 'option_task_type_id', 'class' => 'form-control'], ['server_side' => ['route' => 'api.tasks.types.select2']]) }}
        </div>
        <div class="form-row">
            <div class="col">
                <label class="control-label">Data da tarefa</label>
                {!! Form::text('options[task][datetime][date]', null, ['class' => 'form-control']) !!}
                <small>
                    Pode utilizar data no formato brasileiro (30/12/1998), data no formato americano ('1998-12-30') ou
                    até mesmo
                    indicando em quanto tempo posterior esta tarefa será aberto, (+ 12 dias) ou (+ 6 meses)
                </small>
            </div>
            <div class="col">
                <label class="control-label">Hora da tarefa</label>
                {!! Form::text('options[task][datetime][time]', null, ['class' => 'form-control']) !!}
                <small>
                    Pode utilizar no campo hora o formato com e se segundos, Ex: (22:32:00) ou (22:32)
                </small>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Destinatário da tarefa</label>
            {{ Form::select2('options[task][sync][destinateds][]', [], [], ['id' => 'option_task_user_destinateds', 'class' => 'form-control'], ['server_side' => ['route' => 'api.users.select2']]) }}
            <small class="form-text text-muted">
                Este perfil pode criar pessoas com os perfis listados acima, estes perfis
                ficaram disponiveis para o usuário quando o mesmo for criar uma nova pessoa.
            </small>
        </div>
        <div class="form-group">
            <label class="control-label">Responsavel para esta tarefa</label>
            {{ Form::select2('options[task][sync][responsibles][]', [], [], ['id' => 'option_task_user_responsibles', 'class' => 'form-control'], ['server_side' => ['route' => 'api.users.select2']]) }}
        </div>
        <div class="form-group">
            <label class="control-label">Quem abriu a tarefa</label>
            {{ Form::select2('options[task][user_id]', [], [], ['id' => 'option_task_user_id', 'class' => 'form-control'], ['server_side' => ['route' => 'api.users.select2']]) }}
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label">Status</label>
                {{ Form::select2('options[task][status_id]', [], [], ['id' => 'option_task_status_id', 'class' => 'form-control'], ['server_side' => ['route' => 'api.tasks.statuses.select2']]) }}
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Prioridade</label>
                {{ Form::select('options[task][priority]', [1 => 'Muito baixa',2 => 'Baixa',3 => 'Normal', 4 => 'Alta', 5 => 'Muito alta'], isset($task)? $task->priority : null, ['class' => 'form-control kt-select2']) }}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Descrição da tarefa<span class=""> </span></label>
            {!! Form::textarea('options[task][sync][optionsValues][description]', isset($task) && isset($task->options->description)? $task->options->description : null, ['class' => 'form-control', 'placeholder' => 'Digite a descrição desta tarefa']) !!}
        </div>
    </div>
</div>
