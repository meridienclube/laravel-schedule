<?PHP

namespace ConfrariaWeb\Schedule\Services;

use ConfrariaWeb\Schedule\Contracts\ScheduleFrequencyContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class ScheduleFrequencyService
{
    use ServiceTrait;

    public function __construct(ScheduleFrequencyContract $scheduleFrequencyOption)
    {
        $this->obj = $scheduleFrequencyOption;
    }

}
