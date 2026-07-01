<?php
require_once 'config.php';

// Calculate risk level based on patient data
function calculateRiskLevel($data) {
    $risk_score = 0;
    
    // Age risk
    if (isset($data['age'])) {
        if ($data['age'] >= 60) $risk_score += 3;
        elseif ($data['age'] >= 45) $risk_score += 2;
        elseif ($data['age'] >= 30) $risk_score += 1;
    }
    
    // Blood Pressure risk
    if (isset($data['systolic_bp']) && isset($data['diastolic_bp'])) {
        if ($data['systolic_bp'] >= 140 || $data['diastolic_bp'] >= 90) $risk_score += 2;
    }
    
    // Blood Sugar risk
    if (isset($data['blood_sugar'])) {
        if ($data['blood_sugar'] >= 126) $risk_score += 3;
        elseif ($data['blood_sugar'] >= 100) $risk_score += 2;
    }
    
    // BMI risk
    if (isset($data['bmi'])) {
        if ($data['bmi'] >= 30) $risk_score += 2;
        elseif ($data['bmi'] >= 25) $risk_score += 1;
    }
    
    // Heart Rate risk
    if (isset($data['heart_rate'])) {
        if ($data['heart_rate'] >= 100) $risk_score += 1;
    }
    
    // Diabetes risk
    if (isset($data['pre_existing_diabetes']) && $data['pre_existing_diabetes']) $risk_score += 2;
    if (isset($data['gestational_diabetes']) && $data['gestational_diabetes']) $risk_score += 1;
    
    // Determine risk level
    if ($risk_score >= 8) return 'HIGH';
    elseif ($risk_score >= 5) return 'MEDIUM';
    else return 'LOW';
}

// Insert patient into database
function insertPatient($conn, $data) {
    // Calculate risk level first
    $risk_level = calculateRiskLevel($data);
    
    // Debug - remove after testing
    error_log("Risk Level Calculated: " . $risk_level);
    error_log("Patient Data: " . print_r($data, true));
    
    $sql = "INSERT INTO patients 
            (patient_name, age, systolic_bp, diastolic_bp, blood_sugar, body_temp, 
             bmi, previous_complications, pre_existing_diabetes, gestational_diabetes, 
             mental_health, heart_rate, risk_level_code) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        error_log("Prepare failed: " . mysqli_error($conn));
        return false;
    }
    
    // Set default values if not provided
    $previous_complications = $data['previous_complications'] ?? '';
    $pre_existing_diabetes = isset($data['pre_existing_diabetes']) ? 1 : 0;
    $gestational_diabetes = isset($data['gestational_diabetes']) ? 1 : 0;
    $mental_health = $data['mental_health'] ?? 'Good';
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "siiddddsiiiss", 
        $data['patient_name'],
        $data['age'],
        $data['systolic_bp'],
        $data['diastolic_bp'],
        $data['blood_sugar'],
        $data['body_temp'],
        $data['bmi'],
        $previous_complications,
        $pre_existing_diabetes,
        $gestational_diabetes,
        $mental_health,
        $data['heart_rate'],
        $risk_level  // Use calculated risk level
    );
    
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        error_log("Execute failed: " . mysqli_stmt_error($stmt));
    }
    
    mysqli_stmt_close($stmt);
    return $result;
}

// Get all patients
function getPatients($conn, $limit = null) {
    $sql = "SELECT * FROM patients ORDER BY created_at DESC";
    if ($limit) {
        $sql .= " LIMIT " . intval($limit);
    }
    
    $result = mysqli_query($conn, $sql);
    $patients = [];
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $patients[] = $row;
        }
    }
    
    return $patients;
}

// Get patient statistics
function getStatistics($conn) {
    $sql = "SELECT 
                COUNT(*) as total_patients,
                SUM(CASE WHEN risk_level_code = 'HIGH' THEN 1 ELSE 0 END) as high_risk_count,
                SUM(CASE WHEN risk_level_code = 'MEDIUM' THEN 1 ELSE 0 END) as medium_risk_count,
                SUM(CASE WHEN risk_level_code = 'LOW' THEN 1 ELSE 0 END) as low_risk_count,
                AVG(age) as avg_age,
                AVG(bmi) as avg_bmi,
                AVG(blood_sugar) as avg_blood_sugar
            FROM patients";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        return mysqli_fetch_assoc($result);
    }
    
    return [
        'total_patients' => 0,
        'high_risk_count' => 0,
        'medium_risk_count' => 0,
        'low_risk_count' => 0,
        'avg_age' => 0,
        'avg_bmi' => 0,
        'avg_blood_sugar' => 0
    ];
}

// Get risk color
function getRiskColor($level) {
    switch($level) {
        case 'HIGH': return '#ef4444';
        case 'MEDIUM': return '#f59e0b';
        case 'LOW': return '#10b981';
        default: return '#6b7280';
    }
}

// Validate form data
function validatePatientData($data) {
    $errors = [];
    
    if (empty($data['patient_name'])) $errors[] = "Patient name is required";
    if (empty($data['age']) || $data['age'] < 0 || $data['age'] > 120) $errors[] = "Age must be between 0-120";
    if (empty($data['systolic_bp']) || $data['systolic_bp'] < 50 || $data['systolic_bp'] > 250) $errors[] = "Systolic BP must be 50-250";
    if (empty($data['diastolic_bp']) || $data['diastolic_bp'] < 30 || $data['diastolic_bp'] > 150) $errors[] = "Diastolic BP must be 30-150";
    if (empty($data['blood_sugar']) || $data['blood_sugar'] < 50 || $data['blood_sugar'] > 500) $errors[] = "Blood sugar must be 50-500";
    if (empty($data['body_temp']) || $data['body_temp'] < 35 || $data['body_temp'] > 42) $errors[] = "Body temperature must be 35-42°C";
    if (empty($data['bmi']) || $data['bmi'] < 10 || $data['bmi'] > 50) $errors[] = "BMI must be 10-50";
    if (empty($data['heart_rate']) || $data['heart_rate'] < 40 || $data['heart_rate'] > 200) $errors[] = "Heart rate must be 40-200 bpm";
    
    return $errors;
}

// Sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>