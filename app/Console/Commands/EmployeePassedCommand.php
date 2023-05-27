<?php

namespace App\Console\Commands;

use App\Enums\InternStatusEnum;
use App\Models\Employee;
use App\MyPackages\Livewire\Filters\Pipeline;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EmployeePassedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:passed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'checks whether all interned employees have
passed the internship and then changes the is_intern flag to false';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expireDate = Carbon::now()->subWeek();
        $query = app(Pipeline::class)->setModel(Employee::class);
        $query->where('is_intern',InternStatusEnum::Intern->value)->where('started_at','<',$expireDate)->update([
            'is_intern'=>InternStatusEnum::NotIntern->value
        ]);


    }
}
