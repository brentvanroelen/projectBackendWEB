@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



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

    
    <button type="submit">Login</button>
</form>
