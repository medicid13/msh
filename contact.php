<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $errors = [];
    if (empty($name)) $errors[] = 'Name is required';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
    if (empty($message)) $errors[] = 'Message is required';

    // In a real application, you would send an email or save to database here.
    // For demonstration, we just simulate success.

    if (empty($errors)) {
        // Success - redirect back with success flag
        header('Location: index.php?success=1#contact');
        exit;
    } else {
        // For simplicity, redirect back with error (you could enhance with session)
        header('Location: index.php?error=1#contact');
        exit;
    }
} else {
    // Not a POST request
    header('Location: index.php');
    exit;
}