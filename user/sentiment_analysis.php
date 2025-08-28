<?php
// Include necessary files and initialize Guzzle client
require_once 'vendor/autoload.php'; // Ensure Guzzle is loaded
use GuzzleHttp\Client;

// Check if the feedback is received from the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["feedback"])) {
    $feedback = $_POST["feedback"]; // Get the feedback text

    // Function to perform sentiment analysis using EdenAI API
    function getSentimentAnalysis($feedback) {
        $client = new Client(); // Create Guzzle client

        try {
            // Send the request to EdenAI API
            $response = $client->request('POST', 'https://api.edenai.run/v2/text/sentiment_analysis', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiZDVjNmY0YzMtNTJhYy00YjBlLTg1NjktODZjMTY4MWQ4NzY2IiwidHlwZSI6ImFwaV90b2tlbiJ9.XNogr8QbLGGl0-5h-b-YeXDo45k-CqnIGAZC3s7yN18', // Replace with your actual API key
                    'content-type' => 'application/json',
                ],
                'json' => [
                    'providers' => ['openai'],
                    'text' => $feedback,
                ],
            ]);

            $body = $response->getBody(); // Get the body of the response
            return json_decode($body, true); // Decode and return as an associative array

        } catch (Exception $e) {
            return ['error' => 'API Request Error: ' . $e->getMessage()]; // Handle errors
        }
    }

    // Get the sentiment analysis of the feedback
    $sentimentData = getSentimentAnalysis($feedback);

    // Return the sentiment data as a JSON response to the client
    if (isset($sentimentData['openai']['general_sentiment'])) {
        echo json_encode($sentimentData); // Send back the full response including sentiment
    } else {
        echo json_encode(['error' => 'Failed to analyze sentiment']);
    }
} else {
    echo json_encode(['error' => 'No feedback received']);
}
?>
