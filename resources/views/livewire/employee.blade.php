<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    {{-- Page Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Employee Management</h2>
        <p class="text-sm text-gray-600">Add and manage employee records.</p>
    </div>

    {{-- Employee Form --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-100">
        <div class="bg-indigo-600 text-white px-6 py-4 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <h3 class="font-semibold text-lg">{{ $isEditing ? 'Edit Employee' : 'Add Employee' }}</h3>
        </div>

        <div class="p-6">
            <form wire:submit="save">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Employee Number --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employee Number</label>
                        <input type="text"
                            wire:model="employeeNumber"
                            maxlength="3"
                            placeholder="001"
                            {{ !$isEditing ? 'readonly' : '' }}
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('employeeNumber') border-red-500 @enderror {{ !$isEditing ? 'bg-gray-100 cursor-not-allowed' : '' }}">
                        @error('employeeNumber')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Position --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                        <input type="text" wire:model="position"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('position') border-red-500 @enderror">
                        @error('position')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" wire:model="firstName"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('firstName') border-red-500 @enderror">
                        @error('firstName')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" wire:model="lastName"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('lastName') border-red-500 @enderror">
                        @error('lastName')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" wire:model="email"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('email') border-red-500 @enderror">
                        @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="text"
                            wire:model="phone"
                            maxlength="11"
                            placeholder="09*********"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('phone') border-red-500 @enderror">
                        @error('phone')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Date Hired --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date Hired</label>
                        <input type="date" wire:model="hiredAt"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm @error('hiredAt') border-red-500 @enderror">
                        @error('hiredAt')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Action Buttons --}}
                <div class="mt-6 flex justify-end gap-3">
                    @if($isEditing)
                    <button type="button" wire:click="cancelEdit"
                        class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 focus:outline-none transition ease-in-out duration-150">
                        Cancel
                    </button>
                    @endif

                    <button type="submit" wire:loading.attr="disabled"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <span wire:loading.remove>{{ $isEditing ? 'Update Employee' : 'Save Employee' }}</span>
                        <span wire:loading class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24" fill="none">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            Saving...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Employee List --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h3 class="font-bold text-gray-800 text-lg">Employee List</h3>
                <p class="text-xs text-gray-500">All registered employees</p>
            </div>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                {{ $employees->total() }} Employees
            </span>
        </div>

        <div class="overflow-x-auto">
            @if($employees->count() > 0)
            <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                <thead class="bg-gray-50 text-gray-600 font-medium">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Employee No.</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Position</th>
                        <th class="px-6 py-3">Date Hired</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($employees as $employee)
                    <tr class="hover:bg-gray-50 transition" wire:key="{{ $employee->id }}">
                        <td class="px-6 py-4 text-gray-500">
                            {{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 font-mono font-semibold text-xs text-gray-700">
                            <span class="bg-gray-100 px-2 py-1 rounded border">{{ $employee->employee_number }}</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $employee->email }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $employee->phone ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $employee->position }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($employee->hired_at)->format('M d, Y') }}</td>

                        {{-- Actions Column --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <!-- Edit Button -->
                                <button wire:click="edit({{ $employee->id }})"
                                    class="inline-flex items-center px-2.5 py-1.5 bg-amber-50 text-amber-700 hover:bg-amber-100 border border-amber-200 rounded text-xs font-medium transition duration-150">
                                    <svg class="w-3.5 h-3.5 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <button wire:click="delete({{ $employee->id }})" wire:confirm="Are you sure you want to delete this employee record?"
                                    class="inline-flex items-center px-2.5 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 border border-red-200 rounded text-xs font-medium transition duration-150">
                                    <svg class="w-3.5 h-3.5 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination Links --}}
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                {{ $employees->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-base font-medium">No Employees Found</p>
                <p class="text-gray-400 text-sm mt-1">Add your first employee using the form above.</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Success Modal --}}
    @if($showSuccessModal)
    <div class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full text-center">
            <div class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-1">Employee Saved!</h3>
            <p class="text-sm text-gray-500 mb-6">The employee record has been successfully updated in the database.</p>
            <button wire:click="closeSuccessModal" type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:text-sm">
                OK
            </button>
        </div>
    </div>
    @endif

</div>