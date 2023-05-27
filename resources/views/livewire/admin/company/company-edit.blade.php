<x-slot name="title">
   Edit Company
</x-slot>
<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 style="float: left"> Edit Company</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <form wire:submit.prevent="update">
                        <x-form.input type="text" label="true" key="name" name="name"
                                      labelName="name"/>
                        <x-form.input type="email" label="true" key="email" name="email"
                                      labelName="email"/>
                        <x-form.input type="text" label="true" key="url" name="url"
                                      labelName="url"/>
                        <x-form.input type="file" label="true" key="logo" name="logo"
                                      labelName="name"/>
                        @if(!empty($oldLogo))
                        <div class="mb-2">
                            <label class="fw-semibold fs-6 mb-2">Current Logo</label>
                            <br>

                                <img class="img-fluid" style="width: 200px;height: 100px"
                                     src="{{ filter_var($oldLogo, FILTER_VALIDATE_URL)? $oldLogo:asset('storage/'.$oldLogo) }}" alt="">
                        </div>
                        @endif

                        <button class="btn btn-primary">Update</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
