<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Titulo <span class="required"> * </span></label>
            {!! Form::text('title', isset($schedule)? $schedule->title : null, ['class' => 'form-control', 'placeholder' => 'Titulo', 'required']) !!}
            <small class="float-right">Utilize este titulo para localizar facilmente os seus agendamentos</small>
        </div>
        <div class="form-group">
            <label class="control-label">Status <span class="required"> * </span></label>
            {{ Form::select('status',  [1 => 'Ativado', 0 => 'Desativado'], isset($schedule)? $schedule->status : null, ['class' => 'form-control kt-select2']) }}
            <small class="float-right">Ative ou desative este agendamento</small>
        </div>
        <div class="form-group">
            <label class="control-label">Tipo de ação <span class="required"> * </span></label>
            {{ Form::select('type',  $type_list, isset($schedule)? $schedule->type : null, ['class' => 'form-control kt-select2']) }}
            <small class="float-right">Isso sera um agendamento periodico ou sera ativado logo apos alguma ação do usuario?</small>
        </div>
        <div class="form-group">
            <label class="control-label">O que <span class="required"> * </span></label>
            {{ Form::select('what',  $what_list, isset($schedule)? $schedule->what : null, ['class' => 'form-control kt-select2']) }}
            <small class="float-right">Algo vai acontecer, o que você precisa que o sistema faça?</small>
        </div>
        <div class="form-group">
            <label class="control-label">Onde<span class="required"> * </span></label>
            {{ Form::select('where',  $where_list, isset($schedule)? $schedule->where : null, ['class' => 'form-control kt-select2']) }}
            <small class="float-right">Em que parte do sistema será o gatilho para desencadar esta ação?</small>
        </div>
    </div>
    <div class="col-md-6">
        @if(isset($schedule))
            @includeIf('schedule::forms.' . $schedule->type . '.when')
            @includeIf('schedule::forms.where.' . Str::snake($schedule->where))
            @includeIf('schedule::forms.' . $schedule->type . '.where_' . Str::snake($schedule->where))
            @includeIf('schedule_' . Str::snake($schedule->what) . '::forms.' . Str::snake($schedule->what))
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12">
        @include('vendor::partials.buttons_form')
    </div>
</div>


