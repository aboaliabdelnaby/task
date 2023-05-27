<x-slot name="title">
    Show Company
</x-slot>
<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 style="float: left"> Show Company</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="col">name</th>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">email</th>
                            <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <th scope="col">url</th>
                            <td><a href="{{ $data->url }}" class="btn btn-info text-white" target="_blank">URL</a></td>
                        </tr>
                        <tr>
                            <th scope="col">logo</th>
                            <td><img style="width: 200px;height: 100px" src="{{ filter_var($data->logo, FILTER_VALIDATE_URL)? $data->logo:asset('storage/'.$data->logo) }}"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2 style="float: left"> Company Employees</h2>
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
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data->employees as $row)
                            <tr>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                            </tr>
                        @empty
                            <td colspan="100%">
                                <div class="text-center mt-2" style="font-size: 18px;">
                                    No Data Found
                                </div>
                            </td>
                        @endforelse
                        </tbody>
                    </table>                </div>
            </div>
        </div>
    </div>
</div>
