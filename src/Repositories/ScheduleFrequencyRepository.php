<?PHP

namespace ConfrariaWeb\Schedule\Repositories;

use ConfrariaWeb\Schedule\Contracts\ScheduleFrequencyContract;
use ConfrariaWeb\Schedule\Models\ScheduleFrequencyOption;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class ScheduleFrequencyRepository implements ScheduleFrequencyContract
{

    Use RepositoryTrait;

    function __construct(ScheduleFrequencyOption $scheduleFrequencyOption)
    {
        $this->obj = $scheduleFrequencyOption;
    }

}
