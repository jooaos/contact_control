<div>
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Contacts</h3>
                <p class="lead">
                    - Here you can find all contacts from system and use filter options
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <label for="nameFilter" class="form-label">Filter by name</label>
                <input id="nameFilter" wire:model="name" type="search" class="form-control" placeholder="Test">
            </div>
            <div class="col-sm-12 col-md-6 mt-2 mt-md-0">
                <label for="emailFilter" class="form-label">Filter by email</label>
                <input id="emailFilter" wire:model="email" type="search" class="form-control"
                    placeholder="test@example.com">
            </div>
        </div>
        <div class="d-flex mt-3">
            <a class="btn btn-outline-info ms-auto" data-bs-toggle="collapse" href="#collapseOptions" role="button"
                aria-expanded="false" aria-controls="collapseOptions">
                Check other options to filter
            </a>
        </div>
        <div class="collapse mt-3" id="collapseOptions" wire:ignore.self>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="cityFilter" class="form-label">Filter by city</label>
                    <input id="cityFilter" wire:model="city" type="search" class="form-control">
                </div>
                <div class="col-sm-12 col-md-6 mt-2 mt-md-0">
                    <label for="countryFilter" class="form-label">Filter by country</label>
                    <input id="countryFilter" wire:model="country" type="search" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12 col-md-6">
                    <label for="birthDateFilter" class="form-label">Filter by birth date</label>
                    <input id="birthDateFilter" wire:model="birth_date" type="date" class="form-control">
                </div>
                <div class="col-sm-12 col-md-6 mt-2 mt-md-0">
                    <label for="roleFilter" class="form-label">Filter by role</label>
                    <select id="roleFilter" name="roleFilter" wire:model="user_type" class="form-select"
                        aria-label="Default select example">
                        <option value="">Choose a role</option>
                        @foreach ($rolesAvailable as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($contacts as $contact)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $contact->name }}</h5>
                            <dl class="row">
                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8">{{ $contact->email }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">Role</dt>
                                <dd class="col-sm-8">{{ $contact->userType->type }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">Birth Date</dt>
                                <dd class="col-sm-8">{{ $contact->birth_date ?? 'NA' }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">Address</dt>
                                <dd class="col-sm-8">{{ $contact->address ?? 'NA' }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">City</dt>
                                <dd class="col-sm-8">{{ $contact->city ?? 'NA' }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">Country</dt>
                                <dd class="col-sm-8">{{ $contact->country ?? 'NA' }}</dd>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
