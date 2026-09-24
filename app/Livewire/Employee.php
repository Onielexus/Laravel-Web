<?php

namespace App\Livewire;

use App\Models\Employee as EmployeeModel;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[Layout('layouts.app')]
#[Title('Employee')]
class Employee extends Component
{
    use WithPagination, WithoutUrlPagination;

    public ?int $employeeId = null;
    public string $employeeNumber = '';
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $phone = '';
    public string $position = '';
    public string $hiredAt = '';

    public bool $isEditing = false;
    public bool $showSuccessModal = false;

    protected function rules(): array
    {
        return [
            // Forces exactly 3 digits matching 001 to 100
            'employeeNumber' => [
                'required',
                'string',
                'regex:/^(0[0-9]{2}|100)$/',
                'unique:employees,employee_number,' . $this->employeeId,
            ],
            'firstName' => 'required|string|max:255',
            'lastName'  => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:employees,email,' . $this->employeeId,
            'phone'     => 'nullable|string|max:30',
            'position'  => 'required|string|max:255',
            'hiredAt'   => 'required|date|before_or_equal:today',
        ];
    }

    protected function messages(): array
    {
        return [
            'employeeNumber.regex' => 'The employee number must be 3 digits between 001 and 100.',
        ];
    }

    public function edit(int $id): void
    {
        $employee = EmployeeModel::findOrFail($id);

        $this->employeeId     = $employee->id;
        $this->employeeNumber = $employee->employee_number;
        $this->firstName      = $employee->first_name;
        $this->lastName       = $employee->last_name;
        $this->email          = $employee->email;
        $this->phone          = $employee->phone ?? '';
        $this->position       = $employee->position;
        $this->hiredAt        = $employee->hired_at;

        $this->isEditing = true;
    }

    public function cancelEdit(): void
    {
        $this->resetInputFields();
    }

    public function delete(int $id): void
    {
        EmployeeModel::findOrFail($id)->delete();

        if ($this->employeeId === $id) {
            $this->resetInputFields();
        }
    }

    public function save(): void
    {
        $this->validate();

        EmployeeModel::updateOrCreate(
            ['id' => $this->employeeId],
            [
                'employee_number' => $this->employeeNumber,
                'first_name'      => $this->firstName,
                'last_name'       => $this->lastName,
                'email'           => $this->email,
                'phone'           => $this->phone ?: null,
                'position'        => $this->position,
                'hired_at'        => $this->hiredAt,
            ]
        );

        $this->resetInputFields();
        $this->showSuccessModal = true;
    }

    public function closeSuccessModal(): void
    {
        $this->showSuccessModal = false;
    }

    private function resetInputFields(): void
    {
        $this->reset(['employeeId', 'employeeNumber', 'firstName', 'lastName', 'email', 'phone', 'position', 'hiredAt']);
        $this->isEditing = false;
    }

    public function render(): View
    {
        return view('livewire.employee', [
            // Replaced ->get() with ->paginate(10)
            'employees' => EmployeeModel::latest()->paginate(4),
        ]);
    }
}
