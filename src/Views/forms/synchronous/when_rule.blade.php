<div class="form-row p-2 schedule_rule_matrix" data-index="{{ $loop->index }}">
    <div class="col">
        <label class="control-label">Esse campo</label>
        {{ Form::select('options[when][rules][' . $loop->index . '][field]', $when_fields, isset($rule['field'])? $rule['field'] : null, ['class' => 'rule_field form-control']) }}
    </div>
    <div class="col">
        <label class="control-label">for</label>
        {{ Form::select('options[when][rules][' . $loop->index . '][if]', $when_ifs, isset($rule['if'])? $rule['if'] : null, ['class' => 'rule_if form-control']) }}
    </div>
    <div class="col">
        <label class="control-label">a isso</label>
        {!! Form::text('options[when][rules][' . $loop->index . '][value]', isset($rule['value'])? $rule['value'] : null, ['class' => 'rule_value form-control']) !!}
    </div>
    <div class="col-1">
        <button type="button" class="btn btn-link btn-sm schedule_rule_remove mt-4">
            <i class="fa flaticon2-delete"></i>
        </button>
    </div>
</div>

