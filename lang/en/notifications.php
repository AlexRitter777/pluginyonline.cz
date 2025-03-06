<?php
return [

    'password_reset_request' => [
        'subject' => 'Password Reset Request',
        'greeting' => 'Hello!',
        'line_1' => 'You are receiving this email because we received a password reset request for your account.',
        'action' => 'Reset Password',
        'line_2' => 'This password reset link will expire in 60 minutes.',
        'line_3' => 'If you did not request a password reset, no further action is required.',
        'regards' => 'Regards',
        'footer' => 'If you\'re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: [:url](:url)',
    ],

    'password_has_been_reset' => [
        'subject' => 'Your Password Has Been Changed',
        'greeting' => 'Hello!',
        'line_1' => 'This is a confirmation that your password has been successfully changed.',
        'line_2' => 'If you did not change your password, please contact our support team immediately.',
        'thanks' => 'Thank you for using our service!',
        'regards' => 'Regards',
    ],

    'verify_email' => [
        'subject' => 'Verify Email Address',
        'greeting' => 'Hello!',
        'line_1' => 'Please click the button below to verify your email address.',
        'action' => 'Verify Email Address',
        'line_2' => 'If you did not create an account, no further action is required.',
        'regards' => 'Regards',
    ],

    'new_user_greeting' => [
        'subject' => 'Welcome to Our Website!',
        'greeting' => 'Hello, :name!',
        'line_1' => 'Thank you for registering on our website.',
        'line_2' => 'We are pleased to have you join our platform and look forward to collaborating with you.',
        'line_3' => 'For more information, please visit our website.',
        'action' => 'Visit Our Website',
        'line_4' => 'If you have any questions, do not hesitate to contact our support team.',
        'regards' => 'Best regards',
    ],

    'notification_template' => [
        'footer_line_1' => 'If you’re having trouble clicking the ":actionText" button, copy and paste the URL below',
        'footer_line_2' => 'into your web browser:',
    ],


];
