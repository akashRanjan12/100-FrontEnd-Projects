<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once '../includes/config.php';
require_once '../includes/functions.php';

$response = ['success' => false, 'message' => ''];

try {
    $action = $_GET['action'] ?? '';
    
    switch ($action) {
        case 'stats':
            $stats = getStatistics($conn);
            $response['success'] = true;
            $response['data'] = $stats;
            break;
            
        case 'patients':
            $limit = isset($_GET['limit']) ? intval($_GET['limit']) : null;
            $patients = getPatients($conn, $limit);
            $response['success'] = true;
            $response['data'] = $patients;
            break;
            
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                
                if (insertPatient($conn, $data)) {
                    $response['success'] = true;
                    $response['message'] = 'Patient added successfully';
                    $response['risk_level'] = calculateRiskLevel($data);
                } else {
                    $response['message'] = 'Failed to add patient';
                }
            }
            break;
            
        default:
            $response['message'] = 'Invalid action';
    }
} catch (Exception $e) {
    $response['message'] = 'Server error: ' . $e->getMessage();
}

echo json_encode($response);
?>