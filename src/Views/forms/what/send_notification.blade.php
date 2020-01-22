<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Conteúdo da notificação a ser enviado
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <div class="form-row">
            <div class="col">
                <label class="control-label">Assunto</label>
                {!! Form::text('options[what][notification][subject]', isset($schedule->options['what']['notification']['subject'])? $schedule->options['what']['notification']['subject'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="control-label">saudação</label>
                {!! Form::text('options[what][notification][greeting]', isset($schedule->options['what']['notification']['greeting'])? $schedule->options['what']['notification']['greeting'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="control-label">Linha de texto</label>
                {!! Form::text('options[what][notification][line]', isset($schedule->options['what']['notification']['line'])? $schedule->options['what']['notification']['line'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="control-label">Texto action</label>
                {!! Form::text('options[what][notification][action][text]', isset($schedule->options['what']['notification']['action']['text'])? $schedule->options['what']['notification']['action']['text'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="control-label">URL action</label>
                {!! Form::text('options[what][notification][action][url]', isset($schedule->options['what']['notification']['action']['url'])? $schedule->options['what']['notification']['action']['url'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="control-label">Texto</label>
                {!! Form::textarea('options[what][notification][content]', isset($schedule->options['what']['notification']['content'])? $schedule->options['what']['notification']['content'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>

    </div>
</div>
