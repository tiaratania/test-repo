<?php
// Simple router handling
$path = $_SERVER['REQUEST_URI'];
if ($path != "/") {
    header("HTTP/1.0 404 Not Found");
    exit('404 Not Found');
}

function is_valid_search_term($search_term) {
    // Ensure the input is alphanumeric and between 3 and 16 characters long
    if (!preg_match('/^[a-zA-Z0-9_]{3,16}$/', $search_term)) {
        return false;
    }

    // Disallow simple XSS patterns (basic check)
    if (preg_match('/<[^>]*>/', $search_term)) {
        return false;
    }

    // Simplified check for common SQL injection patterns
    $sql_patterns = ['--', ';', '/\*', '\*/', ' OR ', ' AND '];
    foreach ($sql_patterns as $pattern) {
        if (preg_match('/' . $pattern . '/i', $search_term)) {
            return false;
        }
    }

    return true;
}

// Handling GET and POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_term = $_POST['search'] ?? '';
    if (is_valid_search_term($search_term)) {
        echo "<!doctype html><title>Search Result</title><h1>Search Result</h1><p>Your search term: " . htmlspecialchars($search_term) . "</p><a href='/'>Go back to home page</a>";
    } else {
        echo "<!doctype html><title>Search App</title><h1>Enter your search term</h1><form method=post><input type=text name=search><input type=submit value=Submit></form><p style='color:red;'>Invalid input. Please enter a valid search term.</p>";
    }
} else {
    echo "<!doctype html><title>Search App</title><h1>Enter your search term</h1><form method=post><input type=text name=search><input type=submit value=Submit></form>";
}
?>