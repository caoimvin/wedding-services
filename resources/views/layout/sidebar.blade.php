<nav class="sidebar">
    <a href="/">Dashboard</a>
    <a href="/guestlist">Guest List</a>
    
    @auth
        <span style="color: white;">
            <p>Current User: {{ auth()->user()->name }}</p>
        </span>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endauth
</nav>