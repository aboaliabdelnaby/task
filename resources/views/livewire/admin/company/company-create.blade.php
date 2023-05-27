<div>
    <form wire:submit.prevent="create">
        <x-form.input type="text" label="true" key="name" name="name"
                      labelName="name"/>
        <x-form.input type="email" label="true" key="email" name="email"
                      labelName="email"/>
        <x-form.input type="text" label="true" key="url" name="url"
                      labelName="url"/>
        <x-form.input type="file" label="true" key="logo" name="logo"
                      labelName="name"/>
        <button class="btn btn-primary">Add</button>

    </form>
</div>
