<div class="portlet">
    <div class="portlet__head">
        <div class="portlet__head-label">
            <h3 class="portlet__head-title">Agendar para quando?</h3>
        </div>
    </div>
    <div class="portlet__body">
        <div class="form-row">
            <div class="col">
                <label class="control-label">Frequência</label>
                {{ Form::select('options[when][frequency]', $when_frequency, isset($schedule->options['when']['frequency'])? $schedule->options['when']['frequency'] : null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <label class="control-label">Dia da semana</label>
                {{ Form::select('options[when][week]', $when_week, isset($schedule->options['when']['week'])? $schedule->options['when']['week'] : null, ['class' => 'form-control']) }}
            </div>
            <div class="col-2">
                <label class="control-label">Dia</label>
                {{ Form::select('options[when][day]', range(1, 31), isset($schedule->options['when']['day'])? $schedule->options['when']['day'] : null, ['class' => 'form-control']) }}
            </div>
            <div class="col-2">
                <label class="control-label">Hora</label>
                {{ Form::select('options[when][hour]', range(1, 24), isset($schedule->options['when']['hour'])? $schedule->options['when']['hour'] : null, ['class' => 'form-control']) }}
            </div>
            <div class="col-2">
                <label class="control-label">Minuto</label>
                {{ Form::select('options[when][minute]', range(1, 60), isset($schedule->options['when']['minute'])? $schedule->options['when']['minute'] : null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
</div>
