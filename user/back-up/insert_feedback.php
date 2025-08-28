<?php
session_start();
include "conn.php";

// Include the Composer autoload file to load necessary libraries (like Guzzle)
require_once 'vendor/autoload.php';

// Import the GuzzleHttp Client class
use GuzzleHttp\Client;

// Function to perform sentiment analysis using EdenAI API
function getSentimentAnalysis($feedback) {
    // Create a new Guzzle client
    $client = new Client();

    try {
        // Send the request to the sentiment analysis API
        $response = $client->request('POST', 'https://api.edenai.run/v2/text/sentiment_analysis', [
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiZDVjNmY0YzMtNTJhYy00YjBlLTg1NjktODZjMTY4MWQ4NzY2IiwidHlwZSI6ImFwaV90b2tlbiJ9.XNogr8QbLGGl0-5h-b-YeXDo45k-CqnIGAZC3s7yN18', // Replace with your actual API key
                'content-type' => 'application/json',
            ],
            'json' => [
                'providers' => ['openai'], // Specify the provider, e.g., 'openai'
                'text' => $feedback, // Use the user-provided feedback text
            ],
        ]);

        // Decode the JSON response from the API
        $body = $response->getBody();
        $data = json_decode($body, true);

        // Debugging: Log the response to check the structure
        error_log("API Response: " . print_r($data, true)); // Log the response for debugging

        // Extract the general sentiment from the response (this may vary depending on the API provider)
        if (isset($data['openai']['general_sentiment'])) {
            return $data['openai']['general_sentiment']; // Return the general sentiment (e.g., 'Positive', 'Neutral', 'Negative')
        } else {
            // Log and return 'unknown' if no sentiment is found
            error_log("General Sentiment not found in the response.");
            return 'unknown'; 
        }
    } catch (Exception $e) {
        // Handle any request or API errors
        error_log("API Request Error: " . $e->getMessage());
        return 'unknown'; // Return 'unknown' in case of an error
    }
}

// Function to insert form data into the database
function insertFormData($rating, $likert, $feedback, $equipment_id, $user_id, $sentiment, $conn) {
    $sql = "INSERT INTO feedbacks_tbl (ratings, likert, comments, equipment_id, user_id, analysis) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("issiis", $rating, $likert, $feedback, $equipment_id, $user_id, $sentiment);

    if ($stmt->execute()) {
        $_SESSION['feedback_success'] = true;
        header("Location: view_equipment.php?id=$equipment_id&user_id=$user_id"); // Redirect to view_equipment.php with equipment_id and user_id
        $stmt->close(); // Close statement
        $conn->close(); // Close connection
        exit; // Exit script
    } else {
        echo "Error inserting data: " . $stmt->error;
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rating = $_POST["number_ratings"];
    $likert = $_POST["likert-scale"];
    $feedback = $_POST["comment"];
    $equipment_id = $_POST["equipment_id"];
    $user_id = $_POST["user_id"];

    // Debugging: Check if feedback is empty or not
    if (empty($feedback)) {
        echo "Feedback is empty!";
        exit;
    }

    // Get sentiment analysis of the feedback
    $sentiment = getSentimentAnalysis($feedback);

    // Debugging: Check the sentiment
    error_log("Sentiment: " . $sentiment);

    // Call the function to insert data, including the sentiment result
    if (insertFormData($rating, $likert, $feedback, $equipment_id, $user_id, $sentiment, $conn)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data.";
    }
}
?>
