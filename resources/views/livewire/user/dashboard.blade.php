<div>
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Dashboard</h3>
                <p class="lead">
                    - Here you can find some details about the application using filters
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
    </section>
    <section class="mt-4">
        <div>
            <h5 class="mt-4">Table</h5>
            <p class="lead">
                <small>
                    - Here you can verify simple info about users
                </small>
            </p>
        </div>
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $key => $value)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->userType->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="mt-4 mb-4">
        <div>
            <h5 class="mt-4">Pie Chart</h5>
            <p class="lead">
                <small>
                    - Here you can verify the quantity of differents roles
                </small>
            </p>
        </div>
        <canvas id="pieChart"></canvas>
        <script>
            const ctx = document.getElementById('pieChart');
            const chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Super Admin', 'Admin', 'Member'],
                    datasets: [{
                        label: 'Roles',
                        data: [
                            {{ implode(',', array_values($countRoles)) }}
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    aspectRatio: 1.4,
                    responsive: true
                }
            });
            Livewire.on('chartDataUpdated', newData => {
                chart.data.datasets[0].data = Object.values(newData)
            });
        </script>
    </section>
</div>
