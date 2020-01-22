<div class="portlet">
    <div class="portlet__head">
        <div class="portlet__head-label">
            <h3 class="portlet__head-title">Executar quando?</h3>
        </div>
    </div>
    <div class="portlet__body">

        <div class="form-group">
            <label class="control-label">Quando<span class="required"> * </span></label>
            {{ Form::select('when',  $when_list, isset($schedule)? $schedule->when : null, ['class' => 'form-control kt-select2']) }}
            <small class="float-right">O que o sistema deve estar fazendo para que este gatilho seja acionado?</small>
        </div>

        @if(isset($schedule->options['when']['rules']))
            @foreach(($schedule->options['when']['rules']) as $rule)
                @includeIf('schedule::forms.synchronous.when_rule')
            @endforeach
        @else
            @includeIf('schedule::forms.synchronous.when_rule_empty')
        @endif

        <div class="" id="schedule_rules">  </div>

        <div class="row m-t-5">
            <div class="col-md-2 m-t-5">
                <button type="button" class="btn btn-primary " id="schedule_rule_add">
                    <i class="fa flaticon2-plus"></i>
                </button>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        $(document).on('click', '#schedule_rule_add', function(e){
            e.preventDefault();
            var index = $('.schedule_rule_matrix:last').attr('data-index');
            index = parseInt(index) + 1;
            console.log(index);
            var html = $('.schedule_rule_matrix:last').clone();
            html.attr('data-index', index);
            html.find('select.rule_field').each(function(){
                this.name = 'options[when][rules][' + index + '][field]';
            });
            html.find('select.rule_if').each(function(){
                this.name = 'options[when][rules][' + index + '][if]';
            });
            html.find('select.rule_value').each(function(){
                this.name = 'options[when][rules][' + index + '][value]';
            });
            html.appendTo($('#schedule_rules'));
        });

        $(document).on('click', '.schedule_rule_remove', function(e){
            $(this ).parent().parent().remove();
        });
    </script>
@endpush
