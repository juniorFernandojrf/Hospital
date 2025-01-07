<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Reception</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
        }
        .header .title {
            font-size: 1.5rem;
        }
        .card {
            margin-bottom: 20px;
        }
        .priority-badge {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 20px;
        }
        .priority-normal {
            background-color: #6c757d;
            color: white;
        }
        .priority-urgent {
            background-color: #ffc107;
            color: black;
        }
        .priority-emergency {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <header class="header d-flex justify-content-between align-items-center">
        <div class="title">Hospital Reception</div>
        <div id="current-time"></div>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">Register New Patient</div>
                    <div class="card-body">
                        <form id="register-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter patient name">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob">
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="Enter CPF">
                            </div>
                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason for Visit</label>
                                <input type="text" class="form-control" id="reason" placeholder="Enter reason for visit">
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">Priority</label>
                                <select class="form-select" id="priority">
                                    <option value="normal">Normal</option>
                                    <option value="urgent">Urgent</option>
                                    <option value="emergency">Emergency</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Register Patient</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-success text-white">Search Existing Patients</div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="search" placeholder="Search by name or CPF">
                            <button class="btn btn-primary" type="button">Search</button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>CPF</th>
                                    <th>Last Visit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="patient-list">
                                <tr>
                                    <td>John Doe</td>
                                    <td>123.456.789-00</td>
                                    <td>2025-01-01</td>
                                    <td>
                                        <button class="btn btn-sm btn-info">Edit</button>
                                        <button class="btn btn-sm btn-secondary">History</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-warning text-dark">Waiting List</div>
                    <div class="card-body">
                        <ul class="list-group" id="waiting-list">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Jane Smith <span class="priority-badge priority-urgent">Urgent</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Mark Brown <span class="priority-badge priority-emergency">Emergency</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update the current time
        function updateTime() {
            const now = new Date();
            document.getElementById('current-time').innerText = now.toLocaleString();
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Event listener for form submission
        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Patient registered successfully!');
        });
    </script>
</body>
</html>
