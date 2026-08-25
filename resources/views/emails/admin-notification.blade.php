<!DOCTYPE html>
<html>
<head>
    <title>Notification Chef DAN</title>
</head>
<body style="font-family: 'Montserrat', sans-serif; background-color: #111111; padding: 30px; color: #ffffff;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #1a1a1a; border: 1px solid #2a2a2a; border-radius: 12px; padding: 30px;">
        <h2 style="color: #C9A84C; text-align: center;">👨‍🍳 Nouvelle activité</h2>
        <p><strong>De :</strong> {{ $senderName }} ({{ $senderEmail }})</p>
        <div style="border-left: 3px solid #C9A84C; padding-left: 15px; background: rgba(255,255,255,0.05); padding: 15px; border-radius: 4px;">
            {{ $content }}
        </div>
        <p style="text-align: center; margin-top: 25px; color: #888;">Connectez-vous au Dashboard pour gérer.</p>
    </div>
</body>
</html>