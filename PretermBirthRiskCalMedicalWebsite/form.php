<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debug - remove after testing
    error_log("Form submitted: " . print_r($_POST, true));
    
    // Sanitize and validate input
    $errors = validatePatientData($_POST);
    
    if (empty($errors)) {
        // Prepare data for insertion
        $data = [
            'patient_name' => sanitizeInput($_POST['patient_name']),
            'age' => intval($_POST['age']),
            'systolic_bp' => intval($_POST['systolic_bp']),
            'diastolic_bp' => intval($_POST['diastolic_bp']),
            'blood_sugar' => floatval($_POST['blood_sugar']),
            'body_temp' => floatval($_POST['body_temp']),
            'bmi' => floatval($_POST['bmi']),
            'previous_complications' => isset($_POST['previous_complications']) ? sanitizeInput($_POST['previous_complications']) : '',
            'pre_existing_diabetes' => isset($_POST['pre_existing_diabetes']) ? 1 : 0,
            'gestational_diabetes' => isset($_POST['gestational_diabetes']) ? 1 : 0,
            'mental_health' => isset($_POST['mental_health']) ? sanitizeInput($_POST['mental_health']) : 'Good',
            'heart_rate' => intval($_POST['heart_rate'])
        ];
        
        // Calculate risk level before insertion
        $risk_level = calculateRiskLevel($data);
        
        if (insertPatient($conn, $data)) {
            $message = "Patient data saved successfully! Risk level: " . $risk_level;
            $messageType = 'success';
            
            // Clear form data (optional)
            $_POST = array();
        } else {
            $message = "Error saving patient data. Please try again.";
            $messageType = 'error';
            error_log("Insert failed for data: " . print_r($data, true));
        }
    } else {
        $message = implode("<br>", $errors);
        $messageType = 'error';
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="form-container">
        <h1 class="form-title">Patient Risk Assessment Form</h1>
        <p class="form-subtitle">Complete all required fields to assess patient health risks</p>
        
        <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="" onsubmit="return validateForm()">
            <!-- Personal Information -->
            <div class="form-section">
                <h3 class="section-title">Personal Information</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="patient_name">
                            Patient Name <span class="required">*</span>
                        </label>
                        <input type="text" id="patient_name" name="patient_name" 
                               placeholder="Enter full name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="age">
                            Age (Years) <span class="required">*</span>
                        </label>
                        <input type="number" id="age" name="age" 
                               placeholder="e.g., 35" min="0" max="120" required>
                    </div>
                </div>
            </div>
            
            <!-- Vital Signs -->
            <div class="form-section">
                <h3 class="section-title">Vital Signs</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="systolic_bp">
                            Systolic BP (mmHg) <span class="required">*</span>
                        </label>
                        <input type="number" id="systolic_bp" name="systolic_bp" 
                               placeholder="e.g., 120" min="50" max="250" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="diastolic_bp">
                            Diastolic BP (mmHg) <span class="required">*</span>
                        </label>
                        <input type="number" id="diastolic_bp" name="diastolic_bp" 
                               placeholder="e.g., 80" min="30" max="150" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="blood_sugar">
                            Blood Sugar (mg/dL) <span class="required">*</span>
                        </label>
                        <input type="number" step="0.1" id="blood_sugar" name="blood_sugar" 
                               placeholder="e.g., 95" min="50" max="500" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="body_temp">
                            Body Temperature (°C) <span class="required">*</span>
                        </label>
                        <input type="number" step="0.1" id="body_temp" name="body_temp" 
                               placeholder="e.g., 36.6" min="35" max="42" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="heart_rate">
                            Heart Rate (bpm) <span class="required">*</span>
                        </label>
                        <input type="number" id="heart_rate" name="heart_rate" 
                               placeholder="e.g., 72" min="40" max="200" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="weight">Weight (kg)</label>
                        <input type="number" step="0.1" id="weight" name="weight" 
                               placeholder="e.g., 70">
                    </div>
                    
                    <div class="form-group">
                        <label for="height">Height (cm)</label>
                        <input type="number" step="0.1" id="height" name="height" 
                               placeholder="e.g., 170">
                    </div>
                    
                    <div class="form-group">
                        <label for="bmi">
                            BMI (kg/m²) <span class="required">*</span>
                        </label>
                        <input type="number" step="0.1" id="bmi" name="bmi" 
                               placeholder="e.g., 24.5" min="10" max="50" required>
                        <small id="bmiHelp" class="bmi-help"></small>
                    </div>
                </div>
            </div>
            
            <!-- Medical History -->
            <div class="form-section">
                <h3 class="section-title">Medical History</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="previous_complications">Previous Complications</label>
                        <select id="previous_complications" name="previous_complications">
                            <option value="">Select complications</option>
                            <option value="None">None</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Cardiovascular">Cardiovascular</option>
                            <option value="Respiratory">Respiratory</option>
                            <option value="Renal">Renal</option>
                            <option value="Neurological">Neurological</option>
                            <option value="Diabetes">Diabetes</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="mental_health">Mental Health Status</label>
                        <select id="mental_health" name="mental_health">
                            <option value="Good">Good</option>
                            <option value="Fair">Fair</option>
                            <option value="Poor">Poor</option>
                            <option value="Requires Support">Requires Support</option>
                        </select>
                    </div>
                </div>
                
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="pre_existing_diabetes" name="pre_existing_diabetes">
                        <label for="pre_existing_diabetes">Pre-existing Diabetes</label>
                    </div>
                    
                    <div class="checkbox-item">
                        <input type="checkbox" id="gestational_diabetes" name="gestational_diabetes">
                        <label for="gestational_diabetes">Gestational Diabetes</label>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">Save Patient Data</button>
                <button type="reset" class="reset-btn" onclick="return confirm('Reset all fields?')">Reset Form</button>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>