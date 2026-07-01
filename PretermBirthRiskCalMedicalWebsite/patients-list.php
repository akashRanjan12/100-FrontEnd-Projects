<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Get all patients
$sql = "SELECT * FROM patients ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$patients = [];

while ($row = mysqli_fetch_assoc($result)) {
    $patients[] = $row;
}

// Get statistics
$stats = getStatistics($conn);

include 'includes/header.php';
?>

<div class="container">
    <h1 class="form-title">Patient Records</h1>
    <p class="form-subtitle">View and manage all patient risk assessments</p>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"><?php echo $stats['total_patients'] ?? 0; ?></div>
            <div class="stat-label">Total Patients</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" style="color: #ef4444"><?php echo $stats['high_risk_count'] ?? 0; ?></div>
            <div class="stat-label">High Risk</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" style="color: #f59e0b"><?php echo $stats['medium_risk_count'] ?? 0; ?></div>
            <div class="stat-label">Medium Risk</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" style="color: #10b981"><?php echo $stats['low_risk_count'] ?? 0; ?></div>
            <div class="stat-label">Low Risk</div>
        </div>
    </div>
    
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>BP</th>
                    <th>Blood Sugar</th>
                    <th>BMI</th>
                    <th>Heart Rate</th>
                    <th>Risk Level</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($patients)): ?>
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 40px;">
                            No patient records found. <a href="form.php">Add your first patient</a>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td>#<?php echo $patient['id']; ?></td>
                            <td><?php echo htmlspecialchars($patient['patient_name']); ?></td>
                            <td><?php echo $patient['age']; ?></td>
                            <td><?php echo $patient['systolic_bp'] . '/' . $patient['diastolic_bp']; ?></td>
                            <td><?php echo $patient['blood_sugar']; ?> mg/dL</td>
                            <td><?php echo $patient['bmi']; ?></td>
                            <td><?php echo $patient['heart_rate']; ?> bpm</td>
                            <td>
                                <?php
                                $color = '#6b7280';
                                if ($patient['risk_level_code'] == 'HIGH') $color = '#ef4444';
                                elseif ($patient['risk_level_code'] == 'MEDIUM') $color = '#f59e0b';
                                elseif ($patient['risk_level_code'] == 'LOW') $color = '#10b981';
                                ?>
                                <span class="risk-badge" style="background-color: <?php echo $color; ?>">
                                    <?php echo $patient['risk_level_code']; ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($patient['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>