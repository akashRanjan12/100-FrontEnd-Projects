<?php
require_once 'includes/functions.php';

$stats = getStatistics($conn);
$patients = getPatients($conn, 10);

include 'includes/header.php';
?>

<div class="container">
    <h1 class="form-title">Analytics Dashboard</h1>
    <p class="form-subtitle">Monitor patient risk trends and statistics</p>
    
    <div class="dashboard-grid">
        <div class="card">
            <h3 class="card-title">Risk Distribution</h3>
            <div class="risk-distribution">
                <?php
                $total = $stats['total_patients'] ?: 1;
                $highPercent = ($stats['high_risk_count'] / $total) * 100;
                $mediumPercent = ($stats['medium_risk_count'] / $total) * 100;
                $lowPercent = ($stats['low_risk_count'] / $total) * 100;
                ?>
                
                <div class="risk-bar">
                    <span class="risk-bar-label">High</span>
                    <div class="risk-bar-progress">
                        <div class="risk-bar-fill" style="width: <?php echo $highPercent; ?>%; background-color: #ef4444;"></div>
                    </div>
                    <span class="risk-bar-count"><?php echo $stats['high_risk_count']; ?></span>
                </div>
                
                <div class="risk-bar">
                    <span class="risk-bar-label">Medium</span>
                    <div class="risk-bar-progress">
                        <div class="risk-bar-fill" style="width: <?php echo $mediumPercent; ?>%; background-color: #f59e0b;"></div>
                    </div>
                    <span class="risk-bar-count"><?php echo $stats['medium_risk_count']; ?></span>
                </div>
                
                <div class="risk-bar">
                    <span class="risk-bar-label">Low</span>
                    <div class="risk-bar-progress">
                        <div class="risk-bar-fill" style="width: <?php echo $lowPercent; ?>%; background-color: #10b981;"></div>
                    </div>
                    <span class="risk-bar-count"><?php echo $stats['low_risk_count']; ?></span>
                </div>
            </div>
            
            <div style="margin-top: 30px;">
                <h4 style="margin-bottom: 15px; color: #374151;">Average Statistics</h4>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
                    <div>
                        <div style="font-size: 0.9rem; color: #6b7280;">Avg Age</div>
                        <div style="font-size: 1.5rem; font-weight: 700;"><?php echo round($stats['avg_age'] ?? 0, 1); ?></div>
                    </div>
                    <div>
                        <div style="font-size: 0.9rem; color: #6b7280;">Avg BMI</div>
                        <div style="font-size: 1.5rem; font-weight: 700;"><?php echo round($stats['avg_bmi'] ?? 0, 1); ?></div>
                    </div>
                    <div>
                        <div style="font-size: 0.9rem; color: #6b7280;">Avg Sugar</div>
                        <div style="font-size: 1.5rem; font-weight: 700;"><?php echo round($stats['avg_blood_sugar'] ?? 0, 1); ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h3 class="card-title">Recent Patients</h3>
            <?php if (empty($patients)): ?>
                <p style="color: #6b7280; text-align: center;">No recent patients</p>
            <?php else: ?>
                <?php foreach ($patients as $patient): ?>
                    <div style="padding: 12px; border-bottom: 1px solid #f3f4f6;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <strong><?php echo htmlspecialchars($patient['patient_name']); ?></strong>
                            <span class="risk-badge" style="background-color: <?php echo getRiskColor($patient['risk_level_code']); ?>; padding: 2px 8px;">
                                <?php echo $patient['risk_level_code']; ?>
                            </span>
                        </div>
                        <div style="font-size: 0.9rem; color: #6b7280;">
                            Age: <?php echo $patient['age']; ?> | 
                            BP: <?php echo $patient['systolic_bp'] . '/' . $patient['diastolic_bp']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <a href="patients-list.php" style="display: block; text-align: center; margin-top: 20px; color: var(--primary-color); text-decoration: none;">
                    View All Patients →
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>