<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* How to Use Section Styles */
.how-to-use-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    position: relative;
    overflow: hidden;
}

/* Section Header */
.section-header {
    text-align: center;
    margin-bottom: 60px;
    animation: fadeInUp 1s ease;
}

.section-badge {
    display: inline-block;
    background: linear-gradient(135deg, #2A7DE1, #1A5BB5);
    color: white;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    animation: badgePulse 2s infinite;
}

@keyframes badgePulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.section-title {
    font-size: 2.5rem;
    color: #0a1929;
    margin-bottom: 15px;
    font-weight: 700;
}

.title-highlight {
    background: linear-gradient(135deg, #2A7DE1, #1A5BB5);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Steps Timeline */
.steps-timeline {
    position: relative;
    max-width: 1000px;
    margin: 60px auto;
    padding: 20px 0;
}

.steps-timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #2A7DE1, #1A5BB5);
    transform: translateX(-50%);
    animation: timelinePulse 3s infinite;
}

@keyframes timelinePulse {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

.step-item {
    position: relative;
    display: flex;
    align-items: flex-start;
    margin-bottom: 60px;
    animation: slideInStep 0.8s ease forwards;
    opacity: 0;
}

.step-item:nth-child(1) { animation-delay: 0.2s; }
.step-item:nth-child(2) { animation-delay: 0.4s; }
.step-item:nth-child(3) { animation-delay: 0.6s; }
.step-item:nth-child(4) { animation-delay: 0.8s; }

@keyframes slideInStep {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.step-item:nth-child(odd) {
    flex-direction: row-reverse;
    text-align: right;
}

.step-number {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #2A7DE1, #1A5BB5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 700;
    color: white;
    position: relative;
    z-index: 2;
    box-shadow: 0 10px 20px rgba(42, 125, 225, 0.3);
    animation: numberPulse 2s infinite;
}

@keyframes numberPulse {
    0%, 100% { box-shadow: 0 10px 20px rgba(42, 125, 225, 0.3); }
    50% { box-shadow: 0 15px 30px rgba(42, 125, 225, 0.5); }
}

.step-content {
    flex: 1;
    padding: 0 40px;
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.step-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #2A7DE1, #1A5BB5);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.step-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.step-content:hover::before {
    transform: scaleX(1);
}

.step-icon {
    font-size: 48px;
    margin-bottom: 15px;
    animation: iconBounce 2s infinite;
}

@keyframes iconBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.step-title {
    font-size: 1.5rem;
    color: #0a1929;
    margin-bottom: 10px;
    font-weight: 600;
}

.step-description {
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 15px;
}

.step-features {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.step-feature {
    background: #f1f5f9;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    color: #334155;
    transition: all 0.3s ease;
}

.step-feature:hover {
    background: #2A7DE1;
    color: white;
    transform: scale(1.05);
}

.step-arrow {
    font-size: 32px;
    color: #2A7DE1;
    padding: 0 20px;
    animation: arrowMove 1.5s infinite;
}

@keyframes arrowMove {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(10px); }
}

/* Tutorial Card */
.tutorial-card {
    background: linear-gradient(135deg, #0a1929, #1a365d);
    border-radius: 30px;
    padding: 40px;
    margin: 60px 0;
    color: white;
    animation: cardGlow 3s infinite;
}

@keyframes cardGlow {
    0%, 100% { box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); }
    50% { box-shadow: 0 30px 60px rgba(42, 125, 225, 0.3); }
}

.tutorial-content {
    display: flex;
    align-items: center;
    gap: 30px;
    flex-wrap: wrap;
}

.tutorial-icon {
    font-size: 60px;
    animation: rotate 10s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.tutorial-text {
    flex: 1;
}

.tutorial-text h3 {
    font-size: 1.8rem;
    margin-bottom: 10px;
}

.tutorial-text p {
    color: rgba(255, 255, 255, 0.8);
}

.tutorial-btn {
    background: white;
    color: #0a1929;
    border: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    animation: btnPulse 2s infinite;
}

@keyframes btnPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.tutorial-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Quick Guide */
.quick-guide {
    margin: 60px 0;
}

.guide-title {
    text-align: center;
    font-size: 2rem;
    color: #0a1929;
    margin-bottom: 40px;
}

.guide-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.guide-card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    animation: cardFadeIn 0.8s ease forwards;
    opacity: 0;
}

.guide-card:nth-child(1) { animation-delay: 0.2s; }
.guide-card:nth-child(2) { animation-delay: 0.4s; }
.guide-card:nth-child(3) { animation-delay: 0.6s; }
.guide-card:nth-child(4) { animation-delay: 0.8s; }

@keyframes cardFadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.guide-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 20px 40px rgba(42, 125, 225, 0.2);
}

.guide-icon {
    font-size: 48px;
    margin-bottom: 20px;
    animation: iconSpin 10s linear infinite;
}

@keyframes iconSpin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.guide-card h4 {
    font-size: 1.2rem;
    color: #0a1929;
    margin-bottom: 10px;
}

.guide-card p {
    color: #64748b;
    line-height: 1.5;
}

/* FAQ Preview */
.faq-preview {
    margin: 60px 0;
}

.faq-preview h3 {
    text-align: center;
    font-size: 2rem;
    color: #0a1929;
    margin-bottom: 40px;
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.faq-item {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    animation: faqFadeIn 0.8s ease forwards;
    opacity: 0;
}

.faq-item:nth-child(1) { animation-delay: 0.3s; }
.faq-item:nth-child(2) { animation-delay: 0.5s; }
.faq-item:nth-child(3) { animation-delay: 0.7s; }

@keyframes faqFadeIn {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(42, 125, 225, 0.15);
}

.faq-question {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.faq-question span {
    font-size: 24px;
}

.faq-question h4 {
    font-size: 1.1rem;
    color: #0a1929;
    font-weight: 600;
}

.faq-item p {
    color: #64748b;
    line-height: 1.5;
    margin-left: 34px;
}

/* CTA Button */
.how-to-cta {
    text-align: center;
    margin-top: 60px;
    animation: ctaFadeIn 1s ease 1s forwards;
    opacity: 0;
}

@keyframes ctaFadeIn {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.cta-button {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    background: linear-gradient(135deg, #2A7DE1, #1A5BB5);
    color: white;
    text-decoration: none;
    padding: 20px 50px;
    border-radius: 60px;
    font-size: 1.3rem;
    font-weight: 700;
    transition: all 0.3s ease;
    box-shadow: 0 20px 40px rgba(42, 125, 225, 0.3);
    animation: ctaPulse 2s infinite;
}

@keyframes ctaPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}

.cta-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 30px 60px rgba(42, 125, 225, 0.4);
}

.cta-icon {
    font-size: 28px;
}

.cta-arrow {
    font-size: 24px;
    animation: arrowRight 1.5s infinite;
}

@keyframes arrowRight {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(5px); }
}

.cta-note {
    margin-top: 15px;
    color: #64748b;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .steps-timeline::before {
        left: 30px;
    }
    
    .step-item {
        flex-direction: row !important;
        text-align: left !important;
    }
    
    .step-item:nth-child(odd) {
        flex-direction: row !important;
    }
    
    .step-number {
        margin-right: 30px;
    }
    
    .step-arrow {
        display: none;
    }
    
    .guide-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .faq-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .step-content {
        padding: 20px;
    }
    
    .step-features {
        flex-direction: column;
    }
    
    .tutorial-content {
        flex-direction: column;
        text-align: center;
    }
    
    .guide-grid {
        grid-template-columns: 1fr;
    }
    
    .faq-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-button {
        padding: 15px 30px;
        font-size: 1.1rem;
    }
}

@media (max-width: 480px) {
    .how-to-use-section {
        padding: 50px 0;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .step-item {
        flex-direction: column !important;
        align-items: center;
    }
    
    .step-number {
        margin-bottom: 20px;
    }
    
    .tutorial-card {
        padding: 20px;
    }
    
    .cta-button {
        flex-direction: column;
        padding: 15px 25px;
    }
}

/* Animation for scroll reveal */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Interactive hover effects */
.step-content, .guide-card, .faq-item {
    position: relative;
    overflow: hidden;
}

.step-content::after, .guide-card::after, .faq-item::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(42, 125, 225, 0.1);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.step-content:active::after, .guide-card:active::after, .faq-item:active::after {
    width: 300px;
    height: 300px;
}

/* Loading animation for steps */
@keyframes stepLoading {
    0% { width: 0; }
    100% { width: 100%; }
}

.step-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    background: linear-gradient(90deg, #2A7DE1, #1A5BB5);
    animation: stepLoading 2s ease;
}
</style>
</head>
<body>
    <!-- How to Use Section -->
<section class="how-to-use-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <span class="section-badge">📋 SIMPLE PROCESS</span>
            <h2 class="section-title">How to Use <span class="title-highlight">MediCare</span> Risk Assessment</h2>
            <p class="section-subtitle">
                Complete your health assessment in just a few simple steps. 
                Our system makes it easy to track and monitor your health risks.
            </p>
        </div>

        <!-- Steps Timeline -->
        <div class="steps-timeline">
            <!-- Step 1 -->
            <div class="step-item">
                <div class="step-number">1</div>
                <div class="step-content">
                    <div class="step-icon">📝</div>
                    <h3 class="step-title">Fill Patient Details</h3>
                    <p class="step-description">
                        Enter your basic information including name, age, and medical history. 
                        All data is securely encrypted and confidential.
                    </p>
                    <div class="step-features">
                        <span class="step-feature">✓ Personal Information</span>
                        <span class="step-feature">✓ Medical History</span>
                        <span class="step-feature">✓ Contact Details</span>
                    </div>
                </div>
                <div class="step-arrow">→</div>
            </div>

            <!-- Step 2 -->
            <div class="step-item">
                <div class="step-number">2</div>
                <div class="step-content">
                    <div class="step-icon">❤️</div>
                    <h3 class="step-title">Enter Vital Signs</h3>
                    <p class="step-description">
                        Input your current vital signs including blood pressure, 
                        heart rate, blood sugar, and other health metrics.
                    </p>
                    <div class="step-features">
                        <span class="step-feature">✓ Blood Pressure</span>
                        <span class="step-feature">✓ Heart Rate</span>
                        <span class="step-feature">✓ Blood Sugar</span>
                        <span class="step-feature">✓ BMI</span>
                    </div>
                </div>
                <div class="step-arrow">→</div>
            </div>

            <!-- Step 3 -->
            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-content">
                    <div class="step-icon">⚡</div>
                    <h3 class="step-title">Get Risk Assessment</h3>
                    <p class="step-description">
                        Our AI-powered system analyzes your data and provides 
                        instant risk assessment with personalized recommendations.
                    </p>
                    <div class="step-features">
                        <span class="step-feature">✓ Risk Level (High/Medium/Low)</span>
                        <span class="step-feature">✓ Health Insights</span>
                        <span class="step-feature">✓ Recommendations</span>
                    </div>
                </div>
                <div class="step-arrow">→</div>
            </div>

            <!-- Step 4 -->
            <div class="step-item">
                <div class="step-number">4</div>
                <div class="step-content">
                    <div class="step-icon">📊</div>
                    <h3 class="step-title">Track & Monitor</h3>
                    <p class="step-description">
                        View your history, track changes over time, and 
                        monitor your health progress on the dashboard.
                    </p>
                    <div class="step-features">
                        <span class="step-feature">✓ History Tracking</span>
                        <span class="step-feature">✓ Progress Charts</span>
                        <span class="step-feature">✓ Regular Updates</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Tutorial Card -->
        <div class="tutorial-card">
            <div class="tutorial-content">
                <div class="tutorial-icon">🎥</div>
                <div class="tutorial-text">
                    <h3>Watch Video Tutorial</h3>
                    <p>See how easy it is to use our risk assessment system</p>
                </div>
                <button class="tutorial-btn" onclick="playTutorial()">
                    <span class="btn-icon">▶️</span>
                    Watch Now
                </button>
            </div>
        </div>

        <!-- Quick Start Guide -->
        <div class="quick-guide">
            <h3 class="guide-title">Quick Start Guide</h3>
            <div class="guide-grid">
                <div class="guide-card">
                    <div class="guide-icon">1️⃣</div>
                    <h4>Register/Login</h4>
                    <p>Create your account or login to existing one</p>
                </div>
                <div class="guide-card">
                    <div class="guide-icon">2️⃣</div>
                    <h4>Fill Form</h4>
                    <p>Complete the patient assessment form</p>
                </div>
                <div class="guide-card">
                    <div class="guide-icon">3️⃣</div>
                    <h4>Get Results</h4>
                    <p>Receive instant risk assessment</p>
                </div>
                <div class="guide-card">
                    <div class="guide-icon">4️⃣</div>
                    <h4>Track Progress</h4>
                    <p>Monitor your health over time</p>
                </div>
            </div>
        </div>

        <!-- FAQ Preview -->
        <div class="faq-preview">
            <h3>Frequently Asked Questions</h3>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>❓</span>
                        <h4>How accurate is the risk assessment?</h4>
                    </div>
                    <p>Our assessment is based on medical guidelines and validated by healthcare professionals.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>❓</span>
                        <h4>Is my data secure?</h4>
                    </div>
                    <p>Yes, we use encryption and follow HIPAA guidelines for data protection.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>❓</span>
                        <h4>How often should I update?</h4>
                    </div>
                    <p>Monthly updates are recommended for accurate tracking.</p>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="how-to-cta">
            <a href="form.php" class="cta-button">
                <span class="cta-icon">🚀</span>
                Start Your Assessment Now
                <span class="cta-arrow">→</span>
            </a>
            <p class="cta-note">No credit card required • Free forever • 2 minutes only</p>
        </div>
    </div>
</section>
<script>
// Add scroll animation
document.addEventListener('DOMContentLoaded', function() {
    const fadeElements = document.querySelectorAll('.fade-in');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });
    
    fadeElements.forEach(el => observer.observe(el));
});

// Tutorial video popup function
function playTutorial() {
    // Create modal
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.9);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
    `;
    
    // Create video container
    const videoContainer = document.createElement('div');
    videoContainer.style.cssText = `
        background: white;
        padding: 20px;
        border-radius: 20px;
        max-width: 800px;
        width: 90%;
        animation: slideUp 0.3s ease;
    `;
    
    // Add video content
    videoContainer.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="color: #0a1929;">How to Use MediCare</h3>
            <button onclick="this.closest('.modal').remove()" style="background: none; border: none; font-size: 24px; cursor: pointer;">✕</button>
        </div>
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                frameborder="0" 
                allowfullscreen>
            </iframe>
        </div>
        <div style="margin-top: 20px; text-align: center; color: #64748b;">
            Watch our quick tutorial to get started with risk assessment
        </div>
    `;
    
    modal.appendChild(videoContainer);
    modal.className = 'modal';
    document.body.appendChild(modal);
    
    // Add animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
}

// Add interactive step highlighting
document.querySelectorAll('.step-content').forEach(step => {
    step.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px) scale(1.02)';
    });
    
    step.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});
</script>
</body>
</html>