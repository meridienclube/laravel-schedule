<?php

namespace ConfrariaWeb\Schedule\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function storeComment(Request $request, $schedule_id)
    {
        $schedule = resolve('ScheduleService')->createComment($request->all(), $schedule_id);
        return redirect()
            ->route('schedules.show', ['id' => $schedule_id])
            ->with('status', 'Comentário inserido com sucesso!');
    }

    public function index()
    {
        $this->data['schedules'] = resolve('ScheduleService')->all();
        return view(config('cw_schedule.views') . 'schedules.index', $this->data);
    }

    public function create($page = 1)
    {
        $this->data = resolve('ScheduleService')->data();
        $this->data['page'] = $page;
        $this->data['task_types'] = resolve('TaskTypeService')->pluck();
        $this->data['forms'] = 'schedules.forms.form';

        return view(config('cw_schedule.views') . 'schedules.create', $this->data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $data['user_id']?? Auth::id();
        $schedule = resolve('ScheduleService')->create($data);
        return redirect()
            ->route('admin.schedules.edit', $schedule->id)
            ->with('status', 'Schedules criada com sucesso!');
    }

    public function show($id)
    {
        return view(config('cw_schedule.views') . 'schedules.show', $this->data);
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

        //$this->data['task_types'] = resolve('TaskTypeService')->get()->pluck();
        //$this->data['statuses'] = resolve('TaskStatusService')->get()->pluck(); //Auth::user()->roleTasksStatuses->pluck('name', 'id');
        //$this->data['employees'] = resolve('UserService')->employees()->get()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);
        //$this->data['responsibles'] = resolve('UserService')->employees()->get()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);
        //$this->data['associates'] = resolve('UserService')->associates()->get()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);
        //$this->data['destinateds'] = resolve('UserService')->get()->pluck('name', 'id')->union(['this' => 'Eu mesmo', 'self' => 'O próprio']);

        return view(config('cw_schedule.views') . 'schedules.edit', $this->data);
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
            ->route('admin.schedules.edit', $schedule->id)
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
            ->route('admin.schedules.index')
            ->with('status', 'Tarefa deletado com sucesso!');
    }
}
