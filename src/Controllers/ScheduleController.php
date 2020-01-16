<?php

namespace ConfrariaWeb\Schedule\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;

class ScheduleController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->middleware('auth');


        /*
        $this->data = config('erp.schedule');

        $this->data['when_fields'] = resolve('OptionService')->pluck()->prepend('Escolha', '')->mapWithKeys(function ($item, $key) {
            return !empty($key) ? ['option.' . $key => $item] : [$key => $item];
        })->union($this->data['when_fields']);
        */

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Response
     */
    public function index()
    {

        $this->data['schedules'] = resolve('ScheduleService')->all();
        return view('schedules.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Response
     */
    public function create($page = 1)
    {
        $this->data = resolve('ScheduleService')->data();
        $this->data['page'] = $page;
        $this->data['task_types'] = resolve('TaskTypeService')->pluck();
        $this->data['forms'] = 'schedules.forms.form';

        return view('schedules.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Request $request
     * @return \Illuminate\Response
     */
    public function store(Request $request)
    {
        $schedule = resolve('ScheduleService')->create($request->all());
        return redirect()
            ->route('schedules.edit', $schedule->id)
            ->with('status', 'Schedules criada com sucesso!');
    }

    public function storeComment(Request $request, $schedule_id)
    {
        $schedule = resolve('ScheduleService')->createComment($request->all(), $schedule_id);
        return redirect()
            ->route('schedules.show', ['id' => $schedule_id])
            ->with('status', 'Comentário inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Response
     */
    public function show($id)
    {
        return view('schedules.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Response
     */
    public function edit($id)
    {
        $schedule = resolve('ScheduleService')->find($id);
        $this->data = resolve('ScheduleService')->data($schedule->where);
        $this->data['schedule'] = $schedule;
        $this->data[Str::plural($schedule->where)] = resolve(Str::studly($schedule->where) . 'Service')->pluck();

        $this->data['task_types'] = resolve('TaskTypeService')->pluck();
        $this->data['statuses'] = resolve('TaskStatusService')->all()->pluck(); //Auth::user()->roleTasksStatuses->pluck('name', 'id');
        $this->data['employees'] = resolve('UserService')->employees()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);
        $this->data['responsibles'] = resolve('UserService')->employees()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);
        $this->data['associates'] = resolve('UserService')->associates()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);
        $this->data['destinateds'] = resolve('UserService')->all()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);

        return view('schedules.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Request $request
     * @param int $id
     * @return \Illuminate\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = resolve('ScheduleService')->update($request->all(), $id);
        return redirect()
            ->route('schedules.edit', $schedule->id)
            ->with('status', 'Tarefa editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Response
     */
    public function destroy($id)
    {
        $schedule = resolve('ScheduleService')->destroy($id);
        return redirect()
            ->route('schedules.index')
            ->with('status', 'Tarefa deletado com sucesso!');
    }
}
