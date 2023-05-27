<x-slot name="title">
    Show Employee
</x-slot>
<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 style="float: left"> Show Employee</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="col">first name</th>
                            <td>{{ $data->first_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">last name</th>
                            <td>{{ $data->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">email</th>
                            <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <th scope="col">phone</th>
                            <td>{{ $data->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="col">is intern</th>
                            <td>{!! $this->internStatus($data->is_intern) !!}</td>
                        </tr>
                        <tr>
                            <th scope="col">started at</th>
                            <td>{{ $this->formatDate($data->started_at) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
