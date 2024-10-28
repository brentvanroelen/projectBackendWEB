<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
    @csrf

    <!-- Email Field -->
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>

    <!-- Password Field -->
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>

    <!-- Username Field -->
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
    </div>

    <!-- Birthday Field -->
    <div>
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" required>
    </div>

    <!-- Profile Picture Upload -->
    <div>
        <label for="profilePicture">Profile Picture:</label>
        <input type="file" name="profilePicture" accept="image/*" required>
    </div>

    <!-- Description Field -->
    <div>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
    </div>

    <!-- Remember Me Checkbox -->
    <div>
        <label for="remember">Remember Me</label>
        <input type="checkbox" name="remember">
    </div>

    <button type="submit">Login</button>
</form>
