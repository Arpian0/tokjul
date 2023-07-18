<!-- Tampilkan form login -->
<style>
    /* Add your custom styles here */
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 30px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
<form action="{{ route('login') }}" method="post">
    @csrf
    <h3 style="text-align: center">Masukkan Akun</h3>
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>

    <small>Belum Punya Akun?, <a href="register">Klik Disini</a></small>
</form>
