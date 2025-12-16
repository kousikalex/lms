<!-- resources/views/superadmin/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS LOGIN</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); width: 100%; max-width: 400px; padding: 40px; }
        .logo { display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 24px; }
        .logo-icon { width: 40px; height: 40px; background: #487fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
        .logo-icon svg { width: 24px; height: 24px; color: white; }
        .logo-text { font-size: 24px; font-weight: 700; color: #2d3748; }
        .logo-text span { color: #487fff; }
        h1 { text-align: center; font-size: 20px; color: #2d3748; margin-bottom: 8px; }
        .subtitle { text-align: center; color: #718096; font-size: 14px; margin-bottom: 24px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 500; color: #2d3748; margin-bottom: 8px; font-size: 14px; }
        input { width: 100%; height: 44px; border: 1px solid #e2e8f0; border-radius: 6px; padding: 0 12px; font-size: 14px; }
        input:focus { outline: none; border-color: #487fff; box-shadow: 0 0 0 3px rgba(72,127,255,0.1); }
        .btn { width: 100%; height: 44px; background: #487fff; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: 500; cursor: pointer; }
        .btn:hover { background: #3a6fd8; }
        .error { color: #e53e3e; font-size: 13px; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                    <polyline points="2 17 12 22 22 17"/>
                    <polyline points="2 12 12 17 22 12"/>
                </svg>
            </div>
            <div class="logo-text">WELCOME!</div>
        </div>
        <h1>Let’s get you signed in</h1>
        <p class="subtitle">Enter your credentials to access your account</p>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
