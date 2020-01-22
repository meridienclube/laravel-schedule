<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Editar o que na pessoa
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <div class="form-group">
            <label class="control-label">Adicionar a base de</label>
            {{ Form::select('options[what][base_id]', $users, isset($schedule->options['what']['base_id'])? $schedule->options['what']['base_id'] : null, ['class' => 'form-control']) }}
        </div>

    </div>
</div>
