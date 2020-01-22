<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Conteúdo do email a ser enviado
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <div class="form-group">
            <label class="control-label">Modelo do email</label>
            {{ Form::select('options[what][mail][view]', ['emails.send' => 'Padrão', 'emails.users.amount' => 'Total de Usuários'], isset($schedule->options['what']['mail']['view'])? $schedule->options['what']['mail']['view'] : null, ['class' => 'form-control  kt-select2']) }}
        </div>

        <div class="form-row">
            <div class="col">
                <label class="control-label">Assunto</label>
                {!! Form::text('options[what][mail][subject]', isset($schedule->options['what']['mail']['subject'])? $schedule->options['what']['mail']['subject'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label class="control-label">Texto do email</label>
                {!! Form::textarea('options[what][mail][content]', isset($schedule->options['what']['mail']['content'])? $schedule->options['what']['mail']['content'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
