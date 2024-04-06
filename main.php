<?php

// Function to check for SQL injection vulnerability
function check_sql_injection($url) {
    // Perform SQL injection test (this is a basic example, actual testing should be more comprehensive)
    // Check if the URL parameter is vulnerable to SQL injection by appending a single-quote
    $test_url = $url . "'";
    
    // Send a request to the test URL
    $response = file_get_contents($test_url);
    
    // Check if the response contains any SQL error messages indicating a potential vulnerability
    if (strpos($response, 'SQL syntax')) {
        echo "SQL Injection Vulnerability found!\n";
        echo "Solution: Use prepared statements or parameterized queries to prevent SQL injection.\n";
    } else {
        echo "No SQL Injection Vulnerability found.\n";
    }
}

// Function to check for Cross-Site Scripting (XSS) vulnerability
function check_xss($url) {
    // Perform XSS test (this is a basic example, actual testing should be more comprehensive)
    // Check if the URL parameter is vulnerable to XSS by injecting a simple script
    $test_url = $url . "<script>alert('XSS');</script>";
    
    // Send a request to the test URL
    $response = file_get_contents($test_url);
    
    // Check if the injected script is executed
    if (strpos($response, "<script>alert('XSS');</script>") !== false) {
        echo "XSS Vulnerability found!\n";
        echo "Solution: Sanitize user input and encode output to prevent XSS attacks.\n";
    } else {
        echo "No XSS Vulnerability found.\n";
    }
}

// Main function
function main() {
    // Prompt user to enter the webpage URL
    $url = readline("Enter the webpage URL: ");
    
    // Check for SQL injection vulnerability
    check_sql_injection($url);
    
    // Check for XSS vulnerability
    check_xss($url);
}

// Call the main function
main();

?>
