<?PHP

namespace ConfrariaWeb\Schedule\Services;

use ConfrariaWeb\Schedule\Contracts\ScheduleContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Str;

class ScheduleService
{
    use ServiceTrait;

    public function __construct(ScheduleContract $schedule)
    {
        $this->obj = $schedule;
    }

    /**
     * Aqui é somente chamado em "App/Console/Kernel.php"
     * @param $schedule
     */
    public function schedule($schedule)
    {
        $objs = $this->obj->where(['type' => 'scheduled'])->get();
        foreach ($objs as $obj) {
            $frequency = $obj->options['when']['frequency'];
            $schedule->call(function () use ($obj, $frequency) {
                $this->execute($obj);
            })->{$frequency}();
        }
    }

    /**
     * Aqui somente chamado nos observers.
     * Existe um helper que facilita essa chamada - scheduleObserver()
     *
     * @param Object $obj
     * @param $where
     * @param $when
     * @param array $data
     * @return array
     */
    public function executeObserver(Object $obj, $where, $when, $data = [])
    {
        $schedules = $this->obj->where(['where' => $where, 'when' => $when])->get();
        foreach ($schedules as $schedule_k => $schedule_v) {
            if ($this->rules($schedule_v->options['when']['rules'], $obj)) {
                $this->execute($schedule_v);
            }
        }
        return $data;
    }

    /**
     * Metodo para ser adicionado nas Listeners necessárias
     * @param Object $obj
     * @param $where
     * @param $when
     * @param array $data
     * @return array
     */
    public function executeListener(Object $obj, $where, $when, $data = [])
    {
        $schedules = $this->obj->where(['where' => mb_strtolower($where), 'when' => mb_strtolower($when)])->get();
        foreach ($schedules as $schedule_k => $schedule_v) {
            if ($this->rules($schedule_v->options['when']['rules'], $obj)) {
                $this->execute($schedule_v, $obj);
            }
        }
        return $data;
    }

    /**
     * Metodo para ser executado dentro de um service
     * @param Object $obj
     * @param $where
     * @param $when
     * @param array $data
     * @return array
     */
    public function executeService(Object $obj, $where, $when, $data = [])
    {
        $schedules = $this->obj->where(['where' => mb_strtolower($where), 'when' => mb_strtolower($when)])->get();
        foreach ($schedules as $schedule_k => $schedule_v) {
            if ($this->rules($schedule_v->options['when']['rules'], $obj)) {
                $this->execute($schedule_v, $obj);
            }
        }
        return $data;
    }

    public function execute($schedule, $obj)
    {
        $objService = resolve("\MeridienClube\Meridien\Services\Schedule\\" . Str::studly($schedule->what) . "Service")->execute($schedule, $obj);
    }

    protected function rules($rules, $obj, $content = null, $return = true)
    {
        foreach ($rules as $rule) {
            if (!is_null($rule['field'])) {
                $rulesCollective = collect($rule)->map(function ($item, $key) {
                    return strtolower($item);
                });
                //dd($rulesCollective);
                $posOpt = strpos($rulesCollective['field'], 'option.');
                if ($posOpt !== false) {
                    $rulesCollective = $rulesCollective->map(function ($item, $key) {
                        return str_replace('option.', '', $item);
                    });

                    $objFind = $obj->options->find($rulesCollective['field']);
                    if ($objFind) {
                        $content = $objFind->pivot->content;
                    }
                } else if ($rulesCollective['field'] == 'role') {
                    $first_display_name = $obj->roles()
                        ->where('display_name', $rulesCollective['value'])
                        ->first();
                    $first_name = $obj->roles()
                        ->where('name', $rulesCollective['value'])
                        ->first();
                    $content = false;
                    $content = isset($first_name) ? $first_name->name : $content;
                    $content = isset($first_display_name) ? $first_display_name->name : $content;
                } else {
                    $content = $obj->toArray()[$rulesCollective['field']];
                }
                $return = isset($content) ? $return : false;
                $content = strtolower($content);
                if ($rulesCollective['if'] == 'equal' && $return) {
                    $return = $content == $rulesCollective['value'];
                }
                if ($rulesCollective['if'] == 'different' && $return) {
                    $return = $content != $rulesCollective['value'];
                }
                if ($rulesCollective['if'] == 'like' && $return) {
                    $pos = strpos($content, $rulesCollective['value']);
                    $return = ($pos === false) ? false : true;
                }
                $content = null;
                $return = isset($return) ? $return : false;
                if (!$return) {
                    break;
                }
            }
        }
        return $return;
    }

    public function data($where = null)
    {
        $data = config('erp.schedule');

        $data['users'] = resolve('UserService')
            ->pluck()
            //->prepend('Eu mesmo', Auth::id())
            ->prepend('Escolha uma pessoa', NULL)
        ->prepend('O próprio', 'this');

        $data['when_fields'] = resolve('OptionService')->pluck()
            ->prepend('Escolha', '')->mapWithKeys(function ($item, $key) {
                return !empty($key) ? ['option.' . $key => $item] : [$key => $item];
            })->union($data['when_fields']);

        if (isset($where) && $where == 'user') {
            $data['when_fields']['role'] = __('users.role');
        }

        if (isset($data['when_fields'])) {
            $data['when_fields'] = $data['when_fields']->sort();
        }
        return $data;
    }

}
