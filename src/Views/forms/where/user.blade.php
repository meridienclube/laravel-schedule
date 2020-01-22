<div class="portlet">
    <div class="portlet__head">
        <div class="portlet__head-label">
            <h4 class="portlet__head-title">Usuários para este agendamento</h4>
        </div>
    </div>
    <div class="portlet__body">
        <div class="form-group">
            <label class="control-label">Selecione um ou mais usuários</label>
            {{ Form::select2('options[where][users][]', [], [], ['id' => 'option_where_users', 'class' => 'form-control'], ['server_side' => ['route' => 'api.users.select2']]) }}
        </div>
    </div>
</div>
