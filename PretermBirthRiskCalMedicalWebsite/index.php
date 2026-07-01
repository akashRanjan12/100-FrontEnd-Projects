<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
// Get statistics for hero page
$stats = getStatistics($conn);

include 'includes/header.php';
?>
<?php include 'includes/hero.php'; ?>
<?php include 'includes/use-section.php'; ?>
<?php include 'includes/footer.php'; ?>