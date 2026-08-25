<!DOCTYPE html>
<html>
<head>
    <title>Confirmation d'inscription</title>
</head>
<body style="font-family: 'Montserrat', sans-serif; background-color: #111111; padding: 30px; color: #ffffff;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #1a1a1a; border: 1px solid #2a2a2a; border-radius: 12px; padding: 30px;">
        <h2 style="color: #C9A84C; text-align: center;">Félicitations {{ $name }} !</h2>
        <p>Votre inscription à <strong>{{ $formation->title }}</strong> est confirmée.</p>
        <p>Le Chef DAN vous contactera très rapidement pour les détails pratiques.</p>
        <p style="margin-top: 25px; color: #888; text-align: center;">À très vite dans nos cuisines !</p>
    </div>
</body>
</html>