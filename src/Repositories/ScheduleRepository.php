<?PHP

namespace ConfrariaWeb\Schedule\Repositories;

use ConfrariaWeb\Schedule\Contracts\ScheduleContract;
use ConfrariaWeb\Schedule\Models\Schedule;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class ScheduleRepository implements ScheduleContract
{

    use RepositoryTrait;

    public $obj;

    function __construct(Schedule $schedule)
    {
        $this->obj = $schedule;
    }

}
