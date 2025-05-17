<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Редагувати користувача</title>
    <style>
        label { display: block; margin-top: 10px; }
        input, select { width: 300px; padding: 6px; }
        .error { color: red; font-size: 0.9em; }
        button { margin-top: 15px; padding: 8px 16px; background: orange; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: darkorange; }
        a { margin-left: 15px; }
    </style>
</head>
<body>

<h2>Редагувати користувача</h2>

<form action="{{ route('chief.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Ім'я</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    @error('name') <p class="error">{{ $message }}</p> @enderror

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    @error('email') <p class="error">{{ $message }}</p> @enderror

    <label for="role">Роль</label>
    <select name="role" id="role" required>
        <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Завідувач</option>
        <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Адміністратор</option>
        <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>Лікар</option>
        <option value="4" {{ old('role', $user->role) == 4 ? 'selected' : '' }}>Медсестра</option>
    </select>
    @error('role') <p class="error">{{ $message }}</p> @enderror

    <label for="password">Новий пароль (залиште порожнім, щоб не змінювати)</label>
    <input type="password" name="password" id="password">
    @error('password') <p class="error">{{ $message }}</p> @enderror

    <label for="password_confirmation">Підтвердження пароля</label>
    <input type="password" name="password_confirmation" id="password_confirmation">

    <button type="submit">Оновити</button>
    <a href="{{ route('chief.users.index') }}">Скасувати</a>
</form>

</body>
</html>
