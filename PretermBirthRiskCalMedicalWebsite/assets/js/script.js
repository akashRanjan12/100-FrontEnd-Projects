// Mobile menu toggle
function toggleMobileMenu() {
  const menu = document.getElementById("mobileMenu");
  menu.classList.toggle("active");
}

// Form validation
function validateForm() {
  let isValid = true;
  const errors = {};

  // Get form values
  const patientName = document.getElementById("patient_name")?.value;
  const age = document.getElementById("age")?.value;
  const systolicBP = document.getElementById("systolic_bp")?.value;
  const diastolicBP = document.getElementById("diastolic_bp")?.value;
  const bloodSugar = document.getElementById("blood_sugar")?.value;
  const bodyTemp = document.getElementById("body_temp")?.value;
  const bmi = document.getElementById("bmi")?.value;
  const heartRate = document.getElementById("heart_rate")?.value;

  // Validation rules
  if (!patientName?.trim()) {
    errors.patient_name = "Patient name is required";
    isValid = false;
  }

  if (!age || age < 0 || age > 120) {
    errors.age = "Age must be between 0-120";
    isValid = false;
  }

  if (!systolicBP || systolicBP < 50 || systolicBP > 250) {
    errors.systolic_bp = "Systolic BP must be 50-250";
    isValid = false;
  }

  if (!diastolicBP || diastolicBP < 30 || diastolicBP > 150) {
    errors.diastolic_bp = "Diastolic BP must be 30-150";
    isValid = false;
  }

  if (!bloodSugar || bloodSugar < 50 || bloodSugar > 500) {
    errors.blood_sugar = "Blood sugar must be 50-500";
    isValid = false;
  }

  if (!bodyTemp || bodyTemp < 35 || bodyTemp > 42) {
    errors.body_temp = "Body temperature must be 35-42°C";
    isValid = false;
  }

  if (!bmi || bmi < 10 || bmi > 50) {
    errors.bmi = "BMI must be 10-50";
    isValid = false;
  }

  if (!heartRate || heartRate < 40 || heartRate > 200) {
    errors.heart_rate = "Heart rate must be 40-200";
    isValid = false;
  }

  // Display errors
  displayErrors(errors);

  return isValid;
}

// Display form errors
function displayErrors(errors) {
  // Clear all error messages
  document.querySelectorAll(".error-message").forEach((el) => el.remove());
  document
    .querySelectorAll(".error")
    .forEach((el) => el.classList.remove("error"));

  // Display new errors
  for (const [field, message] of Object.entries(errors)) {
    const input = document.getElementById(field);
    if (input) {
      input.classList.add("error");
      const errorDiv = document.createElement("span");
      errorDiv.className = "error-message";
      errorDiv.textContent = message;
      input.parentNode.appendChild(errorDiv);
    }
  }
}

// Auto-calculate BMI
function calculateBMI() {
  const weight = document.getElementById("weight")?.value;
  const height = document.getElementById("height")?.value;

  if (weight && height) {
    const heightInMeters = height / 100;
    const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(1);
    document.getElementById("bmi").value = bmi;

    // Update BMI category
    updateBMICategory(bmi);
  }
}

// Update BMI category display
function updateBMICategory(bmi) {
  const bmiHelp = document.getElementById("bmiHelp");
  if (bmiHelp) {
    if (bmi >= 30) bmiHelp.textContent = "Obese";
    else if (bmi >= 25) bmiHelp.textContent = "Overweight";
    else if (bmi >= 18.5) bmiHelp.textContent = "Normal";
    else bmiHelp.textContent = "Underweight";
  }
}

// Show/hide password (if needed)
function togglePassword(fieldId) {
  const field = document.getElementById(fieldId);
  if (field.type === "password") {
    field.type = "text";
  } else {
    field.type = "password";
  }
}

// Confirm delete action
function confirmDelete(message) {
  return confirm(message || "Are you sure you want to delete this record?");
}

// Format date
function formatDate(dateString) {
  const date = new Date(dateString);
  return date.toLocaleDateString("en-US", {
    year: "numeric",
    month: "short",
    day: "numeric",
  });
}

// Load statistics via AJAX
function loadStatistics() {
  fetch("api/patient_api.php?action=stats")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        updateStatisticsDisplay(data.data);
      }
    })
    .catch((error) => console.error("Error:", error));
}

// Update statistics display
function updateStatisticsDisplay(stats) {
  const statsContainer = document.getElementById("statistics");
  if (statsContainer) {
    statsContainer.innerHTML = `
            <div class="stat-card">
                <div class="stat-number">${stats.total_patients || 0}</div>
                <div class="stat-label">Total Patients</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color: #ef4444">${stats.high_risk_count || 0}</div>
                <div class="stat-label">High Risk</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color: #f59e0b">${stats.medium_risk_count || 0}</div>
                <div class="stat-label">Medium Risk</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color: #10b981">${stats.low_risk_count || 0}</div>
                <div class="stat-label">Low Risk</div>
            </div>
        `;
  }
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", function () {
  // Add event listeners for BMI calculation
  const weightInput = document.getElementById("weight");
  const heightInput = document.getElementById("height");

  if (weightInput) weightInput.addEventListener("input", calculateBMI);
  if (heightInput) heightInput.addEventListener("input", calculateBMI);

  // Close mobile menu when clicking outside
  document.addEventListener("click", function (event) {
    const mobileMenu = document.getElementById("mobileMenu");
    const menuBtn = document.querySelector(".mobile-menu-btn");

    if (mobileMenu && mobileMenu.classList.contains("active")) {
      if (
        !mobileMenu.contains(event.target) &&
        !menuBtn.contains(event.target)
      ) {
        mobileMenu.classList.remove("active");
      }
    }
  });

  // Load statistics if on dashboard
  if (document.getElementById("statistics")) {
    loadStatistics();
  }
});
