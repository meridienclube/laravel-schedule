<div class="form-row schedule_rule_matrix" data-index="0">
    <div class="col">
        <label class="control-label">Esse campo</label>
        {{ Form::select('options[when][rules][0][field]', $when_fields, null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        <label class="control-label">for</label>
        {{ Form::select('options[when][rules][0][if]', $when_ifs, null, ['class' => 'form-control']) }}
    </div>
    <div class="col">
        <label class="control-label">a isso</label>
        {!! Form::text('options[when][rules][0][value]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-1">
        <button type="button" class="btn btn-link btn-sm schedule_rule_remove mt-4">
            <i class="fa flaticon2-delete"></i>
        </button>
    </div>
</div>
