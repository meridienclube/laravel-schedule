<?php

namespace ConfrariaWeb\Schedule\Controllers;

use ConfrariaWeb\Schedule\Requests\StoreScheduleRequest;
use ConfrariaWeb\Schedule\Requests\UpdateScheduleRequest;
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

    public function index()
    {
        $this->data['schedules'] = resolve('ScheduleService')->all();
        return view(config('cw_schedule.views') . 'schedules.index', $this->data);
    }

    public function create()
    {
        $this->data = resolve('ScheduleService')->data();
        return view(config('cw_schedule.views') . 'schedules.create', $this->data);
    }

    public function store(StoreScheduleRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = $data['user_id'] ?? Auth::id();
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
    public function update(UpdateScheduleRequest $request, $id)
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
