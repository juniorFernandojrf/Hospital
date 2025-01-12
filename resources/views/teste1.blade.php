<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Login Section -->
        <div id="loginSection" class="section active">
            <div class="login-container">
                <h1>Hospital Management System</h1>
                <div class="login-form">
                    <input type="text" id="username" placeholder="Username" required>
                    <input type="password" id="password" placeholder="Password" required>
                    <select id="userType">
                        <option value="receptionist">Receptionist</option>
                        <option value="nurse">Nurse</option>
                        <option value="doctor">Doctor</option>
                        <option value="admin">Administrator</option>
                    </select>
                    <button onclick="login()">Login</button>
                </div>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div id="dashboardSection" class="section">
            <nav class="sidebar">
                <div class="user-info">
                    <img id="userAvatar" src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=150" alt="User avatar">
                    <span id="userName">User Name</span>
                    <span id="userRole">Role</span>
                </div>
                <ul id="menuItems">
                    <!-- Menu items will be dynamically populated based on user role -->
                </ul>
                <button onclick="logout()" class="logout-btn">Logout</button>
            </nav>

            <main class="main-content">
                <!-- Appointment Management -->
                <div id="appointmentModule" class="module">
                    <h2>Appointment Management</h2>
                    <div class="action-bar">
                        <button onclick="showAppointmentForm()">New Appointment</button>
                        <input type="date" id="appointmentDate" onchange="filterAppointments()">
                    </div>
                    <div id="appointmentsList" class="list-container"></div>
                </div>

                <!-- Patient Records -->
                <div id="recordsModule" class="module">
                    <h2>Patient Records</h2>
                    <div class="action-bar">
                        <button onclick="showPatientForm()">New Patient</button>
                        <input type="text" id="searchPatient" placeholder="Search patients..." onkeyup="searchPatients()">
                    </div>
                    <div id="patientsList" class="list-container"></div>
                </div>

                <!-- Screening Module -->
                <div id="screeningModule" class="module">
                    <h2>Patient Screening</h2>
                    <div class="screening-form">
                        <input type="text" id="patientId" placeholder="Patient ID">
                        <div class="vital-signs">
                            <input type="number" id="temperature" placeholder="Temperature">
                            <input type="number" id="bloodPressure" placeholder="Blood Pressure">
                            <input type="number" id="heartRate" placeholder="Heart Rate">
                        </div>
                        <textarea id="symptoms" placeholder="Symptoms"></textarea>
                        <button onclick="saveScreening()">Save Screening</button>
                    </div>
                    <div id="screeningsList" class="list-container"></div>
                </div>

                <!-- Admin Module -->
                <div id="adminModule" class="module">
                    <h2>Administration</h2>
                    <div class="admin-dashboard">
                        <div class="stats-container">
                            <div class="stat-card">
                                <h3>Total Patients</h3>
                                <span id="totalPatients">0</span>
                            </div>
                            <div class="stat-card">
                                <h3>Today's Appointments</h3>
                                <span id="todayAppointments">0</span>
                            </div>
                            <div class="stat-card">
                                <h3>Active Staff</h3>
                                <span id="activeStaff">0</span>
                            </div>
                        </div>
                        <div class="staff-management">
                            <h3>Staff Management</h3>
                            <button onclick="showStaffForm()">Add Staff Member</button>
                            <div id="staffList" class="list-container"></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>