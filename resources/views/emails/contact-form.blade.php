<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .message-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
            margin: 20px 0;
        }
        .contact-info {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .contact-info h3 {
            margin-top: 0;
            color: #667eea;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>You have received a new message from your portfolio website</p>
    </div>
    
    <div class="content">
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
            <p><strong>Email:</strong> <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></p>
            <p><strong>Date:</strong> {{ $contactMessage->created_at->format('M d, Y \a\t g:i A') }}</p>
        </div>

        <div class="message-box">
            <h3>Message</h3>
            <p style="white-space: pre-wrap;">{{ $contactMessage->message }}</p>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="mailto:{{ $contactMessage->email }}?subject=Re: Your message&body=Hi {{ $contactMessage->name }},%0D%0A%0D%0AThank you for your message."
               style="background: #667eea; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; display: inline-block;">
                Reply to {{ $contactMessage->name }}
            </a>
        </div>
    </div>
    
    <div class="footer">
        <p>This email was sent from the contact form on your portfolio website.</p>
        <p>You can manage messages from your <a href="{{ route('admin.messages.index') }}">admin dashboard</a>.</p>
    </div>
</body>
</html>
