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

        // Generate the general sentiment and segment data
        if (isset($data['openai']['general_sentiment']) && isset($data['openai']['general_sentiment_rate'])) {
            $generalSentiment = $data['openai']['general_sentiment']; // Positive, Neutral, or Negative
            $generalSentimentRate = $data['openai']['general_sentiment_rate'];

            // Initialize segment values
            $positiveSentiment = 0;
            $negativeSentiment = 0;
            $summary = "The general sentiment is $generalSentiment with a score of $generalSentimentRate. ";

            // Loop through the items (segments) to include each segment's sentiment and score
            $summary .= "The segment results are as follows: ";
            foreach ($data['openai']['items'] as $item) {
                $segment = $item['segment'];
                $sentiment = $item['sentiment'];
                $sentimentRate = $item['sentiment_rate'];

                // Include each segment result in the summary
                $summary .= "For the segment '$segment', the sentiment is $sentiment with a score of $sentimentRate. ";
            }

            // Return both general sentiment and the full summary for insertion
            return [
                'general_sentiment' => $generalSentiment, // This will be inserted into the 'analysis' column
                'summary' => $summary // This will be inserted into the 'summary' column
            ];
        } else {
            // Log and return 'unknown' if no sentiment data is found
            error_log("Sentiment data not found in the response.");
            return ['general_sentiment' => 'unknown', 'summary' => 'unknown'];
        }
    } catch (Exception $e) {
        // Handle any request or API errors
        error_log("API Request Error: " . $e->getMessage());
        return ['general_sentiment' => 'unknown', 'summary' => 'unknown']; // Return 'unknown' in case of an error
    }
}

// Function to insert form data into the database along with the sentiment analysis and summary
function insertFormData($rating, $likert, $feedback, $equipment_id, $user_id, $sentiment, $summary, $conn) {
    // Insert into feedbacks table, including the general sentiment in 'analysis' and the full summary in 'summary'
    $sql = "INSERT INTO feedbacks_tbl (ratings, likert, comments, equipment_id, user_id, analysis, summary) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("issiiss", $rating, $likert, $feedback, $equipment_id, $user_id, $sentiment, $summary);

    if ($stmt->execute()) {
        $_SESSION['feedback_success'] = true;
        header("Location: view_equipment.php?id=$equipment_id&user_id=$user_id"); // Redirect to view_equipment.php
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

    // Get sentiment analysis of the feedback and generate a summary
    $sentimentData = getSentimentAnalysis($feedback);

    // Debugging: Check the sentiment data
    error_log("Sentiment Data: " . print_r($sentimentData, true));

    // Call the function to insert data, including the sentiment result and summary
    if (insertFormData($rating, $likert, $feedback, $equipment_id, $user_id, $sentimentData['general_sentiment'], $sentimentData['summary'], $conn)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data.";
    }
}
?>
