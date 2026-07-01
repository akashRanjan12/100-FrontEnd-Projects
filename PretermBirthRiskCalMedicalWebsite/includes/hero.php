<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/hero.css">
</head>
<body>
    <div class="hero-wrapper">
    <!-- Background Elements -->
    <div class="hero-bg-elements">
        <div class="floating-circle circle-1"></div>
        <div class="floating-circle circle-2"></div>
        <div class="floating-circle circle-3"></div>
        <div class="pulse-line"></div>
    </div>
    
    <!-- Particles -->
    <div class="particles" id="particles"></div>
    
    <!-- Floating Elements -->
    <div class="floating-elements-modern">
        <div class="floating-item floating-item-3">
            <span class="floating-icon">❤️</span>
            <span class="floating-text">98% Success Rate</span>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="hero-container-modern">
        <!-- Left Content -->
        <div class="hero-content-modern"><br>            
            <h1 class="hero-title-modern">
                <span class="title-line-modern">Your Health,</span>
                <span class="title-line-modern title-highlight">Our Commitment</span>
                <span class="title-line-modern">to Excellence</span>
            </h1>
            
            <p class="hero-subtitle-modern">
                Experience world-class healthcare with cutting-edge technology, 
                compassionate doctors, and personalized treatment plans designed 
                specifically for you and your family's wellbeing.
            </p>
            
            <!-- Stats Row -->
            <div class="hero-stats-row">
                <div class="hero-stat-item">
                    <div class="hero-stat-number">15+</div>
                    <div class="hero-stat-label">Years Experience</div>
                </div>
                <div class="hero-stat-item">
                    <div class="hero-stat-number"><?php echo $stats['total_patients'] ?? '5K+'; ?></div>
                    <div class="hero-stat-label">Happy Patients</div>
                </div>
                <div class="hero-stat-item">
                    <div class="hero-stat-number">24/7</div>
                    <div class="hero-stat-label">Emergency Care</div>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="hero-buttons-modern">
                <a href="form.php" class="btn-primary-modern">
                    <span class="btn-icon-modern">📋</span>
                    Start Assessment
                </a>
                <a href="#learn-more" class="btn-secondary-modern">
                    <span class="btn-icon-modern">📹</span>
                    Watch Video
                </a>
            </div>
            
            <!-- Feature Cards -->
            <div class="hero-features-modern">
                <div class="feature-card-modern">
                    <div class="feature-icon-modern">🚑</div>
                    <div class="feature-content-modern">
                        <h4>Emergency Care</h4>
                        <p>24/7 available emergency services</p>
                    </div>
                </div>
                <div class="feature-card-modern">
                    <div class="feature-icon-modern">📊</div>
                    <div class="feature-content-modern">
                        <h4>Risk Assessment</h4>
                        <p>AI-powered health analysis</p>
                    </div>
                </div>
                <div class="feature-card-modern">
                    <div class="feature-icon-modern">💊</div>
                    <div class="feature-content-modern">
                        <h4>Pharmacy</h4>
                        <p>On-site pharmacy services</p>
                    </div>
                </div>
                <div class="feature-card-modern">
                    <div class="feature-icon-modern">❤️</div>
                    <div class="feature-content-modern">
                        <h4>Cardiology</h4>
                        <p>Expert heart specialists</p>
                    </div>
                </div>
            </div>
            
            
        </div>
        
        <!-- Right Side - Doctor Card -->
        <div class="hero-right-modern">
            <div class="doctor-card-modern">
                <div class="doctor-image-modern">
                    <div class="doctor-avatar">
                        <span>👨‍⚕️</span>
                    </div>
                    <div class="doctor-info-modern">
                        <h3>Dr. Sarah Mitchell</h3>
                        <p>Chief Medical Officer</p>
                        <div class="doctor-rating">
                            <span>⭐</span><span>⭐</span><span>⭐</span><span>⭐</span><span>⭐</span>
                            <span style="color: white; margin-left: 5px;">(4.9)</span>
                        </div>
                        <div class="doctor-badges">
                            <span class="doctor-badge">Cardiology</span>
                            <span class="doctor-badge">Neurology</span>
                        </div>
                    </div>
                </div>
                
                <!-- Live Stats -->
                <div style="margin-top: 30px; display: flex; justify-content: space-around; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px;">
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: 700; color: #2A7DE1;"><?php echo $stats['high_risk_count'] ?? '0'; ?></div>
                        <div style="font-size: 12px; color: rgba(255,255,255,0.6);">High Risk</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: 700; color: #f59e0b;"><?php echo $stats['medium_risk_count'] ?? '0'; ?></div>
                        <div style="font-size: 12px; color: rgba(255,255,255,0.6);">Medium Risk</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 24px; font-weight: 700; color: #10b981;"><?php echo $stats['low_risk_count'] ?? '0'; ?></div>
                        <div style="font-size: 12px; color: rgba(255,255,255,0.6);">Low Risk</div>
                    </div>
                </div>
                
                <!-- Appointment Button -->
                <button onclick="location.href='form.php'" style="width: 100%; margin-top: 30px; padding: 15px; background: rgba(42,125,225,0.2); border: 2px solid #2A7DE1; border-radius: 50px; color: white; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                    Book Appointment →

                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>


