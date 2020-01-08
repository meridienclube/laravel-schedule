<?PHP

namespace ConfrariaWeb\Schedule\Services;

use ConfrariaWeb\Schedule\Contracts\ScheduleFrequencyOptionContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class ScheduleFrequencyOptionService
{
    use ServiceTrait;

    public function __construct(ScheduleFrequencyOptionContract $scheduleFrequencyOption)
    {
        $this->obj = $scheduleFrequencyOption;
    }

}
