@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        

        <!-- Email Field -->
        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" required>
        </div>

        <!-- Password Field -->
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Confirm Password Field -->
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <!-- Username Field -->
        <div>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" required>
        </div>

        <!-- Birthday Field -->
        <div>
            <label for="birthday">Birthday:</label>
            <input id="birthday" type="date" name="birthday" required>
        </div>

        <!-- Profile Picture Upload -->
        <div>
            <label for="profilePicture">Profile Picture:</label>
            <input id="profilePicture" type="file" name="profilePicture" accept="image/*">
        </div>

        <!-- Description Field -->
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit">Register</button>
        
        <!-- Terug naar Welkomspagina Button -->
        <a href="{{ url('/') }}" class="btn btn-secondary">Terug naar Welkom</a>
    </form>

