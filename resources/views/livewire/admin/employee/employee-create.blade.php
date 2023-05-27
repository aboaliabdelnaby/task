<div>
    <form wire:submit.prevent="create">
        <x-form.input type="text" label="true" key="first_name" name="first_name"
                      labelName="first name"/>
        <x-form.input type="text" label="true" key="last_name" name="last_name"
                      labelName="last name"/>
        <x-form.input type="email" label="true" key="email" name="email"
                      labelName="email"/>
        <x-form.input type="text" label="true" key="phone" name="phone"
                      labelName="phone"/>
       <div class="col-12 mb-2">
           <label for="company">Company</label>
           <select id="company" class="form-select" wire:model="company_id">
               <option disabled selected value="">Select Company</option>
               @foreach($this->getAllCompanies() as $company)
                   <option value="{{ $company->id }}">{{ $company->name }}</option>
               @endforeach
           </select>
           @error('company_id') <span class="text-danger" style="font-weight: bold">{{ $message }}</span> @enderror
       </div>
        <button class="btn btn-primary">Add</button>

    </form>
</div>
