<?PHP

namespace ConfrariaWeb\Schedule\Repositories;

use ConfrariaWeb\Schedule\Contracts\ScheduleFrequencyOptionContract;
use ConfrariaWeb\Schedule\Models\ScheduleFrequencyOption;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class ScheduleFrequencyOptionRepository implements ScheduleFrequencyOptionContract
{

    Use RepositoryTrait;

    function __construct(ScheduleFrequencyOption $scheduleFrequencyOption)
    {
        $this->obj = $scheduleFrequencyOption;
    }

}
