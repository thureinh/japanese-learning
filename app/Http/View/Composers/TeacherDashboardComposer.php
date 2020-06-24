<?php

namespace App\Http\View\Composers;

use App\User;
use Illuminate\View\View;

class TeacherDashboardComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $students;
    protected $teachers;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->students = User::where('is_Teacher', false);
        $this->teachers = User::where('is_Teacher', true);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $data = [
            'studentcount' => $this->students->count(),
            'teachercount' => $this->teachers->count()
        ];
        $view->with($data);
    }
}