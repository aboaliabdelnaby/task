<x-slot name="title">
    Employees
</x-slot>
<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 style="float: left">Employees</h2>
                <div style="float:right;">
                    <input type="text"
                           wire:model="search"
                           class="form-control form-control-solid w-250px ps-14"
                           placeholder="Search name ,email"
                    />
                </div>
                <x-general.create-modal title="Create Employee">
                    <x-slot name="form">
                        <livewire:admin.employee.employee-create/>
                    </x-slot>
                </x-general.create-modal>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">first name</th>
                            <th scope="col">last name</th>
                            <th scope="col">email</th>
                            <th scope="col">phone</th>
                            <th scope="col">company</th>
                            <th scope="col">is intern</th>
                            <x-datatable.th sortByColumn="started_at"
                                            labelName="started at"/>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->company->name }}</td>
                                <td>{!! $this->internStatus($row->is_intern) !!}</td>
                                <td>{{ $this->formatDate($row->started_at) }}</td>
                                <td>
                                    <a class="btn btn-warning text-white mb-2"
                                       href="{{route('admin.employee.show',$row->id)}}">
                                        Show
                                    </a>
                                    <a class="btn btn-success mb-2"
                                       href="{{route('admin.employee.edit',$row->id)}}">
                                        Edit
                                    </a>
                                    <a wire:click="$emit('deleting', '{{$row->id}}' , 'company')"
                                       class="btn btn-danger mb-2 text-white">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="100%">
                                <div class="text-center mt-2" style="font-size: 18px;">
                                    No Data Found
                                </div>
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row float-end">
                    <div class="col">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
