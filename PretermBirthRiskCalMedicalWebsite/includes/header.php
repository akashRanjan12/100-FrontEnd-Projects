<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Risk Assessment System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <div class="logo-icon">🏥</div>
                <div class="logo-text">
                    <span class="logo-main">MediCare</span>
                    <span class="logo-sub">Risk Assessment</span>
                </div>
            </div>
            
            <div class="nav-links">
                <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <span class="nav-icon">🏠</span>
                    <span>Home</span>
                </a>
                
                <a href="form.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'form.php' ? 'active' : ''; ?>">
                    <span class="nav-icon">📝</span>
                    <span>Assessment Form</span>
                </a>
                
                <a href="patients-list.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'patients-list.php' ? 'active' : ''; ?>">
                    <span class="nav-icon">👥</span>
                    <span>Patients</span>
                </a>
                
                <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                    <span class="nav-icon">📊</span>
                    <span>Dashboard</span>
                </a>
            </div>
            
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">☰</button>
            
            <div class="mobile-menu" id="mobileMenu">
                <a href="index.php">Home</a>
                <a href="form.php">Assessment Form</a>
                <a href="patients-list.php">Patients</a>
                <a href="dashboard.php">Dashboard</a>
            </div>
        </div>
    </nav>
    
    <main class="main-content">

    <?php
// At the top of header.php
$current_page = basename($_SERVER['PHP_SELF']);
$requested_page = str_replace('.php', '', $current_page);

// List of valid pages
$valid_pages = ['index', 'form', 'patients-list', 'dashboard', '404'];

// If page doesn't exist, redirect to 404
if (!in_array($requested_page, $valid_pages) && $current_page != '404.php') {
    header('Location: 404.php');
    exit;
}
?>