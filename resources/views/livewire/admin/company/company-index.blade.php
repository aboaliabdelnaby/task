<x-slot name="title">
    Companies
</x-slot>
<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 style="float: left">Companies</h2>
                <div style="float:right;">
                    <input type="text"
                              wire:model="search"
                              class="form-control form-control-solid w-250px ps-14"
                              placeholder="Search name ,email"
                    />
                </div>
                <x-general.create-modal title="Create Company">
                    <x-slot name="form">
                      <livewire:admin.company.company-create/>
                    </x-slot>
                </x-general.create-modal>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">url</th>
                            <th scope="col">logo</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td><a href="{{ $row->url }}" class="btn btn-info text-white" target="_blank">URL</a></td>
                                <td><img style="width: 50px;height: 30px" src="{{ filter_var($row->logo, FILTER_VALIDATE_URL)? $row->logo:asset('storage/'.$row->logo) }}"></td>
                                <td>
                                    <a class="btn btn-warning text-white mb-2"
                                       href="{{route('admin.company.show',$row->id)}}">
                                        Show
                                    </a>
                                    <a class="btn btn-success mb-2"
                                       href="{{route('admin.company.edit',$row->id)}}">
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
